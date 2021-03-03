<?php
class userval{
    private $data;
    private $error=[];

    function __construct($post_data){
        $this->data=$post_data;
    }
    public function validateform(){
        
        $this->validname();
        $this->validemail();
        $this->validpassword();
        return $this->error;

    }
    private function validname(){
        $val=trim($this->data['name']);
        if(empty($val)){
            $this->errorval('name','please input name!');
        }else{
             if(!preg_match('/^[a-zA-Z0-9]{1,20}$/',$val)){
            $this->errorval('name','the name must be 1-20 chars and alphanumeric!');
        }
        }
    }
    private function validemail(){
        $val=trim($this->data['email']);
        require("mysinf.php");
        if(empty($val)){
            $this->errorval('email','email can not be empty!');
        }
       else if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
            $this->errorval('email','the email is not valid!');

        }else{
            $conn=new mysqli($host,$dname,$dpassword,$database);
            $r=$conn->query("SELECT * FROM User WHERE email='$val'");
            if($r->num_rows>0){
                $this->errorval('email','the email already exists!');
            } } 
    }
    private function validpassword(){
        $val=$this->data['password'];
        if(empty($val)){
            $this->errorval('password','password can not be empty!');
        }
        else if(strlen($val)<8 || !preg_match('/[0-9]/',$val)){
            $this->errorval('password','the password length must be more than 8 chars and includes numbers!');

        }
        else if(preg_match('/\s/', $val[strlen($val)-1])||preg_match('/\s/', $val[0])){
            $this->errorval('password','the password should not start or end with space!');
            }
    }
    private function errorval($key,$val){
        $this->error[$key]=$val;
        

    }
}