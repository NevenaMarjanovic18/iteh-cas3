<?php
//prvi put koristimo klasu kao koncept
class User{
    public $id;
    public $username;
    public $password;

    //konstruktor za klasu
    public function __construct($id=null,$username=null,$password=null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    //funkcija za logovanje
    public static function logInUser($usr, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$usr->username' and password='$usr->password'";
        // echo $query;
        //konekcija sa bazom;
        return $conn->query($query);
    }
}


?>