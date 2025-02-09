<?php

namespace Gathern\CasdoorAPI\Requests;

use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use Gathern\CasdoorAPI\DTO\ResponseData;
use Gathern\CasdoorAPI\Enum\ResponseStatus;
use Saloon\Http\Request;
use Saloon\Http\Response;

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

    public function createDtoFromResponse(Response $response): ResponseData
    {

        /**
         * @var array{status: string, msg: null|string, sub: null|string, name: null|string, data: mixed, data2: mixed} $data
         */
        $data = $response->json();
        $responseData = $this->mapDataToDTO($data['data']);

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
        return (string) strpos($name, '/') !== '' && (string) strpos($name, '/') !== '0' ? $name : getenv('AUTH_ORGANIZATION_NAME').'/'.$name;
    }
}
