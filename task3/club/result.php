<?php
session_start();
$sports=[
  'football'=>$_SESSION['football'],
  
];
for($m = 1; $m<=$_SESSION['members'];$m++){
if($_SESSION['football']){
  $football=300;
}else{
  $football=0;
}
if($_SESSION['swimming']){
  $swimming=250;
}else{
  $swimming=0;
}
if($_SESSION['volly']){
  $volly=200;
}else{
  $volly=0;
}
if($_SESSION['others']){
  $others=100;
}else{
  $others=0;
}
$sum=$football+$swimming+$volly+$others;
}
include"header.php";
include"navbar.php";

?>

<div class="container p-4 mb-5">
<div class="border border-2 border-dark  mt-2  p-5 bg-dark">
    <table class="table text-light">
      <thead>
      <tr>
          <th scope="col">Subscriber</th>
          <th scope="col" colspan="5"><?=$_SESSION['name']
          
          ?></th>
          
        </tr>
        </thead>
        <tbody>
        <?php for($m = 1; $m<=$_SESSION['members'];$m++){?>
        <tr>
          <td scope="col">saeda</td>
          <td><?=$_SESSION['football']
          
          ?></td>
          <td><?=$_SESSION['swimming'] ?></td>
          <td><?=$_SESSION['volly'] ?></td>
          <td><?=$_SESSION['others']?></td>
          <td><?= $sum?></td>          
        </tr>
        <?PHP }?>
      </tbody>
    </table>
  </div>

  <h1 class="text-center mt-2 text-dark" style="font-size:55px; font-weight:700;">Sports</h1>

  <div class="border border-2 border-dark  mt-2  p-5 bg-dark">
    <table class="table text-light">
      <thead>
      
        <tr>
          <td scope="col">Football Club</td>
          <td scope="col"></td>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">Swimming Club</td>
          <td></td>
        
        </tr>
        <tr>
          <td scope="row"> Volly Club</td>
          <td></td>
          
        </tr>
        <tr>
        <td scope="col">Others Club</td>
          <td></td>
        </tr>
        <tr>
        <td scope="col">Club Subscrubtion</td>
          <td></td>
        </tr>
        <tr>
        <td scope="col">Total Price</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
    <?= $message ?? ""?>
</div>
</div>



<?php
include"footer.php";
include"scripts.php";
?>