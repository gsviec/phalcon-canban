<?php

namespace App\Queue;

use Phalcon\Mvc\User\Component;

class Resque extends Component
{

    public function __construct()
    {

        $resque = (array) $this->config->resque;

        foreach ($resque as $key => $value) {
            putenv(sprintf('%s=%s', $key, $value));
        }
        //Set prefix
        \Resque_Redis::prefix(getenv('PREFIX'));
        \Resque::setBackend(getenv('REDIS_BACKEND'));
    }


    /**
     * Create a new job and save it to the specified queue.
     *
     * @param string $queue The name of the queue to place the job in.
     * @param string $class The name of the class that contains the code to execute the job.
     * @param array $args Any optional arguments that should be passed when the job is executed.
     * @param boolean $trackStatus Set to true to be able to monitor the status of a job.
     *
     * @return string|boolean Job ID when the job was created, false if creation was cancelled due to beforeEnqueue
     */
    public function enqueue($queue, $class, $args = null, $trackStatus = false)
    {
        return \Resque::enqueue($queue, $class, $args, $trackStatus);
    }
    public function blpop(array $queues, $timeout)
    {
        return \Resque::blpop($queues,$timeout);
    }
    public function tracking($token)
    {
        return new \Resque_Job_Status($token);
    }
}
