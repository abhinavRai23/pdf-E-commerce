<?php
include "include/header.php";
?>
<h1 class="page-header">
Add Project
</h1>
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">

            <form role="form" action="addProject.php" method="post" id="my1" name="my1">
                <fieldset>
                    <div class="form-group">
                        Title:<input class="form-control" placeholder="Enter Title" name="title" id="title" type="varchar" required autofocus="on">
                    </div>
                    <div class="form-group">
                        Maker:<input class="form-control" placeholder="Enter Maker name" id="maker" name="maker" type="varchar" required>
                    </div>
                    <div class="form-group">
                        Target Amount:<input class="form-control" placeholder="Enter amount needed" id="amount" name="amount" type="number" required>
                    </div>
                    <div class="form-group">
                        Time Limit:<input class="form-control" name="limit" id="limit" type="date" placeholder="Enter date">
                    </div>
                    <input type= "Submit" value="Submit">
                </fieldset>
            </form>

        </div>
        <!-- /.panel-body -->
    </div>
</div>    
<?php

if(isset($_POST["title"]) && isset($_POST["maker"]) && isset($_POST["amount"]) && isset($_POST["limit"]))
{
    $title= mysql_entities_fix_string($db_server, $_POST["title"]);
    $maker= mysql_entities_fix_string($db_server, $_POST["maker"]);
    $amount= mysql_entities_fix_string($db_server, $_POST["amount"]);
    $limit= mysql_entities_fix_string($db_server, $_POST["limit"]);

    $limit=date("Y-m-d",strtotime($limit));
    echo $title.'<br>'.$maker.'<br>'.$amount.'<br>'.$limit;


    $query = "INSERT INTO `project` (`project_id`, `title`, `maker`, `amount`, `time_limit`) VALUES (NULL, '$title', '$maker', '$amount', '$limit')";
    $run = mysqli_query($db_server, $query);

    if(!$run) die (mysqli_error($db_server));
}

    function mysql_entities_fix_string($db_server,$string)
      {
        return htmlentities($string);
      } 
include "include/footer.php";
?>    