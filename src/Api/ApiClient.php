<?php
namespace App\Api;

/**
 * Class ApiClient
 * @package App\ApiÒ
 */
class ApiClient
{
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
     * @param string $method
     * @return \stdClass
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $method): \stdClass
    {
        do {
            $responseRaw = $this->client->request('GET', $method);
            $response = json_decode($responseRaw->getBody()->getContents());
        } while ($this->hasError($response));

        return $response;
    }

    /**
     * @param \stdClass $requestBody
     * @return bool
     */
    public function hasError(\stdClass $requestBody): bool
    {
        return isset($requestBody->error);
    }
}
