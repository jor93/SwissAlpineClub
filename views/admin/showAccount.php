<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 30.09.2016
 * Time: 10:14
 */
include_once ROOT_DIR. '/views/headeradmin.inc';


?>

<br />

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Welcome</h3>
                </div>
                <form id="editForm" action="<?php echo URL_DIR.'showuser/updateUserAccount';?>" method="post">
                    <div class="panel-body">
                        <div class="row">

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a id ="btn-save" type="submit" onclick="save()" class="btn btn-primary" style="display: none">Save</a>
                        <a id ="btn-edit" type="button" onclick="edit()" class="btn btn-primary">Edit</a>
                        <div class="pull-right">
                            <a href="resetpw.php" class="btn btn-primary">Change Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once ROOT_DIR . 'views/footer.inc';
?>
