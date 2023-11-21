<?php

class Signout_controller
{
    public $baseName = "signout";
    public function main(array $vars)
    {
        if (!empty($_SESSION["userid"])) {
            session_destroy();
            header("Refresh: 3, url='" . SITE_ROOT . "'");
            $view = new View_Loader($this->baseName . "_main");
        } else {
            header("Refresh: 0, url='" . SITE_ROOT . "'");
        }
    }
}

?>
