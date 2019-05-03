<?php
    include "../include/header.php";
?>

<?php
    if( isset($_POST["book_isbn"]) && isset($_POST["user_mobile_no"]) && isset($_POST["amount"]) )
    {
        $book_isbn = mysql_entities_fix_string($db_server, $_POST["book_isbn"]);
        $user_mobile_no = mysql_entities_fix_string($db_server, $_POST["user_mobile_no"]);
        $amount = mysql_entities_fix_string($db_server, $_POST["amount"]);

        $query = "INSERT into payments (book_isbn, user_mobile_no, amount) values ( '$book_isbn', '$user_mobile_no', '$amount' )";
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
                    <div class="form-group">
                        Book ISBN:<input class="form-control" placeholder="Enter Book ISBN" value="" name="book_isbn" type="number" required autofocus="on">
                        User Mobile no:<input class="form-control" placeholder="Enter User Mobile no" value="" name="user_mobile_no" type="number" required>
                        Amount:<input class="form-control" placeholder="Enter Amount Paid" value="" name="amount" type="number" required>
                    </div>
                    <input type="Submit" value="Submit">
                </fieldset>
            </form>

        </div>
        <!-- /.panel-body -->
    </div>
</div>
<?php 
    include "../include/footer.php";
?>