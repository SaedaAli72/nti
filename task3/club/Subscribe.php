<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // print_r($_POST);
  $error=[];
  if(empty($_POST['name'])){
    // error
    $error['name']="<p class='text-danger font-weight-bold'>The Member Name is required</p>";
  }
    if(empty($_POST['members'])){
      $error['members']="<p class='text-danger font-weight-bold'>The Number of Members is required</p>";
    
  }
  if(empty($error)){
    
    $_SESSION['members']= $_POST['members'];
    $_SESSION['name']= $_POST['name'];
    
    header('location:Games.php');die;
  }
}






include"header.php";
include"navbar.php";

?>

<h1 class="text-center mt-3 text-dark" style="font-size:55px; font-weight:700;">Club</h1>

<div class="container w-50 mt-3 bg-dark p-5 text-center ">
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light" style="font-weight: 700; font-size:22px;">Member Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" 
            value="<?= $_POST['name'] ?? ""?>">
            <p class="text-secondary">club subscription start with <b>10.000 LE</b></p>
    <?= $error['name'] ?? ""?>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light" style="font-weight: 700; font-size:22px;">Count of family members</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="members" 
    value="<?= $_POST['members'] ?? ""?>">
    <p class="text-secondary">Cost of each member is <b>2.500 LE</b></p>
    <?= $error['members'] ?? ""?>
  </div>
  
  <button type="submit" class="btn btn-primary w-50 ">Submit</button>
</form>
</div>


















<?php
include"footer.php";
include"scripts.php";
?>