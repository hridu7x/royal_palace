<?php

namespace Stripe\Exception\OAuth;

/**
 * Implements properties and methods common to all (non-SPL) stripe OAuth
 * exceptions.
 */
abstract class OAuthErrorException extends \Stripe\Exception\ApiErrorException
{
    protected function constructErrorObject()
    {
        if (is_null($this->jsonBody)) {
            return null;
        }

        return \Stripe\OAuthErrorObject::constructFrom($this->jsonBody);
    }
}
