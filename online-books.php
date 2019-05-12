<?php
include "includes/header.php";
?>

<?php
    $query = "SELECT `category_id`, `category_name` from categories";
    $cat_run = mysqli_query($db_server, $query);
    if(!$cat_run) die (mysqli_error($db_server));
    $catg=mysqli_fetch_all($cat_run);

    $type_of_sorting = [
        "book_id" => "DESC",
        "title" => "ASC",
        "price" => "ASC",
        "author" => "ASC"
    ];

    if( isset($_GET['category']) && isset($_GET['sort'])){
        $category_id = mysql_entities_fix_string($db_server, $_GET["category"]);
        $sort = mysql_entities_fix_string($db_server, $_GET["sort"]);
        $query = "SELECT * FROM `books` where category_id='$category_id' ORDER BY '$sort' $type_of_sorting[$sort]";
    }
    else if( isset($_GET['category']) ){
        $category_id = mysql_entities_fix_string($db_server, $_GET["category"]);
        $query = "SELECT * FROM `books` where category_id='$category_id' ORDER BY 'title' ASC";
    }
    else if( isset($_GET['sort']) ){
        $sort = mysql_entities_fix_string($db_server, $_GET["sort"]);
        $query = "SELECT * FROM `books` ORDER BY '$sort' $type_of_sorting[$sort]";
    }
    else{
        $query = "SELECT * FROM `books` ORDER BY `title` ASC";        
    }
    $book_run = mysqli_query($db_server, $query);
    if(!$book_run) die (mysqli_error($db_server));
    $book_rows=mysqli_num_rows($book_run);
?>

<!-- service start -->
<div class="container-fluid bred-crum-bg">
    <div class="container pad-top40 pad-bott40">
        <h1 class="bred-crum-text">Online Books</h1>
        <div class="bredcrum-center">
            <span>
                <a href="index.php">Home /</a>
                <a href="#"> Online Books</a>
            </span>
        </div>
    </div>
</div>
<div class="container mar-top30">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="catalogue">
                <h4>Catalogue</h4>
            </div>
            <div class="panel-group" id="accordion">

                <?php
                $query = "SELECT * FROM `categories` where parent_category=0";
                $run = mysqli_query($db_server, $query);

                if (!$run) die(mysqli_error($db_server));

                $rows = mysqli_num_rows($run);

                if ($rows != 0) {
                    for ($j = 0; $j < $rows; ++$j) {

                        $row = mysqli_fetch_assoc($run);
                        $query = "SELECT * FROM `categories` where parent_category='$row[category_id]'";
                        $sub_run = mysqli_query($db_server, $query);
                        if (!$sub_run) die(mysqli_error($db_server));
                        $sub_rows = mysqli_num_rows($sub_run);
                        if ($sub_rows) {
                            $sub_content = "<div class='panel-body'><table class='table'>";
                            while ($sub_row = mysqli_fetch_assoc($sub_run)) {
                                $sub_content .= "<tr>
                                                    <td>
                                                        <span class='text-primary'></span>
                                                            <a href='online-books?category=".$sub_row['category_id']."'>
                                                                <i class='fa fa-square'></i>
                                                                ".$sub_row['category_name']."
                                                            </a>
                                                    </td>
                                                </tr>";
                            }
                            $sub_content .= "</table></div>";
                        } else {
                            $sub_content = "";
                        }
                        echo "
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
                                    <h4 class='panel-title'>
                                        <a data-toggle='collapse' class='collapsed' data-parent='#accordion' href='#collapse".$j."'>" . $row['category_name'] . "</a>
                                    </h4>
                                </div>
                                <div id='collapse".$j."' class='panel-collapse collapse'>
                                ".$sub_content."
                                </div>
                            </div>    
                            ";
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-sm-9 col-md-9">
            <div class="row book-desc-bg">
                <div class="col-md-9 "><span class="pad-right20">Sort By:</span> <a href="?sort=title" class="sort-by">Title</a>
                    | <a href="?sort=price" class="sort-by">Price</a>
                    | <a href="?sort=author" class="sort-by">Author</a> 
                    | <a href="?sort=book_id" class="sort-by">Recent</a></div>
                <div class="col-md-3 ">Showing <?php echo $book_rows." ".($book_rows!=1?"Books": "Book"); ?> </div>
                <hr class="line">
                <?php
                    if($book_rows!=0)
                    {
                        for ($j = 0 ; $j < $book_rows ; ++$j)
                        {
                            $row = mysqli_fetch_assoc($book_run);
                            for($i=0; $i<count($catg); $i++){
                                if($catg[$i][0]==$row["category_id"]){
                                    $cat = $catg[$i][1];
                                }
                            }
                            echo '<div class="row">
                                    <div class="col-md-3 "><a href="buy-online-books.php?isbn='.$row['isbn'].'"><img src="/uploads/poster/'.$row["poster"].'" alt="books" /></a></div>
                                    <div class="col-md-9">
                                        <h4>'.$row['title'].'</h4>
                                        <h5>Author: '.$row['author'].'</h5>
                                        <p>Publisher Name: '.$row['publisher_name'].'</p>
                                        <p>Category: '.$cat.'</p>
                                        <p>Published Date: '.$row['published_date'].'</p>
                                        <p>
                                            <span class=" pad-right10">ISBN NO. '.$row['isbn'].'</span> | 
                                            <span class="pad-left10 pad-right10"> '.$row['no_of_pages'].' Pages </span> | 
                                            <span class="pad-left10 pad-right10">Rs. '.$row['price'].'</span>
                                        </p>
                                        <p>'.$row['book_desc'].'</p>
                                        <p><a href="buy-online-books.php?isbn='.$row['isbn'].'">Read more...</a></p>
                                        <hr class="line">
                                    </div>
                                </div>';
                        }
                    }
                    else{
                        echo "<Center style='color: red'>*No Results Found</Center>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>