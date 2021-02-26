<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 7:03 AM
 */

$page_title = "All Clients";
require_once 'config/core.php';
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
                <table class="table table-bordered" id="example1">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Company Name</th>
                        <th>Company Email Address</th>
                        <th>Company Phone Number</th>
                        <th>Rep. Name</th>
                        <th>Rep. Email Address</th>
                        <th>Rep. Phone Number</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Company Name</th>
                        <th>Company Email Address</th>
                        <th>Company Phone Number</th>
                        <th>Rep. Name</th>
                        <th>Rep. Email Address</th>
                        <th>Rep. Phone Number</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $sql = $db->query("SELECT * FROM ".DB_PREFIX."client_company ORDER BY id DESC");
                        while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= ucwords($rs['cname']) ?></td>
                                <td><?= $rs['cemail'] ?></td>
                                <td><?= $rs['cphone'] ?></td>
                                <td><?= ucwords($rs['rname']) ?></td>
                                <td><?= ucwords($rs['remail']) ?></td>
                                <td><?= ucwords($rs['rphone']) ?></td>
                                <td><?= status($rs['status']) ?></td>
                                <td><?= $rs['created_at'] ?></td>
                                <td><a href="view.php?id=<?= $rs['id'] ?>" class="btn btn-success">View</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php require_once 'assets/foot.php';?>
