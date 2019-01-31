<?php

use PHPUnit\Framework\TestCase as BaseTestCase;
use App\ShortestRemainingTimeFirst;

class ShortestRemainingTimeFirstFeatureTest extends BaseTestCase
{
    /**
     * @test
     * @covers \App\ShortestRemainingTimeFirst::execute
     */
    public function index()
    {
        // given
        $given = [
            [
                'job_id' => 'P1',
                'arrival_time' => 0,
                'cpu_burst' => 10,
                'io_burst' => 12,
                'cpu_burst_2' => 5,
            ],
            [
                'job_id' => 'P2',
                'arrival_time' => 3,
                'cpu_burst' => 5,
                'io_burst' => 8,
                'cpu_burst_2' => 3,
            ],
            [
                'job_id' => 'P3',
                'arrival_time' => 10,
                'cpu_burst' => 6,
                'io_burst' => 2,
                'cpu_burst_2' => 2,
            ],
        ];


        // when
        $schedule = ShortestRemainingTimeFirst::execute($given);

        // then
        $this->assertEquals(
            [
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
            ],
            $schedule->cpu()
        );

        $this->assertEquals(
            [
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
            ],
            $schedule->io()
        );

        $this->assertEquals(
            31 / 35 * 100,
            $scheduler->cpuUtilization()
        );

        $this->assertEquals(
            22 / 30 * 100,
            $scheduler->ioUtilization()
        );
    }
}
