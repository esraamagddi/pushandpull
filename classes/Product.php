<?php
namespace classes;

require_once 'MySql.php';
class Product extends MySql{

        public function selectall()
        {
            $query="select * from products";
            $runquery=$this->conn->query($query);
            $products=[];
            if($runquery->num_rows>0)
            {
                $products=$runquery->fetch_all(MYSQLI_ASSOC);
                
            }

            return $products;
        }

        public function selectone($id)
        {
            $query="select * from products where `id`=$id ";
            $runquery=$this->conn->query($query);
            $product=[];
            if($runquery->num_rows===1)
            {
                $product=$runquery->fetch_assoc();
                
            }

            return $product;
        }

        public function insert($name,$desc,$img,$price)

        {
            $name=$this->conn->escape_string($name);
            $desc=$this->conn->escape_string($desc);
            $price=$this->conn->escape_string($price);

            $query = "INSERT INTO `products` (`name`, `description`, `image`, `price`) VALUES ('$name', '$desc', '$img', $price)";
            $runquery=$this->conn->query($query);
            if($runquery)
            {
                return true;                
            }

            return false;
        }

        public function update($name,$desc,$img,$price,$id)
        {
            $name=$this->conn->escape_string($name);
            $desc=$this->conn->escape_string($desc);
            $price=$this->conn->escape_string($price);
            
            $query = "UPDATE `products` SET `name`='$name', `description`='$desc', `image`='$img', `price`=$price WHERE `id`=$id ";
            $runquery=$this->conn->query($query);
            if($runquery)
            {
                return true;                
            }

            return false;
        }

        public function delete($id)
        {
            $query = "DELETE FROM `products` WHERE  `id`=$id ";
            $runquery=$this->conn->query($query);
            if($runquery)
            {
                return true;                
            }

            return false;
        }

}