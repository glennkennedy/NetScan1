<?php
class NewUserForm extends DbConn
{
    public function createUser($usr, $uid, $email, $pw)
    {
        try {

            $db = new DbConn;
            $tbl_members = $db->tbl_members;
            $generatedReportsVal = "null.xml";
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("INSERT INTO ".$tbl_members." (id, username, password, email,generatedReports)
            VALUES (:id, :username, :password, :email, :generatedReports)");
            $stmt->bindParam(':id', $uid);
            $stmt->bindParam(':username', $usr);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pw);
              $stmt->bindParam(':generatedReports', $generatedReportsVal);
            $stmt->execute();

            $err = '';

        } catch (PDOException $e) {

            $err = "Error: " . $e->getMessage();

        }
        //Determines returned value ('true' or error code)
        if ($err == '') {

            $success = 'true';

        } else {

            $success = $err;

        };

        return $success;

    }
}
