<?php
    include "../include/header.php";
?>
<div class="page-header">
    View Payments
</div>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book ISBN</th>
                        <th>User Mobile</th>
                        <th>Amount</th>
                        <th>Time of Payment</th>
                        <th>Edit</th>
                    </tr>
                </thead>
        <?php

        $query = "SELECT * FROM `payments` ORDER BY `time_of_payment` DESC";
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
                    <td>".$row["book_isbn"]."</td>
                    <td>".$row["user_mobile_no"]."</td>
                    <td>".$row["amount"]."</td>
                    <td>".$row["time_of_payment"]."</td>
                    <td>
                        <a href='edit_payment.php?payment_id=".$row["payment_id"]."' class='btn btn-success'>Edit</a>
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