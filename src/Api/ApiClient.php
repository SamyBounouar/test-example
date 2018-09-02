<?php
namespace App\Api;


class ApiClient {

    const BASE_URL = 'https://www.itccompliance.co.uk/recruitment-webservice/api/';
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * ApiClient constructor.
     */
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => self::BASE_URL]);
    }

    /**
     * @param $method
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $method): \stdClass
    {
        do {
            $responseRaw = $this->client->request('GET', $method);
            $response = json_decode($responseRaw->getBody()->getContents());
        } while ($this->hasError($response));

        return $response;
    }

    public function hasError(\stdClass $requestBody): bool {
        return isset($requestBody->error);
    }
}