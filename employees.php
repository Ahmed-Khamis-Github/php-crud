<?php include 'header.php' ; ?>
<?php include 'nav.php' ; ?>
<?php include 'database.php' ; ?>
<div class="container">
<div class="alert alert-primary" role="alert" style="text-align:center;">
 <h1> show our employees</h1>
</div>
</div>
 

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <?php
  $db=new Database() ;
  $db->connect();
   
//    die() ;
 
foreach($db->read() as $row) : ?>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['department'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><a href="edit_employee.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a></td>
      <td><a href="" class="btn btn-danger">Delete</a></td>
 
    </tr>
    
  </tbody>
  <?php endforeach ; ?>
</table>
