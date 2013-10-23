<?php

namespace Kuborgh\AuphonicBundle\Resource;

interface ResourceFactory
{
    /**
     * Return an instance of the class itself
     *
     * @return ResourceFactory
     */
    public static function create();
}