<?php

namespace Afeefa\Component\TestingUtils;

class Benchmark
{
    public $startTime;
    public $lastTime;

    public static function startBenchmark(): Benchmark
    {
        return new Benchmark();
    }

    public function __construct()
    {
        $this->startTime = microtime(true);
        $this->lastTime = microtime(true);
    }

    public function getDiff()
    {
        $diffStart = microtime(true) - $this->startTime;
        $diffLast = microtime(true) - $this->lastTime;

        $this->lastTime = microtime(true);

        return round($diffStart, 4) . ' +' . round($diffLast, 4);
    }
}
