<?php
namespace App\Controllers;

use Phalcon\Mvc\Controller;
use function Sodium\add;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->name = 'Gsviec.com';
        $this->loadDefaultAssets();
    }
    /**
     * loadDefaultAssets function.
     *
     * @access private
     * @return void
     */
    private function loadDefaultAssets()
    {
        $this->assets
            ->addCss('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', false)
            ->addCss('css/app.css')
        ;
        $this->assets
            ->addJs('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')
            ->addJs('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')
            ;
        //prd
        //dev
        //staing

    }
}
