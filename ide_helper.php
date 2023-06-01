<?php
namespace GuzzleHttp{

    use Itwmw\GoCqHttp\Exceptions\ApiException;
    use Itwmw\GoCqHttp\Exceptions\ApiHttpException;
    use Itwmw\GoCqHttp\Support\ApiResponse;
    use GuzzleHttp\Exception\GuzzleException;

    trait ClientTrait{
        /**
         * @throws GuzzleException
         * @throws ApiException
         * @throws ApiHttpException
         */
        public function post($uri, array $options = []): ApiResponse
        {
            return new ApiResponse();
        }

        /**
         * @throws GuzzleException
         * @throws ApiException
         * @throws ApiHttpException
         */
        public function get($uri, array $options = []): ApiResponse
        {
            return new ApiResponse();
        }
    }
}
