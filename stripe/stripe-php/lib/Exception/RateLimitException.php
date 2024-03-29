<?php

namespace Stripe\Exception;

/**
 * RateLimitException is thrown in cases where an account is putting too much
 * load on stripe's API servers (usually by performing too many requests).
 * Please back off on request rate.
 *
 * @package stripe\Exception
 */
class RateLimitException extends InvalidRequestException
{
}
