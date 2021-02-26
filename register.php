<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 7:05 AM
 */

$page_title = "Register";
require_once 'config/core.php';
require_once 'libs/head.php';
?>

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li class="active"><span id="lblPageTitle">Company Profile</span>
                        |<span id="lblPageDescription">Create Profile</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Register as a Client</h1>
            </div>
        </div>
    </div>
</section>


<div id="ContentPlaceHolder1_UpdatePanel1" style="margin-bottom: 20px;">
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="card-header">Company Details</div>
                        <div class="card-body">



                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Company Details</div>
                        <div class="card-body">



                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>


<?php require_once 'libs/foot.php';?>
