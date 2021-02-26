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
                <table class="table table-bordered">
                    <tr>
                        <td>Company Name</td>
                        <td><?= $data['cname'] ?></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

</div>

<?php require_once 'assets/foot.php';?>
