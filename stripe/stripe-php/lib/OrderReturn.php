<?php

namespace Stripe;

/**
 * Class OrderReturn
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $created
 * @property string $currency
 * @property OrderItem[] $items
 * @property bool $livemode
 * @property string|null $order
 * @property string|null $refund
 *
 * @package stripe
 */
class OrderReturn extends ApiResource
{
    const OBJECT_NAME = 'order_return';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
