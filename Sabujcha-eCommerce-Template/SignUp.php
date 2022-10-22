<?php

use App\Database\Models\User;
use App\Http\Requests\validation;

$title="register";
include "layout/header.php";
include "layout/navbar.php";
include "layout/breadcrub.php";
$validation=new validation;
if($_SERVER['REQUEST_METHOD'] == "POST"){


    $validation->setX($_POST['first_name'] ?? "")->setXname('first_name')->required()->str()->range(2,20);
    $validation->setX($_POST['last_name'] ?? "")->setXname('last_name')->required()->str()->range(2,20);
    $validation->setX($_POST['email'] ?? "")->setXname('email')->required()->
    regex('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/')->uniqe('users','email');
    $validation->setX($_POST['phone'] ?? "")->setXname('phone')->required()->regex('/01[0125][0-9]{8}$/')->
    uniqe('users','phone');
    $validation->setX($_POST['password'] ?? "")->setXname('password')->required()->
    regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 
    "Password should be at Minimum eight characters, at least one letter and one number")->
    confirmation($_POST['pass_confirm']);
    $validation->setX($_POST['pass_confirm'] ?? "")->setXname('pass_confirm')->required();
    $validation->setX($_POST['gender'] ?? "")->setXname('gender')->required()->in(['m','f']);

    if(empty ($validation->getErrors())){
        // echo"no validation error";die;
        $verifycode=rand(10000,99999);
        $user=new User;
        $user->setFirst_name($_POST['first_name'])
        ->setLast_name($_POST['last_name'])
        ->setEmail($_POST['email'])
        ->setPhone($_POST['phone'])
        ->setPassword($_POST['password'])
        ->setGender($_POST['gender'])
        ->setVerification_code($verifycode);
        if ($user->create()) {

            $_SESSION['verification-email']=$_POST['email'];
            header('location:verification-code.php');die;
        }else{
            $error="<div class='alert alert-danger'> We have a wrong in DB</div>";
        }
    }


}


?>
     
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                        <div class="login-register-form">
                                            <?= $error ?? ""?>
                                            <form  method="post">
                                                <input type="text" name="first_name" placeholder="First Name" 
                                                value="<?= $_POST['first_name'] ?? ""?>">
                                                <?= $validation->getErrorstyle('first_name')?>
                                                <input type="text" name="last_name" placeholder="Lasr Name"
                                                value="<?= $_POST['last_name'] ?? ""?>">
                                                <?= $validation->getErrorstyle('last_name')?>
                                                <input name="email" placeholder="Email" type="email"
                                                value="<?= $_POST['email'] ?? ""?>">
                                                <?= $validation->getErrorstyle('email')?>
                                                <input type="password" name="password" placeholder="Password">
                                                <?= $validation->getErrorstyle('password')?>
                                                <input type="password" name="pass_confirm" placeholder="Password_confirmation">
                                                <?= $validation->getErrorstyle('pass_confirm')?>
                                                <input type="number" name="phone" placeholder="phone"
                                                value="<?= $_POST['phone'] ?? ""?>">
                                                <?= $validation->getErrorstyle('phone')?>
                                                <select type="text" name="gender" placeholder="gender" class="form-control mb-4">
                                                    <option <?= $_POST['gender'] =='m' ? 'selected' : '' ?> value="m">Male</option>
                                                    <option <?= $_POST['gender'] =='f' ? 'selected' : ''?> value="f">Female</option>
                                                </select>
                                                <?= $validation->getErrorstyle('gender')?>
                                                <div class="button-box mt-4">
                                                    <button type="submit"><span>Register</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <?php
include "layout/footer.php";
include "layout/scripts.php";


?>