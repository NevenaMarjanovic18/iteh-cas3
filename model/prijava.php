<?php
//klasa za prijavu
class Prijava{
    public $id;   
    public $predmet;   
    public $katedra;   
    public $sala;   
    public $datum;
    
    public function __construct($id=null, $predmet=null, $katedra=null, $sala=null, $datum=null)
    {
        //. u phpu sluzi samo za konkatenaciju stringova
        $this->id = $id;
        $this->predmet = $predmet;
        $this->katedra = $katedra;
        $this->sala = $sala;
        $this->datum = $datum;
    }

    #funkcija prikazi sve getAll
    //(mysqli konekcija) --> kad god imamo rad sa bazom potrebno je da imamo ukljuceno i tu konekciju koja ce nam to omoguciti
    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM prijave";
        return $conn->query($query);
    }

    #funkcija getById

    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM prijave WHERE id=$id";

        $myObj = array(); //kreiramo niz i to prazan
        if($msqlObj = $conn->query($query)){ //ako je taj rezultat koji dobijemo razlitic od false(od praznog niza)
            while($red = $msqlObj->fetch_array(1)){ //uzmemo prvi iz niza
                $myObj[]= $red;
            }
        }

        return $myObj;

    }

    #deleteById

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM prijave WHERE id=$this->id";
        return $conn->query($query);
    }

    #update
    public function update($id, mysqli $conn)
    {
        $query = "UPDATE prijave set predmet = $this->predmet,katedra = $this->katedra,sala = $this->sala,datum = $this->datum WHERE id=$id";
        return $conn->query($query);
    }

    #insert add
    public static function add(Prijava $prijava, mysqli $conn)
    {
        $query = "INSERT INTO prijave(predmet, katedra, sala, datum) VALUES('$prijava->predmet','$prijava->katedra','$prijava->sala','$prijava->datum')";
        //VALUES pa od ove prijave mi daj predmet, katedru, salu i datum
        return $conn->query($query); //treba da izvrsimo query i vratimo rezultat
    }
}

?>