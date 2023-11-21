<?php

class About_contact_Controller
{
    public $baseName = 'about_contact';
    public function main(array $vars)
    {
        include_once(SERVER_ROOT . "models/contact_model.php");
        $contactModel = new Contact_Model();
        $retData = array();
        if (isset($vars["contact_email"]) && isset($vars["contact_message"])) {
            $retData = $contactModel->post_data($vars);
        }
        $view = new View_Loader($this->baseName . "_main");
        foreach ($retData as $key => $value) {
            $view->assign($key, $value);
        }
    }
}

?>