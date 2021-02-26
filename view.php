<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 1:00 PM
 */

$page_title = "";
require_once 'config/core.php';
$company_id = $_GET['id'];
if (!isset($company_id)){
    redirect(base_url('404.php'));
    return;
}

$sql = $db->query("SELECT * FROM ".DB_PREFIX."client_company WHERE id='$company_id'");
if ($sql->rowCount() == 0){
    redirect(base_url('404.php'));
    return;
}
$data = $sql->fetch(PDO::FETCH_ASSOC);
$page_title = ucwords($data['cname']);

if (isset($_POST['update'])){
    $status = $_POST['status'];
}
require_once 'assets/head.php';
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $page_title ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">

            <div class="table-responsive">

                <h6 class="page-header">Company Details</h6>
                <table class="table table-bordered">
                    <tr>
                        <td>Company Name</td>
                        <td><?= ucwords($data['cname']) ?></td>
                    </tr>
                    <tr>
                        <td>TIN</td>
                        <td><?= $data['ctin'] ?></td>
                    </tr>
                    <tr>
                        <td>RC Number</td>
                        <td><?= $data['crc_number'] ?></td>
                    </tr>
                    <tr>
                        <td>Company Type</td>
                        <td><?= ucwords($data['ctype']) ?></td>
                    </tr>
                    <tr>
                        <td>Date Of Incorporation</td>
                        <td><?= $data['cdate_inc'] ?></td>
                    </tr>
                </table>

                <h6 class="page-header">Company Contact Information</h6>

                <table class="table table-bordered">
                    <tr>
                        <td>Company Phone Number</td>
                        <td><?= $data['cphone'] ?></td>
                    </tr>

                    <tr>
                        <td>Company Email Address</td>
                        <td><?= $data['cemail'] ?></td>
                    </tr>

                    <tr>
                        <td>Company State</td>
                        <td><?= $data['cstate'] ?></td>
                    </tr>

                    <tr>
                        <td>Company Address</td>
                        <td><?= $data['caddress'] ?></td>
                    </tr>

                    <tr>
                        <td>Company Status</td>
                        <td><?= status($data['status']) ?></td>
                    </tr>
                </table>

                <h6 class="page-header">Applicant Information</h6>

                <table class="table table-bordered">
                    <tr>
                        <td>Applicant Name</td>
                        <td><?= $data['rname'] ?></td>
                    </tr>

                    <tr>
                        <td>Applicant Email Address</td>
                        <td><?= $data['remail'] ?></td>
                    </tr>

                    <tr>
                        <td>Applicant Phone Number</td>
                        <td><?= $data['rphone'] ?></td>
                    </tr>
                </table>

                <h6 class="page-header">Applicant Documentation</h6>

                <table class="table table-bordered">
                    <tr>
                        <td>Pharmacist's License to Practise or Receipt of Payment for Renewal [Drug </td>
                        <td><a href="" class="btn btn-success">Download</a></td>
                    </tr>

                    <tr>
                        <td>Certificate Of Incorporation: [PDF] </td>
                        <td><a href="" class="btn btn-success">Download</a></td>
                    </tr>
                    <tr>
                        <td>Pharmacist's License to Practise or Receipt of Payment for Renewal Expiry Date: </td>
                        <td><?= $data['appdate'] ?></td>
                    </tr>
                </table>
            </div>

            <h6 class="page-header">Status</h6>
            <form action="" method="post">
                <div class="form-group">
                    <select name="status" class="form-control" required id="">
                        <option value="" disabled selected>Select</option>
                        <?php
                            foreach (array(0,1) as $value){
                                ?>
                                <option value="<?= $value ?>" <?= ($value == $data['status']) ? 'selected' : '' ?>><?= status($value) ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="update" class="btn btn-success" value="Submit" id="">
                </div>
            </form>

        </div>
    </div>

</div>

<?php require_once 'assets/foot.php';?>
