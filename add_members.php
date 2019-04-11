<?php require "include/connect.inc.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php

error_reporting(0);

	if(isset($_POST['title']))
	{
		$i=1;	
		while(isset($_POST['mem'.$i]))
		{	
				$mem[$i]=htmlentities($_POST['mem'.$i]);
			    $i++;
		}	    
		$title=htmlentities($_POST['title']);

	    $query = "SELECT project_id from project where title='$title'";
        $row = mysqli_fetch_row(mysqli_query($db_server,$query));
        $project_id= $row[0];

			$i=1;
		while($mem[$i])
		{
			$query = "INSERT INTO `members` (`project_id`, `member_name`) VALUES ('$project_id', '$mem[$i]')";
		    $run = mysqli_query($db_server, $query);

		    if(!$run) die (mysqli_error($db_server));
		    // else echo "<script>alert('Memebers Added');</script>";
		    $i++;
		}	
	}			


    $query= "SELECT title FROM project";
    $run = mysqli_query($db_server,$query);
    if(!$run) die (mysqli_error($db_server));
    $rows=mysqli_num_rows($run);   
?>
<body>

	<form action="add_members.php" method="post">
		Choose Project:<select class="form-control" name="title" required>
                            <option>--SELECT--</option>
                            <?php
                                    for($i=0;$i<$rows;$i++){
                                    $row = mysqli_fetch_row($run);
                                    echo "<option value='".$row[0]."'>".$row[0]."</option>"; 
                                    }
                            ?>
                        </select><br>
		Member1:<Input type="text" name="mem1"><br>
		Member2:<Input type="text" name="mem2"><br>

		<div id="members"></div>


		<script type="text/javascript">
			var i=3;
			var msg="";
			function addMem(){
				msg=document.getElementById("members").innerHTML;
				document.getElementById("members").innerHTML= msg+"Member"+i+":<Input type='text' name='mem"+i+"'><br>";
				i++;
			} 
		</script>
		<input type="button" value="Add members" onClick="addMem();">
		<Input type="submit" value="Submit">

	</form>

</body>
</html>