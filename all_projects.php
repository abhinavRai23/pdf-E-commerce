<?php
include "include/header.php";
?>
<h1 class="page-header">
    All Projects
</h1>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Maker</th>
                        <th>Amount</th>
                        
                        <th>Amount Collected</th>
                        <th>Time_limit</th>
                        <th>Edit</th>
                    </tr>
                </thead>

        <?php

        $query = "SELECT * FROM `project` ORDER BY `project_id` ASC";
		$run = mysqli_query($db_server, $query);

		if(!$run) die (mysqli_error($db_server));

		$rows=mysqli_num_rows($run);
		echo "<tbody>";
		if($rows!=0)
		{
			for ($j = 0 ; $j < $rows ; ++$j)
			{
				$row = mysqli_fetch_row($run);
				echo "
				<tr>
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$row[3]."</td>
                    <td>".$row[4]."</td>
                    <td>".$row[5]."</td>
                    <td>
                        <form action='edit_details.php' method='post'>
                        <input type='hidden' name='project_id' value='$row[0]'>
                        <input type='hidden' name='title' value='$row[1]'>
                        <input type='submit' class='btn btn-success' value='Edit'></form>
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
include "include/footer.php";
?>