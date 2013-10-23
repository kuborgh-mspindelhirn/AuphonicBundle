<?php

namespace Kuborgh\AuphonicBundle\Client;

use Buzz\Util\Url;
use Kuborgh\AuphonicBundle\Client;

class Production
{
    const APIURL_RESOURCE = "productions.json";
    const APIURL_START = "production/{uuid}/start.json";

    /**
     * HTTP client dependency
     *
     * @var Client
     */
    protected $client;

    /**
     * Dependency injection
     *
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    public function create(Production $prod)
    {
        // create Url object.
        $url = $this->client->createApiUrl(self::APIURL_RESOURCE);

        // get request instance
        $request = $this->client->createRequest('POST', $url);

        $result = $this->client->process($request);
    }

    public function start()
    {

    }

    /**
     * Returns a list with all productions received from auphonic.
     *
     * @return \Kuborgh\AuphonicBundle\Resource\Production[]
     */
    public function getList()
    {
        $url = $this->client->createApiUrl(self::APIURL_RESOURCE);

        $request = $this->client->createRequest('GET', $url);

        $result = $this->client->process($request);
    }
}