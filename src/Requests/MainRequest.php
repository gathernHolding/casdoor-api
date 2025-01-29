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
    protected string $dataClassName;


    public function getDataClassName(): string
    {
        return $this->dataClassName;
    }


    public function createDtoFromResponse(Response $response): ResponseData
    {

        /**
         * @var array{status: string, msg: null|string, sub: null|string, name: null|string, data: mixed, data2: mixed} $data
         */
        $data = $response->json();
        $responseData = $data['data'];
        if (is_array($responseData)) {

            $mapper = new ObjectMapperUsingReflection;
//@phpstan-ignore-next-line
            $responseData = $mapper->hydrateObject(className: $this->getDataClassName(), payload: $responseData);
        }

        return new ResponseData(
            status: ResponseStatus::from($data['status']),
            msg: $data['msg'],
            sub: $data['sub'],
            name: $data['name'],
            data: $responseData,
            data2: $data['data2']
        );
    }
}
