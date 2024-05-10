<?php
namespace classes;

require_once 'MySql.php';
class Admin extends MySql{

        public function attempt($email,$password)
        {
            $query="select * from admin where email='$email' ";
            $runquery=$this->conn->query($query);
            if($runquery->num_rows==1)
            {
                $admin=$runquery->fetch_assoc();
                if(password_verify($password,$admin['password']))
                {
                    return $admin;
                }
                
            }

            return null;
        }



}