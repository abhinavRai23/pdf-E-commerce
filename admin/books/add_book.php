<?php
    include "../include/header.php";
    require "./file_upload.php";
?>

<?php
    if( isset($_POST["title"])
        && isset($_POST["author"])
        && isset($_POST["publisher_name"])
        && isset($_POST["isbn"])
        && isset($_FILES["poster"])
        && isset($_POST["category_id"])
        && isset($_POST["book_desc"])
        && isset($_POST["published_date"])
        && isset($_POST["price"])
        && isset($_FILES["pdf_book"])
        && isset($_POST["no_of_pages"])
    )
    {
        $title = mysql_entities_fix_string($db_server, $_POST["title"]);
        $author = mysql_entities_fix_string($db_server, $_POST["author"]);
        $publisher_name = mysql_entities_fix_string($db_server, $_POST["publisher_name"]);
        $isbn = mysql_entities_fix_string($db_server, $_POST["isbn"]);
        $poster = mysql_entities_fix_string($db_server, $_FILES["poster"]["name"]);
        $category_id = mysql_entities_fix_string($db_server, $_POST["category_id"]);
        $book_desc = mysql_entities_fix_string($db_server, $_POST["book_desc"]);
        $published_date = mysql_entities_fix_string($db_server, $_POST["published_date"]);
        $price = mysql_entities_fix_string($db_server, $_POST["price"]);
        $pdf_book = mysql_entities_fix_string($db_server, $_FILES["pdf_book"]["name"]);
        $no_of_pages = mysql_entities_fix_string($db_server, $_POST["no_of_pages"]);

        $file_error = 0;

        try{
            if(!file_upload($_FILES["poster"], "poster", (2 * 1024 * 1024))){
                $file_error++;
                throw new Exception("File upload issue: poster");
            }
            if(!file_upload($_FILES["pdf_book"], "pdf_book", (2000 * 1024 * 1024))){
                $file_error++;
                throw new Exception("File upload issue: pdf_book");
            }
    
            if (isset($_FILES["sample_pdf_book"])) {
                $sample_pdf_book = mysql_entities_fix_string($db_server, $_FILES["sample_pdf_book"]["name"]);
                
                if( !file_upload($_FILES["sample_pdf_book"], "sample_pdf_book", (100 * 1024 * 1024))){
                    $file_error++;
                    throw new Exception("File upload issue: Sample pdf");
                }
                
            } else {
                $sample_pdf_book = "";
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        if($file_error==0){
            $query = "INSERT into books (title, author, publisher_name, isbn, poster, category_id, book_desc, published_date, sample_pdf_book, price, pdf_book, no_of_pages) values ( '$title', '$author', '$publisher_name', '$isbn', '$poster', '$category_id', '$book_desc', '$published_date', '$sample_pdf_book', '$price', '$pdf_book', '$no_of_pages' )";
            
            $run = mysqli_query($db_server, $query);

            if(!$run) die (mysqli_error($db_server));
            else{
                header("location:view_books.php");
            }
        }   
    }
?>

<div class="page-header">
    Add New Book
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form role="form" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="col-md-6 form-group">
                        Book title*:<input class="form-control" placeholder="Enter Book Title" value="" name="title" type="varchar" required autofocus="on">
                    </div>
                    <div class="col-md-6 form-group">
                        Author*:<input class="form-control" placeholder="Author Name" value="" name="author" type="varchar" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Publisher Name*:<input class="form-control" placeholder="Publisher Name" value="" name="publisher_name" type="varchar" required>
                    </div>
                    <div class="col-md-6 form-group">
                        ISBN:<input class="form-control" placeholder="ISBN code" value="" name="isbn" type="number" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Choose Category:<select class="form-control" value="" name="category_id" type="select" required>
                            <option value="" disabled>Choose</option>
                            <?php
                                $query = "SELECT * FROM `categories` where parent_category!=0";
                                $run = mysqli_query($db_server, $query);
        
                                if(!$run) die (mysqli_error($db_server));
        
                                $rows=mysqli_num_rows($run);
        
                                if($rows>0)
                                {
                                    while($row = mysqli_fetch_assoc($run)){
                            ?>
                                    <option value="<?php echo $row["category_id"]; ?>">
                                        <?php echo $row["category_name"]; ?>
                                    </option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        Book Poster: <input type="file" name="poster" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Published Date*:<input class="form-control" placeholder="Published Date" value="" name="published_date" type="date" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Book Price:<input class="form-control" placeholder="Enter Book Price" value="" name="price" type="float" required>
                    </div>
                    <div class="col-md-6 form-group">
                        No of Pages*:<input class="form-control" placeholder="Enter No of Pages" value="" name="no_of_pages" type="number" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Book Description: <textarea class="form-control" rows="3" placeholder="Enter book description" name="book_desc" required></textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        Sample Book(PDF): <input type="file" name="sample_pdf_book" >
                    </div>
                    <div class="col-md-6 form-group">
                        Main Book(PDF): <input type="file" name="pdf_book" required>
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