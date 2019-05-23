<?php
    include "includes/header.php";

    if(isset($_GET['isbn'])){
        $isbn = mysql_entities_fix_string($db_server, $_GET["isbn"]);
        $query = "SELECT * FROM `books` where isbn='$isbn'";
        $run = mysqli_query($db_server, $query);

        if(!$run) die (mysqli_error($db_server));

        $rows=mysqli_num_rows($run);
        if($rows!=0){
            $row = mysqli_fetch_assoc($run);
        }
    }
    else{
        header("location:view_books.php");
    }
?>
<div class="container">
    <hr class="line">
    <div class="width-60">
        <div class="row">
            <div class="row book-desc-bg">
                <div class="col-md-3 pad-top20">
                    <img src="/uploads/poster/<?php echo $row["poster"]; ?>" height="240px" width="100%" />
                </div>
                <div class="col-md-9 pad-top20">
                    <h4><?php echo $row["title"]; ?></h4>
                    <h5><?php echo $row["author"]; ?></h5>
                    <p><?php echo $row["publisher_name"]; ?></p>
                    <p><span class=" pad-right10">ISBN NO. <?php echo $row["isbn"]; ?></span> | <span class="pad-left10 pad-right10"> <?php echo $row["no_of_pages"]; ?> Pages
                        </span> | <span class="pad-left10 pad-right10">Rs. <?php echo $row["price"]; ?></span> | <span
                            class="pad-left10 pad-right10"><?php echo $row["published_date"]; ?></span></p>
                    <p><?php echo $row["book_desc"]; ?></p>
                    <div class="contact-sec-btn center" style="display: inline-block;" onclick='addToCart()'>Buy Now</div>
                    <div class="contact-sec-btn center" style="display: inline-block;"><a href="/uploads/sample_pdf_book/<?php echo $row["sample_pdf_book"]; ?>" target="_blank" style="color: white; text-decoration: none">View Sample PDF</a></div>
                    <hr class="line">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    let poster = "<?php echo $row['poster'] ?>"
    let title = "<?php echo $row['title'] ?>"
    let price = "<?php echo $row['price'] ?>"
    let ls = localStorage.getItem('cartBooks')
    let books = {}
    if(ls){
        books = JSON.parse(ls)
    }
    books["<?php echo $row['isbn'] ?>"] = {
        poster,
        title,
        price
    }
    function addToCart(){
        localStorage.setItem('cartBooks', JSON.stringify(books) )
        window.location = "/cart-view.php";
    }
</script>
<?php
    include "includes/footer.php";
?>
