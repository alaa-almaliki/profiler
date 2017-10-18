<?php

namespace Profiler;

/**
 * Class Profiler
 * @package Profiler
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class Profiler
{
    /**
     * @var string
     */
    private static $start;

    /**
     * @var string
     */
    private static $end;

    /**
     * @var string
     */
    private static $startMemory;

    /**
     * @var string
     */
    private static $endMemory;

    /**
     * @var array
     */
    private static $results = [];

    /**
     *  Sets start memory and time
     */
    public static function start()
    {
        self::reset();
        self::$startMemory = memory_get_usage();
        self::$start = microtime(true);
    }

    /**
     * @return array|mixed
     */
    public static function end()
    {
        self::$endMemory = memory_get_usage();
        self::$end = microtime(true);
        return self::getResults();
    }

    /**
     * @param null $key
     * @return array|mixed
     */
    public static function getResults($key = null)
    {
        if (empty(self::$results)) {
            self::$results =  [
                'memory'  => sprintf('%d', (self::$endMemory - self::$startMemory)),
                'time'   => sprintf('%.2fs', (float) (self::$end - self::$start), 2),
            ];
        }

        if ($key === null) {
            return self::$results;
        }

        return self::$results[$key];
    }

    /**
     * Resets results
     */
    private static function reset()
    {
        self::$results = [];
    }
}
