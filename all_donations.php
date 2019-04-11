<?php
include "include/header.php";
?>
<h1 class="page-header">
    All Donation
</h1>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>UserId</th>
                        <th>Client_details</th>
                        <th>ProjectID</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>
                </thead>

<?php


        if(isset($_POST['client_id'])){
            $client_id = htmlentities($_POST['client_id']);
            $query = "SELECT * from user WHERE user_id= '$client_id'";
            $run = mysqli_query($db_server, $query);

            if(!$run) die (mysqli_error($db_server));
            $rows=mysqli_num_rows($run);
            if($rows>0)
            {   
                $row = mysqli_fetch_row($run);
                echo "Username:".$row[1]."<br>Contact no:".$row[3]."<br>Email-id:".$row[4];
            }

        }

        $query = "SELECT * FROM `donations` ORDER BY `donation_id` ASC";
		$run = mysqli_query($db_server, $query);

		if(!$run) die (mysqli_error($db_server));

		$rows=mysqli_num_rows($run);
		echo "<tbody>";
		if($rows!=0)
		{
			for ($j = 0 ; $j < $rows ; ++$j)
			{
				$row = mysqli_fetch_row($run);
                $uid = $row[1];
                $username = mysqli_fetch_array(mysqli_query($db_server, "SELECT username FROM user WHERE user_id = '$uid'"), MYSQLI_BOTH)[0];
                $proj = mysqli_fetch_array(mysqli_query($db_server, "SELECT title FROM project WHERE project_id = '$row[2]'"), MYSQLI_BOTH)[0];
				echo "
				<tr>
                    <td>".$row[0]."</td>
                    <td>".$username."</td>
                    <td>
                        <form action='all_donations.php' method='post'>
                        <input type='hidden' name='client_id' value='$row[1]'>
                        <input type='submit' class='btn btn-success' value='See Details'>
                        </form>
                    </td>    
                    <td>".$proj."</td>
                    <td>".$row[3]."</td>
                    <td>".$row[4]."</td>
                </tr>
				";
			}	
		}
?>        
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>

<?php
include "include/footer.php";
?>