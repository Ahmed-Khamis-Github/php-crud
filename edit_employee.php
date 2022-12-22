<?php include 'header.php' ; ?>
<?php include 'nav.php' ; ?>
<?php include 'database.php' ; ?>

<div class="container">
<div class="alert alert-primary" role="alert" style="text-align:center;">
 <h1> Edit Employees</h1>
</div>
</div>
 <div class="container">
<?php if(isset($_GET['id'])&& is_numeric($_GET['id'])) : ?>
    <?php $db=new Database() ;
    $db->connect() ;
  if($db->find($_GET['id']))  :?>
 <?php 
 $post=$db->find($_GET['id']) ;
 $name=$post['name'] ;
 $email=$post['email'] ;
 $password=$post['password'] ;
 $department=$post['department'] ;
 ?>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" value="<?php echo $name ?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">department</label>
    <input type="text" value="<?php echo $department ?>" name="department" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email address</label>
    <input type="text" value="<?php echo $email ?>" name="email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">password</label>
    <input type="text" value="<?php echo $password ?>" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   </div>
   
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
 














<?php endif ; ?>


<?php else : ?>  
<?php echo "Error 504"  ;?>  
<?php endif ; ?>


<?php 
if(isset($_POST['submit'])){
    $db=new Database() ;
    $db->connect() ;
     
  $db->update($_POST['name'],$department,$email,$password,$_GET['id'])  ;

}
?>