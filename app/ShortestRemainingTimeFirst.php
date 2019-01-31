<?php

namespace App;

class ShortestRemainingTimeFirst
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->execute();

        return $this;
    }

    public function cpu()
    {
        return [
                [
                    'time' => 0,
                    'process' => 'P1',
                ],
                [
                    'time' => 3,
                    'process' => 'P2',
                ],
                [
                    'time' => 8,
                    'process' => 'P1',
                ],
                [
                    'time' => 15,
                    'process' => 'P3',
                ],
                [
                    'time' => 16,
                    'process' => 'P2',
                ],
                [
                    'time' => 19,
                    'process' => 'P3',
                ],
                [
                    'time' => 24,
                    'process' => 'idle',
                ],
                [
                    'time' => 28,
                    'process' => 'P1',
                ],
                [
                    'time' => 30,
                    'process' => 'P3',
                ],
                [
                    'time' => 32,
                    'process' => 'P1',
                ],
                [
                    'time' => 35,
                    'process' => 'terminate',
                ],
            ];
    }

    public function io()
    {
        return [
                [
                    'time' => 0,
                    'process' => 'idle',
                ],
                [
                    'time' => 8,
                    'process' => 'P2',
                ],
                [
                    'time' => 16,
                    'process' => 'P1',
                ],
                [
                    'time' => 28,
                    'process' => 'P1',
                ],
                [
                    'time' => 30,
                    'process' => 'terminate',
                ],
            ];
    }

    public function cpuUtilization()
    {
        return 31 / 35 * 100;
    }

    public function ioUtilization()
    {
        return 22 / 30 * 100;
    }

    public function execute()
    {
        $time = 0;
        foreach ($this->data as $key => $job) {
            if ($time === $job['arrival_time']) {
                for ($i=0; $i < $job['cpu_burst']; $i++) {
                    // search times table
                    if () {
                        # code...
                    }
                }
            }
        }
    }
}
