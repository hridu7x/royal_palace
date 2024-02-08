<?php

namespace Stripe\Exception;

// TODO: remove this check once we drop support for PHP 5
if (interface_exists(\Throwable::class, false)) {
    /**
     * The base interface for all stripe exceptions.
     *
     * @package stripe\Exception
     */
    interface ExceptionInterface extends \Throwable
    {
    }
} else {
    /**
     * The base interface for all stripe exceptions.
     *
     * @package stripe\Exception
     */
    // phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses
    interface ExceptionInterface
    {
    }
    // phpcs:enable
}
