<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sub1= floatval($_POST['sub1']);
        $sub2= floatval($_POST['sub2']);
        $sub3= floatval($_POST['sub3']);
        $sub4= floatval($_POST['sub4']);
        $sub5= floatval($_POST['sub5']);
        
        $result= (($sub1 + $sub2 + $sub3 + $sub4 + $sub5)/500 )*100;
        if($result>=90){
            $grade="Grade A";
        }elseif($result<90 && $result>=80){
            $grade="Grade B";

        }elseif($result<80 && $result>=70){
            $grade="Grade C";

        }elseif($result<70 && $result>=60){
            $grade="Grade D";

        }elseif($result<60 && $result>=40){
            $grade="Grade E";

        }elseif($result<40){
            $grade="Grade F";

        };

        $message="<div class='alert alert-success w-25 mt-2'>
        {$result}%  <br>  {$grade} 
        </div>";


    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form action="" method="post" class="mt-5 center">
            <label for="">sub1</label>
            <input type="text" name="sub1" class="form-control w-25">
            <label for="">sub2</label>
            <input type="text" name="sub2" class="form-control w-25">
            <label for="">sub3</label>
            <input type="text" name="sub3" class="form-control w-25">
            <label for="">sub4</label>
            <input type="text" name="sub4" class="form-control w-25">
            <label for="">sub5</label>
            <input type="text" name="sub5" class="form-control w-25">
            <input type="submit" class="form-control w-25 mt-3 btn btn-danger">

        </form>
            <?php 
            if($_POST){
            echo $message;
            };
            ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>