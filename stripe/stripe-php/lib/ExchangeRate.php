<?php

namespace Stripe;

/**
 * Class ExchangeRate
 *
 * @property string $id
 * @property string $object
 * @property mixed $rates
 *
 * @package stripe
 */
class ExchangeRate extends ApiResource
{
    const OBJECT_NAME = 'exchange_rate';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
