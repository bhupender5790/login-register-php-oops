<?php
namespace App\Models;
    class Validate extends user {
        private $name;
        private $email;
        private $password;
    
        public function __construct($name, $email, $password) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
    
        public function validate() {
            $errors = array();
    
            if (empty($this->name)) {
                $errors['name'] = "Name field is empty.";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $this->name)) {
                $errors['name'] = "Only letters and white space allowed for name.";
            }
    
            if (empty($this->email)) {
                $errors['email'] = "Email field is empty.";
            } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format.";
            }
    
            if (empty($this->password)) {
                $errors['passsword'] = "Password field is empty.";
            } else if (strlen($this->password) < 8) {
                $errors['passsword'] = "Password must be at least 8 characters.";
            }
    
            if (count($errors) > 0) {
                return $errors;
            } else {
                return "Input is valid.";
            }
        }
    }
    
?>