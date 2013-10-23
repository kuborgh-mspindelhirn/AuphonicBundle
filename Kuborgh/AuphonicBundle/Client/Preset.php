<?php

namespace Kuborgh\AuphonicBundle\Client;

use Buzz\Util\Url;
use Kuborgh\AuphonicBundle\AuphonicException;
use Kuborgh\AuphonicBundle\Client;
use Kuborgh\AuphonicBundle\Resource\Production\Metadata;
use Symfony\Component\PropertyAccess\PropertyAccess;

class Preset
{
    const APIURL_RESOURCE   = "presets.json";
    const APIURL_DETAIL     = "preset/%s.json";

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

    public function create(\Kuborgh\AuphonicBundle\Resource\Preset $preset)
    {
        // create Url object.
        $url = $this->client->createApiUrl(self::APIURL_RESOURCE);

        // todo read data from $preset and create post body

        // get request instance
        $request = $this->client->createRequest('POST', $url);

        $this->client->process($request);
    }

    /**
     * Load a single preset.
     *
     * @param $uuid
     *
     * @return \Kuborgh\AuphonicBundle\Resource\Preset
     */
    public function load($uuid)
    {
        // create Url object.
        $path = sprintf(self::APIURL_DETAIL, $uuid);
        $url = $this->client->createApiUrl($path);

        // create request
        $request = $this->client->createRequest('GET', $url);
        // process request
        $result = $this->client->process($request);

        $preset = $this->client->decode($result->data);

        if(!($preset instanceof \Kuborgh\AuphonicBundle\Resource\Preset)) {
            throw new AuphonicException(sprintf("Preset expected but %s given", get_class($preset)));
        }

        return $preset;
    }

    /**
     * Returns a list with all productions received from auphonic.
     *
     * @return \Kuborgh\AuphonicBundle\Resource\Preset[]
     */
    public function getList()
    {
        $url = $this->client->createApiUrl(self::APIURL_RESOURCE);

        $request = $this->client->createRequest('GET', $url);

        $result = $this->client->process($request);

        $presets = array();
        if($result->data && is_array($result->data)) {
            foreach($result->data as $presetInformation) {
                $presets[] = $this->load($presetInformation->uuid);
            }
        }

        return $presets;
    }
}