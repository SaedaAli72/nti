<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $add=$_POST['add'];
        $sub=$_POST['sub'];
        $div=$_POST['div'];
        $mul=$_POST['mul'];
        if($add == "+"){
            $result= $_POST['num1']+$_POST['num2'];
        }elseif($sub == "-"){
            $result= $_POST['num1']-$_POST['num2'];
        }elseif($div == "/"){
            $result= $_POST['num1']/$_POST['num2'];
        }elseif($mul =="*"){
            $result= $_POST['num1']*$_POST['num2'];
        };


        $message="<div class='alert alert-success w-25 mt-2'>
        {$result}
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
            <label for="">Num1</label>
            <input type="text" name="num1" class="form-control w-25">
            <label for="">Num2</label>
            <input type="text" name="num2" class="form-control w-25">
            <input type="submit" class="btn btn-danger  mt-3" value="+" name="add">
            <input type="submit" class="btn btn-danger  mt-3" value="-" name="sub">
            <input type="submit" class="btn btn-danger  mt-3" value="/" name="div">
            <input type="submit" class="btn btn-danger  mt-3" value="*" name="mul">

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