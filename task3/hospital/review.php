<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // print_r($_POST);
  $error=[];
  if(empty($_POST['hygiene'])){
    // error
    $error['hygiene']="<p class='text-danger font-weight-bold'>The first line is required</p>";
  }
    if(empty($_POST['servies'])){
      $error['servies']="<p class='text-danger font-weight-bold'>The second line is required</p>";
    }
      if(empty($_POST['nurse'])){
        $error['nurse']="<p class='text-danger font-weight-bold'>The third line is required</p>";
      }
        if(empty($_POST['doctor'])){
          $error['doctor']="<p class='text-danger font-weight-bold'>The forth line is required</p>";
        }
          if(empty($_POST['calm'])){
            $error['calm']="<p class='text-danger font-weight-bold'>The fifth line is required</p>";
  }
  if(empty($error)){
    $_SESSION['hygiene']= $_POST['hygiene'];
    $_SESSION['servies']= $_POST['servies'];
    $_SESSION['nurse']= $_POST['nurse'];
    $_SESSION['doctor']= $_POST['doctor'];
    $_SESSION['calm']= $_POST['calm'];
    header('location:result.php');die;
  }
}


include"header.php";
include"navbar.php";
?>


<div class="container p-4  mb-5">
  <div class="border border-2 border-dark  mt-2 mb-5 p-3 bg-dark">
    <form  method="post">
    <table class="table text-light">
      <thead>
      <tr>
          <th scope="col">Questions</th>
          <th scope="col">Bad</th>
          <th scope="col">Good</th>
          <th scope="col">Very Good</th>
          <th scope="col">Excellent</th>
          
        </tr>
        <tr>
          <td scope="col">Are you satisfied with the level of hygiene?</td>
          <td scope="col"><input type="radio" name="hygiene" value="bad"></td>
          <td scope="col"><input type="radio" name="hygiene" value="good"></td>
          <td scope="col"><input type="radio" name="hygiene" value="verygood"></td>
          <td scope="col"><input type="radio" name="hygiene" value="excellent"></td>
        </tr>
        <?= $error['hygiene'] ?? ""?>
      </thead>
      <tbody>
        <tr>
          <td scope="row">Are you satisfied with the price of service?</td>
          <td scope="col"><input type="radio" name="servies" value="bad"></td>
          <td scope="col"><input type="radio" name="servies" value="good"></td>
          <td scope="col"><input type="radio" name="servies" value="verygood"></td>
          <td scope="col"><input type="radio" name="servies" value="excellent"></td>
        </tr>
        <?= $error['servies'] ?? ""?>
        <tr>
          <td scope="row">Are you satisfied with the nursing servise?</td>
          <td scope="col"><input type="radio" name="nurse" value="bad"></td>
          <td scope="col"><input type="radio" name="nurse" value="good"></td>
          <td scope="col"><input type="radio" name="nurse" value="verygood"></td>
          <td scope="col"><input type="radio" name="nurse" value="excellent"></td>
        </tr>
        <?= $error['nurse'] ?? ""?>
        <tr>
        <td scope="col">Are you satisfied with the level of doctors?</td>
        <td scope="col"><input type="radio" name="doctor" value="bad"></td>
        <td scope="col"><input type="radio" name="doctor" value="good"></td>
        <td scope="col"><input type="radio" name="doctor" value="verygood"></td>
        <td scope="col"><input type="radio" name="doctor" value="excellent"></td>
        </tr>
        <?= $error['doctor'] ?? ""?>
        <tr>
        <td scope="col">Are you satisfied with the calmness of hospital?</td>
        <td scope="col"><input type="radio" name="calm" value="bad"></td>
        <td scope="col"><input type="radio" name="calm" value="good"></td>
        <td scope="col"><input type="radio" name="calm" value="verygood"></td>
        <td scope="col"><input type="radio" name="calm" value="excellent"></td>
        </tr>
        <?= $error['calm'] ?? ""?>
      </tbody>
    </table>
    <div class="text-center">
    <input class="btn btn-primary w-50" type="submit" value="Submit">
    </div>
    </form>
  </div>

</div>







<?php
include"footer.php";
include"scripts.php";
?>