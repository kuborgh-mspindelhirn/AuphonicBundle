<?php

namespace Kuborgh\AuphonicBundle\Tests\Token;

use Kuborgh\AuphonicBundle\Token\Token;

class TokenTest extends \PHPUnit_Framework_TestCase {

    /**
     * Token to test with.
     *
     * @var Token
     */
    public $token;

    /**
     * Initialize token object.
     * Token string is "mytoken".
     * Expiration date is current timestamp.
     */
    public function setUp()
    {
        $this->token = new Token("mytoken", time());
    }

    /**
     * Test if isExpired returns true on an expired token.
     */
    public function testExpiredToken()
    {
        // set expire date to 500 seconds in the past
        $this->token->setExpire(time() - 500);

        // now isExpired should return true
        $this->assertTrue($this->token->isExpired(), "Expired token given but isExpired() returns false.");
    }

    /**
     * Test if isExpired returns false on an currently active token ( not yet expired ).
     */
    public function testNotExpiredToken()
    {
        // set expire date to 500 seconds in the future
        $this->token->setExpire(time() + 500);

        // now isExpired should return true
        $this->assertFalse($this->token->isExpired(), "Active ( not expired ) token given but isExpired() returns true.");
    }

}