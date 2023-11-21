<?php

class Admin_Controller
{
    public $baseName = 'admin';
    public function main(array $vars)
    {
        if ($_SESSION["userlevel"] != "__1") {
            header("Refresh: 0, url='" . SITE_ROOT . "'");
        } else {
            include_once(SERVER_ROOT . "models/admin_model.php");
            $adminModel = new Admin_Model();
            $retData = $adminModel->get_data();
            $view = new View_Loader($this->baseName . "_main");
            foreach ($retData as $key => $value) {
                $view->assign($key, $value);
            }
        }
    }
}

?>