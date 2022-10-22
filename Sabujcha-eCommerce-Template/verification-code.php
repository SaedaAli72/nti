<?php

use App\Database\Configration\Connection;
use App\Database\Models\User;
use App\Http\Requests\validation;
$validation = new validation;

$title="Verification Code";
include "layout/header.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $validation->setX($_POST['vrcode'])->setXname('vrcode')->required()->numaric()->digits(5);
    if (empty($validation->getErrors())) {
    $user= new User;
    $user->setEmail($_SESSION['verification-email'])->setVerification_code($_POST['vrcode']);
    $result= $user->checkcode();
    if ($result !== false) {
        if ($result->num_rows ==1) {
            # code...
            $user->setEmail_verified_at(date('Y-M-D H:I:S'));
            if($user->updateDate()){
                $success="<div class='alert alert-success'> wait few seconds</div>";
                header('refresh:2;url=login.php');
            }else{
                $error="<div class='alert alert-danger'> We have a wrong in DB</div>";
            };
        }else{
            $errorcode="<div class='text-danger font-weight-bold'> We have a wrong in code</div>";

        }
        # code...
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
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> <?= $title?> </h4>
                                </a>
                             
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <?= $error ?? ""?>
                                        <?= $success ?? ""?>
                                            <form  method="post">
                                                <input type="number" name="vrcode" placeholder="Verification Code">
                                                <?= $validation->getErrorstyle('vrcode')?>
                                                <?= $errorcode ?? ""?>
                                                <div class="button-box">
                                                    <button type="submit"><span>Submit</span></button>
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
include "layout/scripts.php";


?>