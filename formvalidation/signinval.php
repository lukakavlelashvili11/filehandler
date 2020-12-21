<?php
class userval{
    private $data;
    private $email;
    private $error=[];
    private static $fields=["semail","spassword"];
    function __construct($post_data){
        $this->data=$post_data;
    }
    public function validateform(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field,$this->data)){
                trigger_error("please fill $field in");
                return;
            }
        }
        $this->validemail();
        $this->validpassword();
        return $this->error;

    }
    private function validemail(){
        $val=trim($this->data['semail']);
        require("mysinf.php");
        if(empty($val)){
            $this->errorval('email','email can not be empty!');
        }
       else if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
            $this->errorval('email','email is not valid!');

        }else{
            $conn=new mysqli($host,$dname,$dpassword,$database);
            $r=$conn->query("SELECT * FROM User WHERE email='$val'");
            if($r->num_rows==0){
                $this->errorval('email','email does not exist!');
            }else{
                $this->email=$val;
            } } 
    }
    private function validpassword(){
        $val=$this->data['spassword'];
        if(isset($this->email)){
            require("mysinf.php");
            $conn=new mysqli($host,$dname,$dpassword,$database);
            $r=$conn->query("SELECT password FROM User WHERE email='$this->email'");
            foreach($r->fetch_assoc() as $row){
                if($row!==$val){
                    $this->errorval('password',"password does not match!");
                }
            }

        }
    }
    private function errorval($key,$val){
        $this->error[$key]=$val;

    }
}

?>