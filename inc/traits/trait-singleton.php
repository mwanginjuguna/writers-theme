<?php
/**
 * This singleton ensures a class is not instantiated more than once.
 * @package writers
 */

namespace WRITERS_THEME\Inc\Traits;

trait Singleton {
    public function __construct()
    {
        // constructor
    }

    public function __clone()
    {
        // prevents object cloning
    }

    /**
     * Ensure class is only instantiated once.
     */
    final public static function getInstance()
    {
        static $instance = [];

        $calledClass = get_called_class();

        if (!isset($instance[ $calledClass ])) {
            $instance [ $calledClass ] = new $calledClass();

            do_action(sprintf('writers_theme_singleton_init%s', $calledClass));
        }

        return $instance[ $calledClass ];
    }
}
