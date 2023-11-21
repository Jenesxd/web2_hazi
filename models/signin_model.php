<?php

class Signin_Model
{
    public function get_data($vars)
    {
        $retData["result"] = "";

        try {
            $username = strtolower($vars["signin_username"]);
            $password = $vars["signin_password"];

            $conn = Database::getConnection();
            if ($conn) {
                $stmt = $conn->prepare("SELECT user_id, user_lastname, user_firstname, user_username, user_password, user_permission FROM users WHERE user_username = :username");
                $stmt->bindParam(":username", $username);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user["user_password"])) {
                        $_SESSION["userid"] = $user["user_id"];
                        $_SESSION["username"] = $user["user_username"];
                        $_SESSION["userfirstname"] = $user["user_firstname"];
                        $_SESSION["userlastname"] = $user["user_lastname"];
                        $_SESSION["userlevel"] = $user["user_permission"];

                        $retData["result"] = "OK";
                        $retData["message"] = "Üdvözöljük $username!";
                    } else {
                        $retData["result"] = "ERROR";
                        $retData["message"] = "Helytelen felhasználónév vagy jelszó!";
                    }
                } else {
                    $retData["result"] = "ERROR";
                    $retData["message"] = "Helytelen felhasználónév vagy jelszó!";
                }
            } else {
                $retData["result"] = "ERROR";
                $retData["message"] = "Hiba az adatbázissal";
            }
        } catch (PDOException $e) {
            $retData["result"] = "ERROR";
            $retData["message"] = "Internal Error <br> <img src=\"https://http.cat/images/500.jpg\"></img>";
        }
        return $retData;
    }
}

?>
