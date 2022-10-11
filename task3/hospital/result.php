<?php
session_start();

if( $_SESSION['hygiene']=='bad' ||
    $_SESSION['servies']=='bad' || 
    $_SESSION['nurse']=='bad' ||
    $_SESSION['doctor']=='bad' || 
    $_SESSION['nurse']=='bad'){
         $result1=25;
}else{
  $result1=0;

}
if( $_SESSION['hygiene']=='good' ||
    $_SESSION['servies']=='good' || 
    $_SESSION['nurse']=='good' ||
    $_SESSION['doctor']=='good' || 
    $_SESSION['nurse']=='good'){
         $result2=50;
}else{
  $result2=0;

}
if( $_SESSION['hygiene']=='verygood' ||
    $_SESSION['servies']=='verygood' || 
    $_SESSION['nurse']=='verygood' ||
    $_SESSION['doctor']=='verygood' || 
    $_SESSION['nurse']=='verygood'){
         $result3=75;
}else{
       $result3=0;
}
if( $_SESSION['hygiene']=='excellent' ||
    $_SESSION['servies']=='excellent' || 
    $_SESSION['nurse']=='excellent' ||
    $_SESSION['doctor']=='excellent' || 
    $_SESSION['nurse']=='excellent'){
         $result4=100;
}else{
  $result4=0;

}

$result=($result1+$result2+$result3+$result4)/400 *100 ;

if($result<=25){
  $message="<h3 class='bg-danger text-center p-3 mb-0 text-light'>The result is Bad</h3>
            <p class='bg-dark text-center p-2  text-light'>We will call you later on this " .$_SESSION['number']."</p>";
}elseif($result>25 && $result<=50){
  $message="<h3 class='bg-success text-center p-3 mb-0 text-light'>The result is Good</h3>
           <p class='bg-dark text-center p-2  text-light'>Thank You</p>";
}elseif($result>50 && $result<=75){
  $message="<h3 class='bg-success text-center p-3 mb-0 text-light'>The result is Verygood</h3>
  <p class='bg-dark text-center p-2  text-light'>Thank You</p>";
}elseif($result>75 && $result<=100){
  $message="<h3 class='bg-success text-center p-3 mb-0 text-light'>The result is Excellent</h3> 
  <p class='bg-dark text-center p-2  text-light'>Thank You</p>";
}


include"header.php";
include"navbar.php";
?>
      
<div class="container p-4 mb-5">
<div class="border border-2 border-dark  mt-2  p-5 bg-dark">
    <table class="table text-light">
      <thead>
      <tr>
          <th scope="col">Questions</th>
          <th scope="col">Evaluation</th>
          
        </tr>
        <tr>
          <td scope="col">Are you satisfied with the level of hygiene?</td>
          <td scope="col"><?= $_SESSION['hygiene'];?></td>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">Are you satisfied with the price of service?</td>
          <td><?= $_SESSION['servies'];?></td>
        
        </tr>
        <tr>
          <td scope="row">Are you satisfied with the nursing servise?</td>
          <td><?= $_SESSION['nurse'];?></td>
          
        </tr>
        <tr>
        <td scope="col">Are you satisfied with the level of doctors?</td>
          <td><?= $_SESSION['doctor'];?></td>
        </tr>
        <tr>
        <td scope="col">Are you satisfied with the calmness of hospital?</td>
          <td><?= $_SESSION['calm'];?></td>
        </tr>
      </tbody>
    </table>
  </div>
    <?= $message ?? ""?>
</div>

    <?php
include"footer.php";
include"scripts.php";
?>