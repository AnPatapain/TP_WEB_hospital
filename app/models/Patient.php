<?php
require_once("/home/kean/work/semester_6/web_engineering/TP_web_auth_ver3/app/libraries/Database.php");


class Patient {
    private $db;
    private $table = "patient";

    // properties of patient
    private $id;
    private $name;
    private $email;
    private $password;
    private $disease;
    private $gender;

    // Constructor
    public function __construct() {
        $this->db = new Database();
    }

    public function findPatientByEmail($email) {
        $this->db->query("SELECT * FROM patient WHERE email='" . $email. "'");
        
        // return $this->db->resultSet();
        if ($this->db->rowCount()>0){
            return true;
        }
        return false;
    }

    public function showPatient($id) {
        $this->db->query("SELECT * FROM patient WHERE id='" . $id. "'");
        $row = $this->db->single();
        
        // return $this->db->resultSet();
        if ($row!=null && sizeof($row) > 0){
            return $row;
        }
        return false;
    }

    public function deletePatient($id){

        $sql="DELETE FROM ".$this->table." WHERE id= '" . $id . "'";
        $this->db->query($sql);
        $result= $this->db->execute();
        return $result;

    }

    public function addPatient($data){
        $password = $data['password'];
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
        
        $sql="INSERT INTO ".$this->table."(name,email,password,disease,gender) VALUES ('".$data['name']."','".$data['email']."','".$password_encrypted."','".$data['disease']."','".$data['gender']."')";
        $this->db->query($sql);
        $result= $this->db->execute();
        $this->id = $this->db->lastInsertId();
        var_dump($this->id);
        return $result;

    }
    public function updatePatient($data){
        // $password_encrypted = $data['password'];

        // $sql="UPDATE ".$this->table." SET name= '" .$data['name']."', email= '".$data['email']. ,"' password = '" .$data['password']."' disease = '"   (,email,password,disease,gender) VALUES ('".$data['name']."',,'".$password_encrypted."','".$data['disease']."','".$data['gender']."')";
        // $this->db->query($sql);
        // $result= $this->db->execute();
        // $this->id = $this->db->lastInsertId();
        // var_dump($this->id);
        // return $result;

    }

    public function login($email, $password) {
        $sql="SELECT * FROM ".$this->table." WHERE email='".$email."'";
        $this->db->query($sql);
        $row = $this->db->single();

        if(password_verify($password, $row["password"])) {
            return $row;
        }else {
            return false;
        }
    }
}

// $doctor = new Doctor();

// $data=array(
//     "name"=>"Dsterik",
//     "email"=>"Dsterik@gmail.com",
//     "password" => "qwerty",
//     "specialist"=>"psychiatre",
//     "gender"=>"female"
// );

// var_dump($doctor->create($data));

// var_dump($doctor->findDoctorById(1));

// var_dump($dotor->login("Csterik@gmail.com", "qwertyy"));


?>