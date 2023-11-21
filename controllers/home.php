<?php

class Home_Controller
{
    public $baseName = 'home';
    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName . "_main");
    }
}

?>