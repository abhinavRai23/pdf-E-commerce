<?php
    include "../include/header.php";
?>
<div class="page-header">
    View Books
</div>

<?php
    if( isset($_POST["isbn"]) ){
        $isbn = mysql_entities_fix_string($db_server, $_POST["isbn"]);

        $query = "DELETE from books WHERE isbn='$isbn' ";

        $run = mysqli_query($db_server, $query);

        if(!$run) die (mysqli_error($db_server));
        else{
            header("location:view_books.php");
        }
    }
?>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="60">S. No</th>
                        <th width="300">Poster</th>
                        <th>Book Info</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $query = "SELECT `category_id`, `category_name` from categories where parent_category!=0";
                        $cat_run = mysqli_query($db_server, $query);
                        if(!$cat_run) die (mysqli_error($db_server));
                        $catg=mysqli_fetch_all($cat_run);

                        $query = "SELECT * FROM `books` ORDER BY `title` ASC";
                        $run = mysqli_query($db_server, $query);

                        if(!$run) die (mysqli_error($db_server));

                        $rows=mysqli_num_rows($run);
                        if($rows!=0)
                        {
                            for ($j = 0 ; $j < $rows ; ++$j)
                            {
                                $row = mysqli_fetch_assoc($run);

                                for($i=0; $i<count($catg); $i++){
                                    if($catg[$i][0]==$row["category_id"]){
                                        $cat = $catg[$i][1];
                                    }
                                }
                                echo '
                                <tr>
                                    <td>'.($j+1).'</td>
                                    <td><img style="width:100%" src="/uploads/poster/'.$row["poster"].'" /></td> 
                                    <td>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td width="200">Title</td>
                                                    <td>'.$row["title"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Author</td>
                                                    <td>'.$row["author"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Publisher Name</td>
                                                    <td>'.$row["publisher_name"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>ISBN</td>
                                                    <td>'.$row["isbn"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Category</td>
                                                    <td>'.$cat.'</td>
                                                </tr>
                                                <tr>
                                                    <td>Price</td>
                                                    <td>'.$row["price"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>No of Page</td>
                                                    <td>'.$row["no_of_pages"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Sample Pdf Book</td>
                                                    <td><a href="/uploads/sample_pdf_book/'.$row["sample_pdf_book"].'" target="_blank">'.$row["sample_pdf_book"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Book Link</td>
                                                    <td><a href="/uploads/pdf_book/'.$row["pdf_book"].'" target="_blank">'.$row["pdf_book"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>'.$row["book_desc"].'</td>
                                                </tr>
                                                <tr>
                                                    <td>Edit / Delete</td>
                                                    <td>
                                                        <form method="get" action="edit_book.php" class="pull-left">
                                                            <input type="hidden" name="isbn" value="'.$row["isbn"].'" />
                                                            <input type="submit" class="btn btn-primary" value="Edit"/>
                                                        </form>
                                                        <form method="post" class="pull-right">
                                                            <input type="hidden" name="isbn" value="'.$row["isbn"].'" />
                                                            <input type="submit" onClick="javascript: return confirm(\'Please confirm deletion\');" class="btn btn-danger" value="Delete"/>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>';
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