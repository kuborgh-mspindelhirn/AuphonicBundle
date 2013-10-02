<?php

namespace Kuborgh\AuphonicBundle\Token;

interface Owner
{
    /**
     * Get the owners token.
     * Returns null if currently no token is connected to this owner.
     *
     * @return Token|null
     */
    public function getToken();

    /**
     * Set new token.
     *
     * @throws
     *
     * @param Token $token
     */
    public function setToken(Token $token);
}