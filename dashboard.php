<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 6:39 AM
 */

$page_title = "Dashboard";
require_once 'config/core.php';
require_once 'assets/head.php';
?>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green-gradient">
        <div class="inner">
            <h3>
                <?php
                $sql = $db->query("SELECT * FROM ".DB_PREFIX."admin");
                echo $sql->rowCount();
                ?>
            </h3>
            <p class="text-uppercase">All Nafdac Staff</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
        <a href="<?= base_url('staff.php') ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green-gradient">
        <div class="inner">
            <h3>
                <?php
                $sql = $db->query("SELECT * FROM ".DB_PREFIX."client_company WHERE status IN(1)");
                echo $sql->rowCount();
                ?>
            </h3>
            <p class="text-uppercase">All Clients Approved Company</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
        <a href="<?= base_url('client.php') ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red-gradient">
        <div class="inner">
            <h3>
                <?php
                $sql = $db->query("SELECT * FROM ".DB_PREFIX."client_company WHERE status IN(0)");
                echo $sql->rowCount();
                ?>
            </h3>
            <p class="text-uppercase">All Clients unapproved Company</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
        <a href="<?= base_url('client.php') ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-purple-gradient">
        <div class="inner">
            <h3>
                <?php
                $sql = $db->query("SELECT * FROM ".DB_PREFIX."registered_drugs WHERE status IN(1)");
                echo $sql->rowCount();
                ?>
            </h3>
            <p class="text-uppercase">All Approved Drugs Registration</p>
        </div>
        <div class="icon">
            <i class="fab fa-dropbox"></i>
        </div>
        <a href="<?= base_url('all-drugs.php') ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow-gradient">
        <div class="inner">
            <h3>
                <?php
                $sql = $db->query("SELECT * FROM ".DB_PREFIX."registered_drugs WHERE status IN(0)");
                echo $sql->rowCount();
                ?>
            </h3>
            <p class="text-uppercase">All Under Revision Drugs Registration</p>
        </div>
        <div class="icon">
            <i class="fab fa-dropbox"></i>
        </div>
        <a href="<?= base_url('all-drugs.php') ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green-gradient">
        <div class="inner">
            <h3>
                0
            </h3>
            <p class="text-uppercase">All Clients Productions</p>
        </div>
        <div class="icon">
            <i class="fa fa-users"></i>
        </div>
        <a href="<?= base_url('client.php') ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>


<?php require_once 'assets/foot.php'?>
