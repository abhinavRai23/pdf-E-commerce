<?php
    include "../include/header.php";

    function file_upload( $file, $file_name, $max_file_size, $isbn){
        $target_dir = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$file_name.'/';
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.<br>";
        //     $uploadOk = 0;
        // }
        // Check file size
        if ($file["size"] > $max_file_size) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($file_name=="poster" && ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" )) {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.<br/>";
            $uploadOk = 0;
        }else if($file_name!="poster" && $imageFileType!='pdf'){
            echo $file_name." ".$imageFileType."<br>";
            echo "Sorry, expectred pdf file.<br/>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return 1;
        // if everything is ok, try to upload file
        } else {
            move_uploaded_file($file["tmp_name"], $target_file);
            return 0;
        }
    }
?>

<?php
    if( isset($_POST["title"])
        && isset($_POST["book_id"])
        && isset($_POST["author"])
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
        $book_id = mysql_entities_fix_string($db_server, $_POST["book_id"]);
        $author = mysql_entities_fix_string($db_server, $_POST["author"]);
        $isbn = mysql_entities_fix_string($db_server, $_POST["isbn"]);
        $poster = mysql_entities_fix_string($db_server, $_FILES["poster"]["name"]);
        $category_id = mysql_entities_fix_string($db_server, $_POST["category_id"]);
        $book_desc = mysql_entities_fix_string($db_server, $_POST["book_desc"]);
        $published_date = mysql_entities_fix_string($db_server, $_POST["published_date"]);
        $price = mysql_entities_fix_string($db_server, $_POST["price"]);
        $pdf_book = mysql_entities_fix_string($db_server, $_FILES["pdf_book"]["name"]);
        $no_of_pages = mysql_entities_fix_string($db_server, $_POST["no_of_pages"]);

        $file_error = 0;

        $file_error += file_upload($_FILES["poster"], "poster", (2*1024*1024), $isbn );
        $file_error += file_upload($_FILES["pdf_book"], "pdf_book", (2000*1024*1024), $isbn );

        if( $_FILES["sample_pdf_book"]["size"]!=0 ){
            $sample_pdf_book = mysql_entities_fix_string($db_server, $_FILES["sample_pdf_book"]["name"]);
            $file_error += file_upload($_FILES["sample_pdf_book"], "sample_pdf_book", (100*1024*1024), $isbn );
        }   
        else{
            $sample_pdf_book = "";
        }

        if($file_error==0){
            $query = "INSERT into books (title, author, isbn, poster, category_id, book_desc, published_date, sample_pdf_book, price, pdf_book, no_of_pages) values ( '$title', '$author', '$isbn', '$poster', '$category_id', '$book_desc', '$published_date', '$sample_pdf_book', '$price', '$pdf_book', '$no_of_pages' )";
            $query = "UPDATE books SET 
                title='$title', 
                author='$author', 
                poster='$poster',
                category_id='$category_id', 
                book_desc='$book_desc', 
                published_date='$published_date',
                sample_pdf_book='$sample_pdf_book', 
                price='$price', 
                pdf_book='$pdf_book',
                no_of_pages='$no_of_pages' 
                WHERE book_id=$book_id ";
            
            $run = mysqli_query($db_server, $query);

            if(!$run) die (mysqli_error($db_server));
            else{
                header("location:view_books.php");
            }
        }
    }
?>

<div class="page-header">
    Edit Book Information
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <form role="form" method="post" enctype="multipart/form-data">
                <fieldset>
                    <?php
                        $isbn = mysql_entities_fix_string($db_server, $_GET["isbn"]);
                        $query = "SELECT * FROM `books` where isbn='$isbn'";

                        $run = mysqli_query($db_server, $query);
                        if(!$run) die (mysqli_error($db_server));
                        $rows=mysqli_num_rows($run);
                        if($rows>0)
                        {
                            $row = mysqli_fetch_assoc($run);
                        }
                        else{
                            header("location:view_books.php");
                        }
                    ?>
                    <input value='<?php echo $row["book_id"]; ?>' name="book_id" type="hidden" required>
                    <div class="col-md-6 form-group">
                        Book title*:<input class="form-control" placeholder="Enter Book Title" value='<?php echo $row["title"]; ?>' name="title" type="varchar" required autofocus="on">
                    </div>
                    <div class="col-md-6 form-group">
                        Author*:<input class="form-control" placeholder="Author Name" value='<?php echo $row["author"]; ?>' name="author" type="varchar" required>
                    </div>
                    <input class="form-control" placeholder="ISBN code" value='<?php echo $row["isbn"]; ?>' name="isbn" type="hidden" required>
                    <div class="col-md-6 form-group">
                        Choose Category:<select class="form-control" value='<?php echo $row["category_id"]; ?>' name="category_id" type="select" required>
                            <option value="" disabled>Choose</option>
                            <?php
                                $query = "SELECT * FROM `categories`";
                                $run = mysqli_query($db_server, $query);
        
                                if(!$run) die (mysqli_error($db_server));
        
                                $rows=mysqli_num_rows($run);
        
                                if($rows>0)
                                {
                                    while($sub_row = mysqli_fetch_assoc($run)){
                            ?>
                                    <option value="<?php echo $sub_row["category_id"]; ?>">
                                        <?php echo $sub_row["category_name"]; ?>
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
                        Published Date*:<input class="form-control" placeholder="Published Date" value='<?php echo $row["published_date"]; ?>' name="published_date" type="date" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Book Price:<input class="form-control" placeholder="Enter Book Price" value='<?php echo $row["price"]; ?>' name="price" type="float" required>
                    </div>
                    <div class="col-md-6 form-group">
                        No of Pages*:<input class="form-control" placeholder="Enter No of Pages" value='<?php echo $row["no_of_pages"]; ?>' name="no_of_pages" type="number" required>
                    </div>
                    <div class="col-md-6 form-group">
                        Book Description: <textarea class="form-control" rows="3" placeholder="Enter book description" name="book_desc" required><?php echo $row['book_desc']; ?></textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        Sample Book(PDF): <input type="file" name="sample_pdf_book" value='<?php echo $row["sample_pdf_book"]; ?>'>
                    </div>
                    <div class="col-md-6 form-group">
                        Main Book(PDF): <input type="file" name="pdf_book" required value='<?php echo $row["pdf_book"]; ?>'>
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