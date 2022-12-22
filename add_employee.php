<?php include 'header.php' ; ?>
<?php include 'database.php' ; ?>

<?php include 'nav.php' ; ?>

<?php
$departments=array("cs","it","sf") ;
$error='' ;
$success='' ;
if(isset($_POST['submit']))
{
$name= filter_var($_POST['name'],FILTER_UNSAFE_RAW) ;
$email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL) ;
$department= filter_var($_POST['department'],FILTER_UNSAFE_RAW) ;
$password= md5(filter_var($_POST['password'],FILTER_UNSAFE_RAW)) ;
 if(empty($name) ||empty($email) || empty($department) || empty($password) ){
    $error= " please fill all fields" ;
 }else{
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $department=strtolower($department) ;
        if(in_array($department,$departments)){
            if(strlen($password)>6){
                $db=new Database() ;
                $db->connect() ;
                $db->insert($name,$email,$department,$password);
                $success='Done Successfully' ;

                 
            
                 
            }else{
                $error="please tyoe password greater than 6 chars" ;

            }

        }else{
            $error='this department not found' ;
        }

    }else{
        $error="please type valid email" ;
    }
 }



}

?>





<div class="container">
<div class="alert alert-primary" role="alert" style="text-align:center;">
 <h1> add new employee</h1>
</div>
<?php if($error!='') : ?>
<div class="alert alert-danger" role="alert">
  <h2 style="text-align:center ;"><?php echo $error ; ?> </h2>
</div>
<?php endif ; ?>



<?php if($success!='') : ?>
<div class="alert alert-success" role="alert">
  <h2 style="text-align:center ;"><?php echo $success ; ?> </h2>
</div>
<?php endif ; ?>


<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">department</label>
    <input type="text" name="department" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">password</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
   
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
