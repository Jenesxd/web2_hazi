<?php

class Signup_controller
{
    public $baseName = "signup";
    public function main(array $vars)
    {
        include_once(SERVER_ROOT . "models/signup_model.php");
        $signupModel = new Signup_Model();
        $retData = array();
        if (!empty($_SESSION["userid"])) {
            header("Refresh: 0, url='" . SITE_ROOT . "'");
        } else {
            if (isset($vars["signup_username"]) && isset($vars["signup_password"]) && isset($vars["signup_password_confirm"]) && isset($vars["signup_firstname"]) && isset($vars["signup_lastname"])) {
                $retData = $signupModel->post_data($vars);
                if ($retData["result"] == "OK") {
                    header("Refresh: 5, url='" . SITE_ROOT . "signin'");
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
