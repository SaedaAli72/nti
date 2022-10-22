<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // print_r($_POST);
    if(empty($_POST['name'])){
      // error
      $error="<p class='text-danger font-weight-bold'>The Member Name is required</p>";
    }
     
    if(empty($error)){
        // if(empty($error)){
        //     if($_POST['football[]'] == 1){
        //   $_SESSION['football']= $_POST['football[]'];
        //     }else{
        //         $_SESSION['football']= "";
    
        //     }
        //     if($_POST['swimming[]'] == 1){
        //         $_SESSION['swimming']= $_POST['swimming[]'];
        //     }else{
        //               $_SESSION['swimming']= "";
          
        //           }
        //     if($_POST['volly[]'] == 1){
        //         $_SESSION['volly']= $_POST['volly[]'];
        //     }else{
        //                 $_SESSION['volly']= "";
            
        //             }   
        //     if($_POST['others[]'] == 1){
        //         $_SESSION['others']= $_POST['others[]'];
        //     }else{
        //                 $_SESSION['others']= "";
            
        //             }   
    
      $_SESSION['football']= $_POST['football[  ]'];
      $_SESSION['swimming']= $_POST['swimming[]'];
      $_SESSION['volly']= $_POST['volly[]'];
      $_SESSION['others']= $_POST['others[]'];

      header('location:result.php');die;
    }
  }
  

include"header.php";
include"navbar.php";

?>
<h1 class="text-center mt-3 text-dark" style="font-size:55px; font-weight:700;">Club</h1>


    <div class="container text-start w-50">
    <form action="" method="POST" class="w-50">
    <?php for($m = 1; $m<=$_SESSION['members'];$m++){?>
        <section>
            <label for="exampleInputEmail1" class="form-label text-dark" style="font-weight: 700; font-size:22px;">Member <?=$m?></label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" 
                        value="<?= $_POST['name'] ?? ""?>">
                        <?= $error ?? ""?>


            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="football" id="flexCheckChecked" name="football[]" >
            <label class="form-check-label" for="flexCheckChecked">
                Football
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="swimming" id="flexCheckChecked" name="swimming[]">
            <label class="form-check-label" for="flexCheckChecked">
                Swimming
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="volly" id="flexCheckChecked" name="volly[]">
            <label class="form-check-label" for="flexCheckChecked">
                Volly
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="others" id="flexCheckChecked" name="others[]">
            <label class="form-check-label" for="flexCheckChecked">
                Others
            </label>
            </div>
        </section>
        <?PHP }?>
        <button type="submit" class="btn btn-primary w-100 ">Submit</button>
    </form>

    </div>

<?php
include"footer.php";
include"scripts.php";
?>