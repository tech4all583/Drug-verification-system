<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 6:18 AM
 */

$page_title = "Client";
require_once 'config/core.php';
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $db->query("SELECT * FROM ".DB_PREFIX."client_company WHERE remail='$email' and rpassword='$password'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);

    if ($sql->rowCount() == 0){
        set_flash("Invalid login details entered","danger");
    }elseif ($rs['status'] == 0){
        set_flash("Your registration still under review, you will get a notification when it has been approved","danger");
    }else{
        $_SESSION['client-loggein'] = true;
        $_SESSION[CLIENT_FOLDER] = $rs['remail'];
    }

}
require_once 'libs/head.php';
?>

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li class="active">
                        <span id="lblPageTitle">Page</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Loin as a Client</h1>
            </div>
        </div>
    </div>
</section>



<div class="container">

    <div class="row">
        <div class="col">

            <div class="featured-boxes">
                <div class="row">
                    <div class="col-md-6">

                        <div style="height: 511.031px; margin-top: 45px;">
                            <div class="box-content">
                                <h4 class="heading-primary text-uppercase mb-3">Are you new? Register An Account As a Client</h4>


                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <a href="<?= base_url('register.php') ?>">
                                            <img src="<?= image_url('reg.jpg') ?>" /></a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="featured-box featured-box-primary text-left mt-5">
                            <div class="box-content">
                                <h4 class="heading-primary text-uppercase mb-3">I'm a Returning Client ||  <u><a href="<?= base_url('register.php') ?>">Are you new? Register</a></u></h4>
                               <?php flash(); ?>
                                <form  method="post">
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>E-mail Address</label>
                                            <input name="email" type="text" required class="form-control form-control-lg" placeholder="Email Address" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Password</label>
                                            <input name="password" type="password" required tabindex="1" class="form-control form-control-lg" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-8">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme" />
                                                    Remember Me &nbsp;&nbsp;
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <input type="submit" class="btn btn-primary float-right mb-5" value="Login" name="" id="login">
                                        </div>
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

<?php require_once 'libs/foot.php'?>
