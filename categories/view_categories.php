<?php
    include "../include/header.php";
?>
<h1 class="page-header">
    All Categories
</h1>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <h4>Main Categories</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>View Sub Categories</th>
                    </tr>
                </thead>

        <?php
        $query = "SELECT * FROM `categories` where parent_category=0";
        $run = mysqli_query($db_server, $query);
        
		if(!$run) die (mysqli_error($db_server));

        $rows=mysqli_num_rows($run);
		echo "<tbody>";
		if($rows!=0)
		{
			for ($j = 0 ; $j < $rows ; ++$j)
			{
                $row = mysqli_fetch_assoc($run);

                $query = "SELECT * FROM `categories` where parent_category='$row[category_id]'";
                $sub_run = mysqli_query($db_server, $query);
                if(!$sub_run) die (mysqli_error($db_server));
                $sub_rows=mysqli_num_rows($sub_run);
                if($sub_rows){
                    $sub_content = "<table class='table table-bordered'>";
                    while($sub_row = mysqli_fetch_assoc($sub_run)){
                        $sub_content .= "<tr><td>".$sub_row["category_name"]."<a href='edit_category.php?category=".$sub_row["category_id"]."' class='btn btn-success pull-right'>Edit</a></td></tr>";
                    }
                    $sub_content .= "</table>"; 
                }
                else{
                    $sub_content = "<div class='text-danger'>*No Sub-categories found</div>";
                }
				echo "
				<tr>
                    <td>".($j+1)."</td>
                    <td>".$row["category_name"]."<a href='edit_category.php?category=".$row["category_id"]."' class='btn btn-danger pull-right'>Edit</a></td>
                    <td>".$sub_content."</td>
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