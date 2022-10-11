<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // print_r($_POST);
  $error=[];
  if(empty($_POST['name'])){
    // error
    $error['name']="<p class='text-danger font-weight-bold'>The Name is required</p>";
  }
    if(empty($_POST['loan'])){
      $error['loan']="<p class='text-danger font-weight-bold'>The Loan is required</p>";
    }
      if(empty($_POST['year'])){
        $error['year']="<p class='text-danger font-weight-bold'>The year is required</p>";
      }
  if(empty($error)){
    if($_POST['year']<3){
    $interestperyear=$_POST['loan']*.1;
    $rateperyear=10 ."%";
    }else{
      $interestperyear=$_POST['loan']*.15;
      $rateperyear=10 ."%";
    }





    $message="
    <div class='container p-4 w-75 mb-5'>
    <div class='border border-2 border-dark  mt-2  p-5 bg-dark'>
        <table class='table text-light'>
          <thead>
          <tr>
              <th scope='col'>#</th>
              <th scope='col'>information</th>
              
            </tr>
            <tr>
              <td scope='col'>UserName</td>
              <td scope='col'>".$_POST['name']."</td>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope='row'>Interest Rate</td>
              <td>".$interestperyear*$_POST['year']."</td>
            
            </tr>
            <tr>
              <td scope='row'>Loan After Interest</td>
              <td>".$_POST['loan']-($interestperyear*$_POST['year'])."</td>
              
            </tr>
            <tr>
            <td scope='col'>Number Of Year</td>
              <td>".$_POST['year']."</td>
            </tr>
            <tr>
            <td scope='col'>Rate of Interest Per Year</td>
              <td>".$rateperyear."</td>
            </tr>
            <tr>
            <td scope='col'>The Mounthly Installement</td>
              <td>".$interestperyear/12 ."</td>
            </tr>
          </tbody>
        </table>
      </div>
    
    </div>
    ";
  }
}





include"header.php";
include"navbar.php";
?>


<div class="container w-50 mt-5 bg-dark p-5 text-center ">
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light" style="font-weight: 700; font-size:22px;">NAME</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" 
            value="<?= $_POST['name'] ?? ""?>">
    <?= $error['name'] ?? ""?>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light" style="font-weight: 700; font-size:22px;">LOAN</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="loan" 
    value="<?= $_POST['loan'] ?? ""?>">
    <?= $error['loan'] ?? ""?>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-light" style="font-weight: 700; font-size:22px;">NUMBER OF YEARS</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="year"
    value="<?= $_POST['year'] ?? ""?>">
    <?= $error['year'] ?? ""?>
  </div>
  <button type="submit" class="btn btn-primary w-50 ">Submit</button>
</form>
</div>


<?= $message ?? ""?>



<?php
include"footer.php";
include"scripts.php";
?>