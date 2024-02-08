<?php

namespace Stripe\Exception;

/**
 * AuthenticationException is thrown when invalid credentials are used to
 * connect to stripe's servers.
 *
 * @package stripe\Exception
 */
class AuthenticationException extends ApiErrorException
{
}
