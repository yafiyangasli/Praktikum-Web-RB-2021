<?php
require_once('db/Koneksi.php');

class User
{
    var $BASE_URL = "/prak";
    public function __construct()
    {
        $db = new Koneksi();
        $this->conn = $db->connect();
    }

    public function authenticate($uname, $pass)
    {
        $auth = $this->conn->query("SELECT * from user WHERE username='{$uname}' AND pass='{$pass}' LIMIT 1");


        if ($auth->num_rows !== 0) {
            $user = $auth->fetch_assoc();
            session_start();
            $_SESSION['userID'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            //Authentikasi user diterima
            header("Location: {$this->BASE_URL}/home.php");
        } else {
            header("Location: {$this->BASE_URL}/index.php");
        }
    }
}
