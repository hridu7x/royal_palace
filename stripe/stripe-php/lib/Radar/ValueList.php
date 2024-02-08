<?php

namespace Stripe\Radar;

/**
 * Class ValueList
 *
 * @property string $id
 * @property string $object
 * @property string $alias
 * @property int $created
 * @property string $created_by
 * @property string $item_type
 * @property \Stripe\Collection $list_items
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string $name
 *
 * @package stripe\Radar
 */
class ValueList extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.value_list';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}