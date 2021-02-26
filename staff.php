<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 6:50 AM
 */

$page_title = "All Staff";
require_once 'config/core.php';
require_once 'assets/head.php';
?>

<div class="col-md-12">

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
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $sql = $db->query("SELECT * FROM ".DB_PREFIX."admin ORDER BY id DESC");
                            while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?= $sn++ ?></td>
                                    <td><?= $rs['username'] ?></td>
                                    <td><?= $rs['fname'] ?></td>
                                    <td><?= $rs['email'] ?></td>
                                    <td><?= $rs['phone'] ?></td>
                                    <td><?= $rs['gender'] ?></td>
                                    <td><?= $rs['created_at'] ?></td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- /.box -->
</div>

<?php require_once 'assets/foot.php';?>
