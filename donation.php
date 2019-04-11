<?php
include "include/connect.inc.php";
include "include/session.php";
?>

<?php

if(isset($_POST['title']) && isset($_POST['amount']))
{
    $title= htmlentities($_POST['title']);
    $amount = htmlentities($_POST['amount']);

    $query = "SELECT project_id from project where title='$title'";
    $run = mysqli_query($db_server,$query);
    if(!$run) die (mysqli_error($db_server));
    $rows=mysqli_num_rows($run);
    if($rows>0)
    {
        $row = mysqli_fetch_row($run);
        $project_id= $row[0];
    }
    $user_id = $_SESSION['id'];

    $query = "INSERT INTO `donations` (`user_id`, `project_id`, `amount`) VALUES ('$user_id', '$project_id', '$amount')";
    $run = mysqli_query($db_server, $query);

    if(!$run) die (mysqli_error($db_server));
    else{
        echo "<script>alert('Thanks you For Donation.');</script>";
    }

    $query = "UPDATE project SET amount_collected=amount_collected+'$amount' WHERE project_id='$project_id' ";
    $run = mysqli_query($db_server, $query);

    if(!$run) die (mysqli_error($db_server));   

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vinra</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<style type="text/css">
    .btn{
        padding: 4px 8px;
    }
</style>

</head>

<body>
    <div>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Vinra</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">&nbsp;</i><?php echo $user; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" style="min-height:600px;">

                    
                        <h1 class="page-header" align="center">
                            Choose Project to Donate
                        </h1>

                        <?php
                            $query= "SELECT title FROM project";
                            $run = mysqli_query($db_server,$query);
                            if(!$run) die (mysqli_error($db_server));
                            $rows=mysqli_num_rows($run);   
                        ?>
                    
                            <div class="col-md-4 col-md-offset-4">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">

                                        <form role="form" action="donation.php" method="post" id="my1" name="my1">
                                             <fieldset>
                                                <div class="form-group">
                                                     <label>Choose project:</label>
                                                     <select class="form-control" name="title" required>
                                                        <option>--SELECT--</option>
                                                        <?php
                                                                for($i=0;$i<$rows;$i++){
                                                                $row = mysqli_fetch_row($run);
                                                                echo "<option value='".$row[0]."'>".$row[0]."</option>"; 
                                                                } 
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount:</label><input class="form-control" placeholder="Enter Donation amount" id="amount" name="amount" type="number" required>
                                                </div>
                                                <input class="btn btn-success" type= "Submit" value="Submit">
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
