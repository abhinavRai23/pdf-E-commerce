<?php
    include "../include/header.php";
?>
<?php
    if( isset($_POST["payment_id"]) && isset($_POST["book_isbn"]) && isset($_POST["user_mobile_no"]) && isset($_POST["amount"]) )
    {
        $payment_id = mysql_entities_fix_string($db_server, $_POST["payment_id"]);
        $book_isbn = mysql_entities_fix_string($db_server, $_POST["book_isbn"]);
        $user_mobile_no = mysql_entities_fix_string($db_server, $_POST["user_mobile_no"]);
        $amount = mysql_entities_fix_string($db_server, $_POST["amount"]);

        $query = "UPDATE payments SET book_isbn='$book_isbn', user_mobile_no='$user_mobile_no', amount='$amount' WHERE payment_id='$payment_id'";

        $run = mysqli_query($db_server, $query);

        if(!$run) die (mysqli_error($db_server));
        else{
            header("location:view_payments.php");
        }
    }
?>
<div class="page-header">
    Add Payment
</div>
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form role="form" method="post">
                <fieldset>
                <?php
                    if(isset($_GET["payment_id"])){

                        $payment_id= mysql_entities_fix_string($db_server, $_GET["payment_id"]);

                        $query = "SELECT * FROM `payments` where payment_id='$payment_id'";
                        $run = mysqli_query($db_server, $query);

                        if(!$run) die (mysqli_error($db_server));

                        $rows=mysqli_num_rows($run);

                        if($rows>0)
                        {
                            $row = mysqli_fetch_assoc($run);
                        }
                        else{
                            header("location:view_payments.php");
                        }
                    }
                    else{
                        header("location:view_payments.php");
                    }
                ?>
                    <div class="form-group">
                        <input value="<?php echo $row["payment_id"]; ?>" name="payment_id" type="hidden" required>
                        Book ISBN:<input class="form-control" placeholder="Enter Book ISBN"value="<?php echo $row["book_isbn"]; ?>" name="book_isbn" type="number" required autofocus="on">
                        User Mobile no:<input class="form-control" placeholder="Enter User Mobile no" value="<?php echo $row["user_mobile_no"]; ?>" name="user_mobile_no" type="number" required>
                        Amount:<input class="form-control" placeholder="Enter Amount Paid" value="<?php echo $row["amount"]; ?>" name="amount" type="number" required>
                    </div>
                    <input type="Submit" value="Submit">
                </fieldset>
            </form>

        </div>
        <!-- /.panel-body -->
    </div>
</div>