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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="alert alert-success"><i class="fa fa-info-circle"></i> Please Note : All field(s) are required</div>

                    <div class="card">
                        <div class="card-header">Company Details</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Company Name</label>
                                        <input type="text" class="form-control" placeholder="Company Name" required name="cname" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">TIN</label>
                                        <input type="text" class="form-control" name="ctin" required placeholder="TIN" id="">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Type Of Agency</label>
                                        <select name="ctype-agency" class="form-control" required id="">
                                            <option value="" disabled selected>Select</option>
                                            <option>Government</option>
                                            <option>Non-government</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">RC Number</label>
                                        <input type="text" class="form-control" name="crc-number" required placeholder="RC Number" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Company Type</label>
                                        <select name="ctype" class="form-control" required id="">
                                            <option value="" disabled selected>Select</option>
                                            <?php
                                                foreach (array('small scale','medium / large scale','micro enterprise') as $value){
                                                    ?>
                                                    <option value="<?= $value ?>"><?= ucwords($value) ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Date Of Incorporation</label>
                                        <input type="date" class="form-control" name="cdate-inc" required placeholder="Date Of Incorporation" id="">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Company Contact Information</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Company Phone Number</label>
                                        <input type="text" class="form-control" required placeholder="Company Phone Number" name="cphone" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Company Email Address</label>
                                        <input type="email" class="form-control" required placeholder="Company Email Address"  name="cemail" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Company State</label>
                                        <select class="form-control" name="state" required="">
                                            <option value="">State of Origin</option>
                                            <?php
                                            $s = array("Abia State","Adamawa State","Akwa Ibom State","Anambra State","Bauchi State","Bayelsa State","Benue State","Borno State","Cross River State","Delta State","Ebonyi State","Edo tate","Ekiti State","Enugu State","FCT","Gombe State","Imo State","Jigawa State","Kaduna State","Kano State","Katsina state","Kebbi State","Kogi State","Kwara State","Lagos State","Nasarawa State","Niger State","Ogun State","Ondo State","Osun State","Oyo State","Plateau State","Rivers State","Sokoto State","Taraba State","Yobe State","Zamfara State");
                                            foreach ($s as $key) {
                                                echo "<option>$key</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Company Address</label>
                                        <textarea name="caddress" class="form-control" style="resize: none; max-height: 38px;" placeholder="Company Address" required id=""></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Applicant Information</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Representative Full Name</label>
                                        <input type="text" class="form-control" required name="rname" placeholder="Representative Full Name" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Representative Email Address</label>
                                        <input type="email" name="remail" class="form-control" placeholder="Representative Email Address" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Representative Phone Number</label>
                                        <input type="text" name="rphone" class="form-control" placeholder="Representative Phone Number" id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Representative Password</label>
                                        <input type="password" name="rpassword" class="form-control" placeholder="Representative Password" id="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Applicant Documentation</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> Pharmacist's License to Practise or Receipt of Payment for Renewal [Drug  </label> <br>
                                        <input type="file" name="app-license-pdf" accept="application/pdf" required id="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Pharmacist's License to Practise or Receipt of Payment for Renewal Expiry Date: </label>
                                        <input type="date" name="appdate" class="form-control" required id="">
                                    </div>
                                </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for=""> Certificate Of Incorporation: [PDF] </label> <br>
                                    <input type="file" name="app-certificate-pdf" accept="application/pdf" required id="">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <center>
                        <input type="submit" class="btn btn-primary" value="Submit" name="" id="">
                    </center>
                </div>

            </div>
        </form>
    </div>
</div>


<?php require_once 'libs/foot.php';?>
