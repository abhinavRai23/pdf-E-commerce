<?php
include "include/header.php";
?>

<h1 class="page-header">
Edit Project
</h1>
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">

            <form role="form" action="edit_details.php" method="post" id="my1" name="my1">
                <fieldset>

<?php

if(isset($_POST["project_id"]) && isset($_POST["title"]) && isset($_POST["maker"]) && isset($_POST["amount"]) && isset($_POST["limit"]))
{
    $project_id= mysql_entities_fix_string($db_server, $_POST["project_id"]);
    $title= mysql_entities_fix_string($db_server, $_POST["title"]);
    $maker= mysql_entities_fix_string($db_server, $_POST["maker"]);
    $amount= mysql_entities_fix_string($db_server, $_POST["amount"]);
    $limit= mysql_entities_fix_string($db_server, $_POST["limit"]);

    $limit=date("Y-m-d",strtotime($limit));


    $query = "UPDATE project SET title='$title', maker='$maker',amount='$amount',time_limit='$limit' WHERE project_id='$project_id' ";
    $run = mysqli_query($db_server, $query);

    if(!$run) die (mysqli_error($db_server));
    else{
        echo "<script> alert('Value updated'); </script>";
    }
}


if(isset($_POST['project_id']) && isset($_POST['title']))
{
    $project_id=htmlentities($_POST['project_id']);
    $title=htmlentities($_POST['title']);
    $query = "SELECT * FROM `project` where project_id='$project_id' AND title='$title'";
    $run = mysqli_query($db_server, $query);

    if(!$run) die (mysqli_error($db_server));

    $rows=mysqli_num_rows($run);

    if($rows>0)
    {
        $row = mysqli_fetch_row($run);
    }
}    
?>   

                    <div class="form-group">
                        <input type='hidden' name='project_id' value='<?php echo $row[0]?>'>
                        Title:<input class="form-control" value="<?php echo $row[1]; ?>" name="title" id="title" type="varchar" required autofocus="on">
                    </div>
                    <div class="form-group">
                        Maker:<input class="form-control" value="<?php echo $row[2]; ?>" id="maker" name="maker" type="varchar" required>
                    </div>
                    <div class="form-group">
                        Target Amount:<input class="form-control" value="<?php echo $row[3]; ?>" id="amount" name="amount" type="number" required>
                    </div>
                    <div class="form-group">
                        Time Limit:<input class="form-control" name="limit" id="limit" type="date" value="<?php echo $row[5]; ?>"
                    </div>
                    <input type= "Submit" value="Submit">
                </fieldset>
            </form>

        </div>
        <!-- /.panel-body -->
    </div>
</div>    
<?php

    function mysql_entities_fix_string($db_server,$string)
      {
        return htmlentities($string);
      } 
include "include/footer.php";
?>    