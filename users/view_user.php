<?php
    include "../include/header.php";
?>
<div class="page-header">
    All User
</div>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Email id</th>
                        <th>Edit</th>
                    </tr>
                </thead>

        <?php

        $query = "SELECT user_id, username, contact_no, email_id FROM `user` where user_type=0 ORDER BY `username` ASC";
		$run = mysqli_query($db_server, $query);

		if(!$run) die (mysqli_error($db_server));

        $rows=mysqli_num_rows($run);
		echo "<tbody>";
		if($rows!=0)
		{
			for ($j = 0 ; $j < $rows ; ++$j)
			{
                $row = mysqli_fetch_assoc($run);
				echo "
				<tr>
                    <td>".($j+1)."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["contact_no"]."</td>
                    <td>".$row["email_id"]."</td>
                    <td>
                        <a href='edit_user.php?user=".$row["user_id"]."' class='btn btn-success'>Edit</a>
                    </td>
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
    include "../include/footer.php";
?>