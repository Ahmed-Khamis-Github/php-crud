<?php


// class insert{


 

//     $sql=$db->connect()->prepare("INSERT INTO employees('name','email','department','password') VALUES(:name,:email,:department,:password)") ;
//     $sql->bindParam("name",$name) ;
//     $sql->bindParam("name",$email) ;
//     $sql->bindParam("name",$department) ;
//     $sql->bindParam("name",$password) ;
//     if($sql->execute()){
//         echo "done" ;
//     }else{
//         echo "a7a" ;
//     }





// }

 

class Database {
    private $host='localhost' ;
    private $username='root' ;
    private $password='' ;
    private $dbname='soft' ;
    private $database;

    public function connect(){
        $this->database=new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
        return $this->database ;
         
    
}



public function enc_password($password){
    return md5($password) ;
}





public function insert($name,$email,$department,$password){
$sql=$this->database->prepare("INSERT INTO employees(name,email,department,password) VALUES(:name,:email,:department,:password)") ;
$sql->bindparam("name",$name);
$sql->bindparam("email",$email);
$sql->bindparam("department",$department);
$sql->bindparam("password",$password);
if($sql->execute()){
    echo "<h1>Done Successfully</h1>" ;
}
 
}


public function read(){
    $sql=$this->database->prepare("SELECT * FROM employees") ;
    $sql->execute() ;
    return $sql ;
        return $sql;
}

public function showData($table){  
    try {  
       $sql="SELECT * FROM $table";  
       $q = $this->database->query($sql) or die("failed!");
   
       while($r = $q->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }  
       return $data;
   
        }
       catch(PDOException $e)
       {
           echo 'Query failed'.$e->getMessage();
       }
   
    }   

    public function find($id){
        $sql='SELECT * FROM employees WHERE id= :id' ;
        $stmt=$this->connect()->prepare($sql) ;
        $stmt->bindparam("id",$id) ;
        $stmt->execute() ;
        $result=$stmt->fetch() ;
        return $result ;
    }


    public function update($name,$department,$email,$password,$id){
        $sql="UPDATE employees SET name= :name , department= :department , email= :email , password= :password WHERE id= :id" ;
        $stmt=$this->connect()->prepare($sql) ;
        $stmt->bindparam("name",$name) ;
        $stmt->bindparam("department",$department ) ;
        $stmt->bindparam("email",$email) ;
        $stmt->bindparam("password",$password) ;
        $stmt->bindparam("id",$id) ;
        $stmt->execute() ;
    }





    // public function updatePost($title,$body,$author,$id){
    //     $sql="UPDATE posts SET title= :title , body= :body , author= :author WHERE id= :id" ;
    //     $stmt=$this->connect()->prepare($sql) ;
    //     $stmt->bindparam("title",$title) ;
    //     $stmt->bindparam("body",$body) ;
    //     $stmt->bindparam("author",$author) ;
    //     $stmt->bindparam("id",$id) ;
    //     $stmt->execute() ;
    // }

}







        



















 