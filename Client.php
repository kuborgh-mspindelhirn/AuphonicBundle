<?php

namespace Kuborgh\AuphonicBundle;

use Kuborgh\AuphonicBundle\Client\Production;
use Kuborgh\AuphonicBundle\Token\Token;
use Buzz\Browser;
use Buzz\Message\RequestInterface;
use Buzz\Util\Url;

class Client
{
    const API_BASEURL = "https://auphonic.com/api/";

    /**
     * HTTP client dependency.
     *
     * @var Browser
     */
    protected $browser;

    /**
     * API authentication token.
     * If none is given the request will be done without any authentification.
     *
     * @var null|Token
     */
    protected $token;

    /**
     * Production API subset dependency
     *
     * @var Production
     */
    protected $production;

    /**
     * Setter injection.
     * Set HTTP client.
     *
     * @param Browser $httpClient
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
    }

    /**
     * Setter injection.
     * Set api token for authentification.
     *
     * @param Token|null $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Setter injection.
     * Set production API subset class.
     *
     * @param Production $production
     */
    public function setProduction($production)
    {
        $this->production = $production;
        $this->production->setClient($this);
    }

    /**
     * Processes the request and returns the
     *
     * @param RequestInterface $request
     *
     * @throws AuphonicException
     *
     * @return \StdClass
     */
    public function process(RequestInterface $request)
    {
        $response = $this->browser->send($request);

        $content = $response->getContent();

        $obj = json_decode($content);

        if($obj->status_code !== 200) {
            throw new AuphonicException();
        }

        return $obj;
    }

    /**
     * Create a new request
     *
     * @param string $method
     * @param Url $url
     * @return \Buzz\Message\Request
     */
    public function createRequest($method, Url $url)
    {
        // create new request
        $request = $this->browser->getMessageFactory()->createRequest($method);
        // add token if given
        if($this->token) {
            $request->addHeader(sprintf("Authorization: Bearer %s", $this->token->getToken()));
        }
        // set content type header
        $request->addHeader("Content-Type: application/json");
        // apply url to request
        $url->applyToRequest($request);

        return $request;
    }

    /**
     * Creates a url object with the auphonic api base url and appends the $path
     *
     * @param string $path
     * @return Url
     */
    public function createApiUrl($path)
    {
        return new Url(sprintf("%s%s", Client::API_BASEURL, $path));
    }

    /**
     * Return the production api
     *
     * @return Production
     */
    public function production()
    {
        return $this->production;
    }
}