<?php

namespace Gathern\CasdoorAPI\Requests;

use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use Gathern\CasdoorAPI\DTO\ResponseData;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * @template TData = string
 */
abstract class MainRequest extends Request
{
    /**
     * Summary of ResponseDataClass
     *
     * @var class-string
     */
    protected ?string $dataClassName = null;

    protected bool $isCollectionData = false;

    public function getDataClassName(): ?string
    {
        return $this->dataClassName;
    }

    public function getIsCollectionData(): ?bool
    {
        return $this->isCollectionData;
    }

    /**
     * creates the dto using dto() method

     *
     * @return ResponseData<TData, mixed>
     */
    public function createDtoFromResponse(Response $response): ResponseData
    {

        /**
         * @var array{status: string, msg: null|string, sub: null|string, name: null|string, data: mixed, data2: mixed} $data
         */
        $data = $response->json();
        $responseData = $this->mapDataToDTO($data['data']);

        // @phpstan-ignore-next-line
        return new ResponseData(
            status: ResponseStatus::from($data['status']),
            msg: $data['msg'],
            sub: $data['sub'],
            name: $data['name'],
            data: $responseData,
            data2: $data['data2']
        );
    }

    private function mapDataToDTO(mixed $data): mixed
    {

        if (! is_array($data) || $data === [] || $this->getDataClassName() === null) {
            return $data;
        }

        $mapper = new ObjectMapperUsingReflection;
        if ($this->getIsCollectionData() !== true) {
            return $mapper->hydrateObject(className: $this->getDataClassName(), payload: $data); // @phpstan-ignore-line
        }

        return array_reduce(
            array: $data,
            callback: function (array $carry, array $item) use ($mapper): array {
                $carry[] = $mapper->hydrateObject(className: $this->getDataClassName(), payload: $item); // @phpstan-ignore-line

                return $carry;
            },
            initial: [],

        );
    }

    public function createCasdoorId(string $name): string
    {
        return strpos($name, '/') ? $name : getenv('AUTH_ORGANIZATION_NAME').'/'.$name;
    }

    /**
     * @param  string[]  $names
     * @return string[]
     */
    public function createCasdoorForValues(array $names): array
    {
        return array_map(
            callback: fn (string $name): string => $this->createCasdoorId($name),
            array: $names,
        );

    }
}
