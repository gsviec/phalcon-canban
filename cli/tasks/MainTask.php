<?php

class MainTask extends \Phalcon\Cli\Task
{
    public function mainAction()
    {
        $resque = $this->config->resque;
        foreach ($resque as $key => $value) {
            putenv(sprintf('%s=%s', $key, $value));
        }
        exec("php vendor/bin/resque >> /tmp/phalcon-canban 2>&1 &");
    }
    public function killAction()
    {
        //exec("for pid in $(ps -ef | grep 'resque' | awk '{print $2}'); do kill -9 $pid; done")
    }
    public function testAction()
    {
        echo "Test \n";
    }
    public function configAction()
    {
        var_dump($this->config);
    }

}
