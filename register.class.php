<?php

class RegisterUser{

    private $email;
    private $raw_password;
    private $encrypted_password;
    public $error;
    public $sucess;
    private $storage ="data.json";
    private $stored_users;
    private $new_user;


    public function __construct($email,$password){

         $this->email = trim($this->email);
         $this->email=filter_var($email,FILTER_SANITIZE_STRING);
         $this->raw_password = filter_var(trim($password),FILTER_SANITIZE_STRING);
         $this->encrypted_password = password_hash($this->raw_password,PASSWORD_DEFAULT);
         $this->stored_users = json_decode(file_get_contents($this->storage),true);
         $this->new_user=[
            "email"=> $this->email,
            "password"=> $this->encrypted_password,

         ];
         if($this->checkFieldValues()){
            $this->insertUser();
         }
    }


    private function checkFieldValues(){
        if(empty($this->email)|| empty ($this->raw_password)){
            $this->error="Both fields are required.";
            return false;
        }else{
            return true;
        }
     }
    

    private function emailExists(){
        foreach($this->stored_users as $user){
            if($this->email == $user['email']){
                $this->error="email already taken, please choose a different one,";
                return true;
            }
        }
    return false;
   }
        
    

    private function insertUser(){
        if($this->emailExists()==FALSE){
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage,json_encode($this->stored_users.JSON_PRETTY_PRINT))){
                return $this->success = "Your registration was successful";
            }else{
                return $this->error = "something went wrong, please try again";
            }
            }

        }
    }

