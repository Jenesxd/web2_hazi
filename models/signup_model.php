<?php

class Signup_Model
{
    public function post_data($vars)
    {
        $retData["result"] = "";

        try {
            $username = strtolower($vars["signup_username"]);
            $password = $vars["signup_password"];
            $passwordConfirm = $vars["signup_password_confirm"];
            $firstname = $vars["signup_firstname"];
            $lastname = $vars["signup_lastname"];

            $conn = Database::getConnection();
            if ($conn) {
                $stmt = $conn->prepare("SELECT user_username FROM users WHERE user_username = :username");
                $stmt->bindParam(":username", $username);
                $stmt->execute();

                if ($stmt->rowCount() == 0) {
                    if ($password == $passwordConfirm) {

                        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

                        $stmt = $conn->prepare("INSERT INTO users (user_username, user_password, user_firstname, user_lastname) VALUES (:user_username, :user_password, :user_firstname, :user_lastname)");

                        $stmt->bindParam(":user_username", $username);
                        $stmt->bindParam(":user_password", $passwordHash);
                        $stmt->bindParam(":user_firstname", $firstname);
                        $stmt->bindParam(":user_lastname", $lastname);

                        $stmt->execute();

                        $retData["result"] = "OK";
                        $retData["message"] = "Sikeres regisztráció. Üdvözöljük $username!";
                    } else {
                        $retData["result"] = "ERROR";
                        $retData["message"] = "Jelszók nem ugyan azok";
                    }
                } else {
                    $retData["result"] = "ERROR";
                    $retData["message"] = "A felhasználónév foglalt";
                }
            } else {
                $retData["result"] = "ERROR";
                $retData["message"] = "Hiba az adatbázissal";
            }
        } catch (PDOException $e) {
            $retData["result"] = "ERROR";
            $retData["message"] = "Internal Error";
        }
        return $retData;
    }
}

?>
