<?php

namespace Stripe\Sigma;

/**
 * Class ScheduledQueryRun
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property int $data_load_time
 * @property mixed $error
 * @property \Stripe\File|null $file
 * @property bool $livemode
 * @property int $result_available_until
 * @property string $sql
 * @property string $status
 * @property string $title
 *
 * @package stripe\Sigma
 */
class ScheduledQueryRun extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'scheduled_query_run';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    public static function classUrl()
    {
        return "/v1/sigma/scheduled_query_runs";
    }
}
