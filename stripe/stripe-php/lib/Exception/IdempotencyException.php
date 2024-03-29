<?php

namespace Stripe\Exception;

/**
 * IdempotencyException is thrown in cases where an idempotency key was used
 * improperly.
 *
 * @package stripe\Exception
 */
class IdempotencyException extends ApiErrorException
{
}
