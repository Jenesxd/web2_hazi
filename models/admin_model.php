<?php

class Admin_Model
{
    public function get_data()
    {
        $retData["result"] = "OK";
        $retData['rows'] = array();

        try {
            $conn = Database::getConnection();
            if ($conn) {
                $stmt = $conn->prepare("SELECT inquery_id, inquery_email, inquery_phone, inquery_message FROM inqueries ORDER BY inquery_id DESC");
                $stmt->execute();

                $retData["rows"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
