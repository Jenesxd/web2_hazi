<?php

class About_Controller
{
    public $baseName = 'about';
    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName . "_main");
    }
}

?>