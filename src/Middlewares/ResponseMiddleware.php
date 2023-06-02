<?php

namespace Itwmw\GoCqHttp\Middlewares;

use Closure;
use Itwmw\GoCqHttp\Data\ArrayData;
use Itwmw\GoCqHttp\Data\CreateData;
use Itwmw\GoCqHttp\Exceptions\ApiException;
use Itwmw\GoCqHttp\Exceptions\ApiHttpException;
use Itwmw\GoCqHttp\Support\ApiResponse;
use Itwmw\GoCqHttp\Support\Str;
use Itwmw\GoCqHttp\Support\Utils;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ResponseMiddleware
{
    protected array $dataMap = [
        'get_forward_msg'       => 'messages',
        'get_group_msg_history' => 'messages',
    ];

    public function __invoke(): Closure
    {
        return function (callable $handler) {
            return function (
                RequestInterface $request,
                array $options
            ) use ($handler) {
                $promise = $handler($request, $options);
                return $promise->then(
                    function ($response) use ($request) {
                        return $this->responseHandler($response, $request);
                    }
                );
            };
        };
    }

    /**
     * @param ResponseInterface $response
     * @param RequestInterface $request
     *
     * @return ApiResponse
     * @throws ApiException
     * @throws ApiHttpException
     */
    protected function responseHandler(ResponseInterface $response, RequestInterface $request): ApiResponse
    {
        if (200 !== $response->getStatusCode()) {
            throw new ApiHttpException('访问接口失败', -1, null, $response);
        }

        $body = $response->getBody();
        if ($body->isSeekable()) {
            $body->rewind();
        }
        $data = $body->getContents();
        $body->rewind();
        $data = json_decode($data, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new ApiHttpException('数据解析失败', -2, null, $response);
        }
        $code = $data['retcode'] ?? 404;
        if (0 != $code && 1 != $code) {
            throw new ApiException($data['message'] ?? 'API错误', -3, null, $response);
        }

        $apiPath        = $request->getUri()->getPath();
        $apiPath        = substr($apiPath, 1);
        $secondaryField = null;
        if (isset($this->dataMap[$apiPath])) {
            $secondaryField = $this->dataMap[$apiPath];
        }
        if (str_starts_with($apiPath, '_')) {
            $apiPath = substr($apiPath, 1);
        }
        $apiPath = Str::studly($apiPath);
        /** @var $dataClassName CreateData */
        $dataClassName = '\\Itwmw\\GoCqHttp\\Data\\' . $apiPath;
        $data          = $data['data'] ?? null;
        if (!is_null($secondaryField) && is_array($data)) {
            $data = $data[$secondaryField] ?? null;
        }
        if (class_exists($dataClassName) && is_array($data)) {
            if (Utils::arrayIsList($data)) {
                $data = array_map(function ($item) use ($dataClassName) {
                    return $dataClassName::create($item);
                }, $data);
                $data = new ArrayData($data);
            } else {
                $data = $dataClassName::create($data);
            }
        }
        return new ApiResponse(
            $response->getStatusCode(),
            $response->getHeaders(),
            $body,
            $response->getProtocolVersion(),
            $response->getReasonPhrase(),
            $data ?: null
        );
    }
}
