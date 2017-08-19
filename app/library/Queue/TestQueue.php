<?php

namespace App\Queue;


class TestQueue extends Resque
{

    /**
     * Run a job
     *
     */
    public function perform()
    {
        $params = $this->args;
        var_dump($params);
    }
    
}
