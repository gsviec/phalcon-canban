<?php
namespace App\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->name = 'Gsviec.com';
    }
    /**
     * loadDefaultAssets function.
     *
     * @access private
     * @return void
     */
    private function loadDefaultAssets()
    {

    }
}
