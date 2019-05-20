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
                            <tr title="summary 1" data-id="1" data-price="10">
                                <td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="Images/124.jpeg"></td>
                                <td>Raw (Romeo Akbar Walter)</td>
                                <td title="Unit Price" class="text-right">₹400.00</td>
                                <td title="Quantity">
                                    <input type="number" min="1" style="width: 70px;" class="my-product-quantity" value="1"></td>
                                <td title="Total" class="text-right my-product-total">₹ 400.00</td>
                                <td title="Remove from Cart" class="text-center" style="width: 30px;"><a href="javascript:void(0);"
                                        class="btn btn-xs btn-danger my-product-remove">X</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>

                                <td><strong>Total</strong></td>
                                <td></td>
                                <td class="text-right"><strong id="my-cart-grand-total">₹400.00</strong></td>
                                <td></td>
                                <td></td>

                                <td></td>
                            </tr>

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