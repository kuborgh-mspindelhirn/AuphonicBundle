<?php

namespace Kuborgh\AuphonicBundle;

use Kuborgh\AuphonicBundle\Client\Preset;
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
     * Auphonic username to use for authentification.
     * To use user:password authentification you need to allow that explicitly.
     *
     * @see allowUserPasswordAuthentification()
     *
     * @var null|string
     */
    protected $username;

    /**
     * Auphonic password to use for authentification.
     * To use user:password authentification you need to allow that explicitly.
     *
     * @see allowUserPasswordAuthentification()
     *
     * @var null|string
     */
    protected $password;

    /**
     * Flag for username and password authetification.
     * If true a user:password authetification per request is possible.
     *
     * @var boolean
     */
    protected $allowUserPasswordAuthentification = false;

    /**
     * Available resource subsets
     *
     * @var array
     */
    protected $resourceSubsets;

    /**
     * Production API subset dependency
     *
     * @var Production
     */
    protected $production;

    /**
     * Preset API subset dependency
     *
     * @var Preset
     */
    protected $preset;

    /**
     * Setter injection.
     * Set HTTP client.
     *
     * @param Browser $browser
     */
    public function setBrowser(Browser $browser)
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
     * @param null|string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param null|string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Add a resource subset
     *
     * @param string $fieldname
     * @param string $class
     */
    public function addResourceSubset($fieldname, $class)
    {
        $this->resourceSubsets[$fieldname] = $class;
    }

    /**
     * If you need to use the authentication with username and password you need to explicitly allow this option.
     * If a token exists the token is used for authentication.
     *
     * The username and the password are send in plaintext in every request!
     * The connection uses https but this is still unsecure and you should only do this if token usage is impossible.
     *
     * @param bool $enable
     */
    public function allowUserPasswordAuthentification($enable = true)
    {
        $this->allowUserPasswordAuthentification = $enable;
    }

    /**
     * Setter injection.
     * Set production API subset class.
     *
     * @param Production $production
     */
    public function setProduction(Production $production)
    {
        $this->production = $production;
        $this->production->setClient($this);
    }

    /**
     * Setter injection.
     * Set preset API subset class.
     *
     * @param Preset $preset
     */
    public function setPreset(Preset $preset)
    {
        $this->preset = $preset;
        $this->preset->setClient($this);
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
            throw new AuphonicException(sprintf("Invalid status code %s.", $obj->status_code));
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
            /**
             * generate header for OAuth2 bearer token
             * http://self-issued.info/docs/draft-ietf-oauth-v2-bearer.html
             */
            $request->addHeader(sprintf("Authorization: Bearer %s", $this->token->getToken()));
        } elseif($this->allowUserPasswordAuthentification) {
            /**
             * generate header for HTTP basic auth
             * http://en.wikipedia.org/wiki/Basic_access_authentication
             */
            // create concat string with username and password
            $usernamepassword = sprintf("%s:%s", $this->username, $this->password);
            // encode with base64
            $base64Encoded = base64_encode($usernamepassword);
            // set header
            $request->addHeader(sprintf("Authorization: Basic %s", $base64Encoded));
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
     * Merges the given data into the given base.
     * This is done recursively.
     *
     * @param \StdClass|array $data
     * @param \StdClass $base
     */
    public function merge($data, $base)
    {
        foreach($data as $name => $value) {
        }
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

    public function preset()
    {
        return $this->preset;
    }
}