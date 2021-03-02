<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2/26/21
 * Time: 1:00 PM
 */

$page_title = "Drug Registration";
require_once 'config/core.php';
if (isset($_POST['add'])){
    $data = $_POST;

    $name = strtolower($data['name']);
    $reg = $data['reg'];
    $status = $data['status'];
    $manufacture = $data['manufactured'];
    $comment = $data['comment'];

    $allowed = array('jpg','png');

    $folder = "../templates/img/";

    $sql = $db->query("SELECT * FROM ".DB_PREFIX."registered_drug WHERE reg_number='$reg' or name='$name'");

    if ($sql->rowCount() >= 1){
        $error[] = "Drug name or nafdac registration number has already exit";
    }

    if (strtolower($name) < 3 or strlen($name) > 100){
        $error[] = "Drug name should be between 3 - 100 characters";
    }

    if (isset($_FILES['upl'])){
        $file = $_FILES['upl'];
        $img_name = $file['name'];
        $size = $file['size'];

        $path = pathinfo($img_name,PATHINFO_EXTENSION);

        if (!in_array($path,$allowed)){
            $error[] = "Invalid image drug format, it should be jpg or png format";
        }

        if ($size > 1024){
            $error[] = "Image filesize is too long, please resize it to 1MB";
        }

        $img = time().$img_name;
        $destination = $folder.$img;

    }

    $error_count = count($error);
    if ($error_count == 0){

        if (move_uploaded_file($file['tmp_name'],$destination)){
            $db->query("INSERT INTO ".DB_PREFIX."registered_drug (images,name,reg_number,manufacture_id,comment,status)
            VALUES('$img','$name','$reg','$manufacture','$comment','$status')");

            set_flash("Drug has been registered successfully","info");
        }

    }else{
        $msg = ($error_count  ==1) ? 'An error is occurred' : 'Some error(s) are occurred';
        foreach ($msg as $value){
            $msg.='<p>'.$value.'</p>';
        }

        set_flash($msg,'danger');
    }
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

            <?php flash() ?>

            <form action="" enctype="multipart/form-data" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Drug Name</label>
                            <input type="text" class="form-control" value="<?= @$data['name'] ?>" name="name" required placeholder="Drug Name" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Nafdac Registration Number</label>
                            <input type="text" class="form-control" value="<?= @$data['reg'] ?>" required placeholder="Nafdac Registration Number" name="reg" id="">
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Manufactured Company</label>
                            <select name="manufactured" class="form-control" required id="">
                                <option value="" readonly="" selected>Select</option>
                                <?php
                                    $sql = $db->query("SELECT id,cname FROM ".DB_PREFIX."client_company WHERE status=1");
                                    while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <option value="<?= $rs['id'] ?>"><?= ucwords($rs['cname']) ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Laboratory Status</label>
                            <select name="status" class="form-control" required id="">
                                <option value="" disabled selected>Select</option>
                                <?php
                                    foreach (array(0,1) as $value){
                                        ?>
                                        <option value="<?= $value ?>"><?= drug_status($value) ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Laboratory Analysis Comment</label>
                            <textarea name="comment" class="form-control" required style="resize: none; max-height: 35px;" id=""  placeholder="Laboratory Analysis Comment"><?= @$data['comment'] ?></textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Drug Image</label>
                            <input type="file" name="upl" accept="image/*" id="">
                            <br>
                            <p>Please Note :</p>
                            <ol>
                                <li> Only jpg, png file extension are allowed </li>
                                <li>Image should not exceed 1MB filesize</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Submit" name="add" id="">
                </div>
            </form>

        </div>
    </div>

</div>

<?php require_once 'assets/foot.php';?>
