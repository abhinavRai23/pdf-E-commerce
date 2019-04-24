<?php
    ob_start();
    include "../include/header.php";
?>
<div class="page-header">
    Edit Category Infomation
</div>
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form role="form" action="edit_category.php" method="post">
                <fieldset>
                    <?php
                    if( isset($_POST["category_id"]) && isset($_POST["category_name"]) && isset($_POST["parent_category"]) )
                    {
                        $category_id= mysql_entities_fix_string($db_server, $_POST["category_id"]);
                        $category_name = mysql_entities_fix_string($db_server, $_POST["category_name"]);
                        $parent_category = mysql_entities_fix_string($db_server, $_POST["parent_category"]);

                        $query = "UPDATE categories SET category_name='$category_name', parent_category='$parent_category' WHERE category_id=$category_id ";
                        $run = mysqli_query($db_server, $query);

                        if(!$run) die (mysqli_error($db_server));
                        else{
                            header("location:view_categories.php");
                        }
                    }
                    else if(isset($_GET['category']))
                    {
                        $category_id= htmlentities($_GET['category']);
                        $query = "SELECT * FROM `categories` where category_id='$category_id'";
                        $run = mysqli_query($db_server, $query);

                        if(!$run) die (mysqli_error($db_server));

                        $rows=mysqli_num_rows($run);

                        if($rows>0)
                        {
                            $row = mysqli_fetch_assoc($run);
                        }
                    }
                    else{
                        header("location:view_categories.php");
                    }
                    ?>
                    <input type='hidden' name='category_id' value='<?php echo $row["category_id"]?>'>
                    <div class="form-group">
                        Category Name:<input class="form-control" value="<?php echo $row["category_name"]; ?>" name="category_name"
                            type="varchar" required autofocus="on">
                    </div>
                    <div class="form-group">
                        Parent Category:<select class="form-control" placeholder="Choose Parent Category" value="" name="parent_category" type="select" required>
                            <option value="" selected disabled>Choose</option>
                            <option value="0">--None--</option>
                            <?php
                                $query = "SELECT * FROM `categories` WHERE parent_category=0";
                                $run = mysqli_query($db_server, $query);
        
                                if(!$run) die (mysqli_error($db_server));
        
                                $rows=mysqli_num_rows($run);
        
                                if($rows>0)
                                {
                                    while($row = mysqli_fetch_assoc($run)){
                            ?>
                                    <option value="<?php echo $row["category_id"]; ?>">
                                        <?php echo $row["category_name"]; ?>
                                    </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
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