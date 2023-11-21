<?php

class Signin_controller
{
    public $baseName = "signin";
    public function main(array $vars)
    {
        include_once(SERVER_ROOT . "models/signin_model.php");
        $signinModel = new Signin_Model();
        $retData = array();
        if (!empty($_SESSION["userid"])) {
            header("Refresh: 0, url='" . SITE_ROOT . "'");
        } else {
            if (isset($vars["signin_username"]) && isset($vars["signin_password"])) {
                $retData = $signinModel->get_data($vars);
                if ($retData["result"] == "OK") {
                    header("Refresh: 0, url='" . SITE_ROOT . "'");
                }
            }

            $view = new View_Loader($this->baseName . "_main");
            foreach ($retData as $key => $value) {
                $view->assign($key, $value);
            }
        }
    }
}

?>
