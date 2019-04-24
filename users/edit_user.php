<?php
    ob_start();
    include "../include/header.php";
?>
<div class="page-header">
    Edit User Details
</div>
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form role="form" action="edit_user.php" method="post">
                <fieldset>
                    <?php
                    if(isset($_POST["user_id"]) && isset($_POST["username"]) && isset($_POST["contact_no"]) && isset($_POST["email_id"]))
                    {
                        $user_id= mysql_entities_fix_string($db_server, $_POST["user_id"]);
                        $username = mysql_entities_fix_string($db_server, $_POST["username"]);
                        $contact_no = mysql_entities_fix_string($db_server, $_POST["contact_no"]);
                        $email_id = mysql_entities_fix_string($db_server, $_POST["email_id"]);

                        $query = "UPDATE user SET username='$username', contact_no='$contact_no', email_id='$email_id' WHERE user_id=$user_id ";
                        $run = mysqli_query($db_server, $query);

                        if(!$run) die (mysqli_error($db_server));
                        else{
                            header("location:view_user.php");
                        }
                    }
                    else if(isset($_GET['user']))
                    {
                        $user_id= htmlentities($_GET['user']);
                        $query = "SELECT * FROM `user` where user_id='$user_id'";
                        $run = mysqli_query($db_server, $query);

                        if(!$run) die (mysqli_error($db_server));

                        $rows=mysqli_num_rows($run);

                        if($rows>0)
                        {
                            $row = mysqli_fetch_assoc($run);
                        }
                    }
                    else{
                        header("location:view_user.php");
                    }
                    ?>
                    <input type='hidden' name='user_id' value='<?php echo $row["user_id"]?>'>
                    <div class="form-group">
                        Username:<input class="form-control" value="<?php echo $row["username"]; ?>" name="username"
                            type="varchar" required autofocus="on">
                    </div>
                    <div class="form-group">
                        Contact no:<input class="form-control" value="<?php echo $row["contact_no"]; ?>" name="contact_no"
                            type="number" required>
                    </div>
                    <div class="form-group">
                        Email id:<input class="form-control" value="<?php echo $row["email_id"]; ?>" name="email_id" type="varchar" required>
                    </div>
                    <input type="Submit" value="Submit">
                </fieldset>
            </form>

        </div>
        <!-- /.panel-body -->
    </div>
</div>
<?php 
    include "../include/footer.php";
?>