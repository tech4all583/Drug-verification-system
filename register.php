<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 7:05 AM
 */

$page_title = "Register";
require_once 'config/core.php';
if (isset($_POST['register'])){
    $data = $_POST;
    $file = $_FILES;

    $cname = strtolower($data['cname']);
    $ctin = $data['ctin'];
    $crc_number = $data['crc_number'];
    $cdate_inc = $data['cdate_inc'];
    $cphone = $data['cphone'];
    $cemail = $data['cemail'];
    $cstate = $data['cstate'];
    $caddress = $data['caddress'];
    $rname = $data['rname'];
    $remail = $data['remail'];
    $rphone = $data['rphone'];
    $rpassword = $data['rpassword'];
    $appdate = $data['appdate'];

    $allowed = array('pdf');
    $folder = "templates/documents/";

    $sql = $db->query("SELECT * FROM ".DB_PREFIX."client_company WHERE cname='$cname'");
    if ($sql->rowCount() >=  1){
        $error[] = "$cname has already registered by another company";
    }

    $sql_check = $db->query("SELECT * FROM ".DB_PREFIX."client_company WHERE remail='$remail' and rphone='$rphone'");
    if ($sql_check->rowCount() >= 1){
        $error[] = "Applicant email address or phone number has already exist";
    }

    if (!is_numeric($rphone) or strlen($rphone) != 11){
        $error[] = "Invalid representative phone number entered, it should be digit number and should not exceed 11 digit number";
    }

    if (strlen($cphone) != 11 or !is_numeric($cphone)){
        $error[] = "Invalid company phone number entered, it should be digit number and should not exceed 11 digit number";
    }

    if (strlen($cname) < 3 or strlen($cname) > 100){
        $error[] = "Company name should be between 3 - 100 characters";
    }

    if (strlen($rname) < 3 or strlen($rname) > 100){
        $error[] = "Representative name should be between 3 - 100 characters";
    }

    if (strlen($cemail) < 8 or strlen($cemail) > 200){
        $error[] = "Company email address should be between 8 - 100 characters";
    }

    if (strlen($remail) < 8 or strlen($remail) > 200){
        $error[] = "Representative email address should be between 8 - 100 characters";
    }

    if (isset($file['app_license_pdf'])){
        $app_license_pdf = $file['app_license_pdf']['name'];
        $path = pathinfo($app_license_pdf, PATHINFO_EXTENSION);
        $size = $file['app_license_pdf']['size'];

        if (!in_array($path,$allowed)){
            $error[] = "Invalid pharmacist's licence format, it should be only pdf";
        }

        $app_license_pdf_name = time().$app_license_pdf;
        $destination = $folder.$app_license_pdf_name;

    }

    if (isset($file['app_certificate_pdf'])){
        $app_certificate_pdf = $file['app_certificate_pdf']['name'];
        $path = pathinfo($app_certificate_pdf, PATHINFO_EXTENSION);

        if (!in_array($path,$allowed)){
            $error[] = "Invalid Certificate Of Incorporation format, it should be only pdf";
        }

        $app_certificate_pdf_name = uniqid().$app_certificate_pdf;
        $destination2 = $folder.$app_certificate_pdf_name;
    }

    $error_count = count($error);
    if ($error_count == 0){


        if (move_uploaded_file($file['app_license_pdf']['tmp_name'], $destination) &&
            move_uploaded_file($file['app_certificate_pdf']['tmp_name'], $destination2)){

            $db->query("INSERT INTO ".DB_PREFIX."client_company 
            (rname,remail,rphone,rpassword,cname,ctin,ctype_agency,crc_number,ctype,cdate_inc,
            cphone,cemail,cstate,caddress,app_license_pdf,appdate,app_certificate_pdf)
            VALUES('$rname','$remail','$rphone','$rpassword','$cname','$ctin','$ctype_agency',
            '$crc_number','$ctype','$cdate_inc',
            '$cphone','$cemail','$cstate','$caddress','$app_license_pdf_name','$appdate','$app_certificate_pdf_name')");

            set_flash("Registration was successfully, please wait for minute to review your document",'success');

            //redirect(base_url('register.php'));
        }

    }else{
        $msg = ($error_count == 1) ? 'An error occurred' : 'Some error(s) occurred';
        foreach ($error as $value){
            $msg.='<p>'.$value.'</p>';
        }
        set_flash($msg,'danger');
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

                        <?php flash(); ?>

                        <div class="card">
                            <div class="card-header">Company Details</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Company Name</label>
                                            <input type="text" class="form-control" value="<?= @$data['cname'] ?>" placeholder="Company Name" required name="cname" id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">TIN</label>
                                            <input type="text" class="form-control" value="<?= @$data['ctin'] ?>" name="ctin" required placeholder="TIN" id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Type Of Agency</label>
                                            <select name="ctype_agency" class="form-control" required id="">
                                                <option value="" disabled selected>Select</option>
                                                <option>Government</option>
                                                <option>Non-government</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">RC Number</label>
                                            <input type="text" class="form-control" value="<?= @$data['crc_number'] ?>" name="crc_number" required placeholder="RC Number" id="">
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
                                            <input type="date" class="form-control" value="<?= @$data['cdate_inc'] ?>" name="cdate_inc" required placeholder="Date Of Incorporation" id="">
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
                                            <input type="text" class="form-control" value="<?= @$data['cphone'] ?>" required placeholder="Company Phone Number" name="cphone" id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Company Email Address</label>
                                            <input type="email" class="form-control" value="<?= @$data['cemail'] ?>" required placeholder="Company Email Address"  name="cemail" id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Company State</label>
                                            <select class="form-control" name="cstate" required="">
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
                                            <textarea name="caddress" class="form-control" style="resize: none; max-height: 38px;" placeholder="Company Address" required id=""><?= @$data['caddress'] ?></textarea>
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
                                            <input type="text" class="form-control" required name="rname" placeholder="Representative Full Name" value="<?= @$data['rname'] ?>" id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Representative Email Address</label>
                                            <input type="email" name="remail" class="form-control" placeholder="Representative Email Address" value="<?= @$data['remail'] ?>" id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Representative Phone Number</label>
                                            <input type="text" name="rphone" class="form-control" placeholder="Representative Phone Number" value="<?= @$data['rphone'] ?>" id="">
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
                                            <input type="file" name="app_license_pdf" accept="application/pdf" required id="">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Pharmacist's License to Practise or Receipt of Payment for Renewal Expiry Date: </label>
                                            <input type="date" name="appdate" value="<?= @$data['appdate'] ?>" class="form-control" required id="">
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Certificate Of Incorporation: [PDF] </label> <br>
                                            <input type="file" name="app_certificate_pdf" accept="application/pdf" required id="">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <center>
                                <input type="submit" class="btn btn-primary" value="Submit" name="register" id="">
                            </center>
                        </div>

                    </div>
            </form>
        </div>
    </div>


<?php require_once 'libs/foot.php';?>