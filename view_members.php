<?php 
require "include/connect.inc.php"; 
	
if(isset($_POST['title']))
{	
	$title=htmlentities($_POST['title']);

	$query = "SELECT project_id from project where title='$title'";
	$row = mysqli_fetch_row(mysqli_query($db_server,$query));
	$project_id= $row[0];

	echo "Project:".$title;
	$query = "SELECT member_name from members WHERE project_id= '$project_id'";
	            $run = mysqli_query($db_server, $query);

	            if(!$run) die (mysqli_error($db_server));
	            $rows=mysqli_num_rows($run);
	            while($rows>0)
	            {   
	                $row = mysqli_fetch_row($run);
	                echo "<br>Member:".$row[0];
	                $rows--;
	            }
}	            

    $query= "SELECT title FROM project";
    $run = mysqli_query($db_server,$query);
    if(!$run) die (mysqli_error($db_server));
    $rows=mysqli_num_rows($run);   
?>

<form action="view_members.php" method="post">
	Choose Project:<select class="form-control" name="title" required>
	                    <option>--SELECT--</option>
	                    <?php
	                            for($i=0;$i<$rows;$i++){
	                            $row = mysqli_fetch_row($run);
	                            echo "<option value='".$row[0]."'>".$row[0]."</option>"; 
	                            }
	                    ?>
	                </select><br>
	<input type="submit" value="Submit">                
</form>
