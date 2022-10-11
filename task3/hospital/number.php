<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // print_r($_POST);
  $error;
  if(empty($_POST['number'])){
    // error
    $error="<p class='text-danger font-weight-bold'>The number is requested</p>";
  }
  if(empty($error)){
    $_SESSION['number']= $_POST['number'];
    header('location:review.php');die;
  }
}






include"header.php";
include"navbar.php";
?>

<div class="container w-50 mt-5 bg-dark p-5 text-center">
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light" style="font-weight: 700; font-size:30px;">Enter Number</label>
    <input type="text " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="number">
    <?= $error ?? ""?>
  </div>
  <input type="submit" class="btn btn-primary w-50 " value="submit">
</form>
</div>
















<?php
include"footer.php";
include"scripts.php";
?>