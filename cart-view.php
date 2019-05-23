<?php
    include "includes/header.php";
?>


    <!-- service start -->


    <div class="social-icon">
        <div class="social-icon-fixed">
            <a href="#">
                <p class="fbook active"><i class="fa fa-facebook-f"></i></p>
            </a>
            <a href="#">
                <p class="twitter active"><i class="fa fa-twitter"></i></p>
            </a>
            <a href="#">
                <p class="linkedin active"><i class="fa fa-linkedin"></i></p>
            </a>

        </div>
    </div>

    <hr />

    <div class="container">
        <div class="width-60">
            <div class="row">

                <div class="">

                    <h3> My Cart</h4>
                        <br />
                </div>
                <div class="">
                    <table class="table table-hover table-responsive" id="my-cart-table">
                        <tbody>
                            <script>
                                let books = localStorage.getItem("cartBooks")
                                let row, TotalCost, rest
                                books = books && JSON.parse(books)
                                function displayCart(){
                                    row = ""
                                    TotalCost=0
                                    if(Object.keys(books).length!=0){
                                        Object.keys(books).forEach( e=>{
                                            row += `<tr><td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="uploads/poster/${books[e].poster}"></td><td>${books[e].title}</td><td title="Total" class="text-right my-product-total">₹ ${books[e].price}</td><td title="Remove from Cart" class="text-center" style="width: 30px;"><a onclick="dropFromCart(${e})" class="btn btn-xs btn-danger my-product-remove">X</a></td></tr>`
                                            TotalCost+=parseInt(books[e].price)
                                        })
                                    }
                                    else{
                                        row = "<tr><td colspan='4'><center style='color: red;'>*Nothing in Cart.<center></td></tr>";
                                    }
                                    rest = `
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td class="text-right"><strong id="my-cart-grand-total"></strong></td>
                                        <td></td>
                                    </tr>
                                    `
                                    let table = document.querySelector('#my-cart-table>tbody')
                                    table.innerHTML = row+rest;
                                    setTimeout(()=>{
                                        calculateTotal();
                                    },100);
                                }
                                function dropFromCart(e){
                                    delete books[e];
                                    localStorage.setItem("cartBooks", JSON.stringify(books));
                                    setTimeout(()=>{
                                        displayCart()
                                    },100)
                                }
                                function calculateTotal(){
                                    let total = document.querySelector('#my-cart-grand-total')
                                    total.innerHTML = "₹ " + TotalCost
                                }
                                displayCart()
                            </script>
                        </tbody>
                    </table>
                </div>
                <br /><br />
                <button type="button" class="btn btn-default">Close</button>
                <div type="button" class="btn contact-sec-btn" data-toggle="modal" data-target="#myCart">Buy Now</div>







            </div>
        </div>

        <br /><br /><br />
    </div>




    <!-- pop up code start -->
    <div class="modal fade" id="myCart" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>
                <div class="modal-body">
                    <div class="pad-top10 center">
                        <h4>Your Total Amount is ₹ 400.</h4>
                        <h4>Please pay the amount in A/C. No- 999999999999</h4><br />
                        <h4>Thank You.</h4>
                    </div>

                </div>

            </div>

        </div>
    </div>





    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa fa-arrow-up"></i>
    </button>


    <?php
    include "includes/footer.php";
?>