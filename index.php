<?php
    include "includes/header.php";
?>

<!-- Jssor Slider Begin -->
<div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 350px; overflow: hidden;">
    <!-- Loading Screen -->
    <!--  <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div> -->
    <!-- Slides Container -->
    <div u="slides"
        style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px; height: 350px; overflow: hidden;">

        <div>
            <img u="image" src="Images/Banner/Landing Pages_2.png" alt="desktop" title="Banner1" />

        </div>

        <div>

            <img u="image" src="Images/Banner/Landing Pages_1.png" alt="laptop" title="Banner2" />
        </div>
        <div>
            <img u="image" src="Images/Banner/vinra2.jpg" alt="ITservice" title="Banner3" />
        </div>
        <div>
            <img u="image" src="Images/Banner/vinra3.jpg" alt="ITservice" title="Banner4" />
        </div>

    </div>

    <div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;">
        <!-- bullet navigator item prototype -->

        <div u="prototype"></div>

    </div>



    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora21l" style="top: 123px; left: 8px;">
    </span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora21r" style="top: 123px; right: 8px;">
    </span>
    <!--#endregion Arrow Navigator Skin End -->

</div>
<!-- Jssor Slider End -->

<!-- service start -->
<div class="container mar-top30">
    <div class="row">
        <div class="col-lg-4 col-sm-12 mar-bott20">
            <div class="pad-top30">
                <img src="Images/who-v-r1.png" width="400px" height="auto" class="img-responsive" alt="" image1 />
            </div>
            <br>


        </div>
        <div class="col-lg-8 col-sm-12 mar-bott20">
            <div class="send-messages">

                <p class="pad-top10">We are in the publishing business here at VinRa. Our company has gath­ered
                    together people who are all focused on a common purpose. We are all very different, by
                    education, by age group, by character and by how we relax and what attracts us. But it is
                    precisely this variety which has created in the end that exquisite bouquet of world perception,
                    which forms our free style of behaviour and relations between people in the process of
                    developing our business.</p>
                <p class="pad-top10">
                    The company was founded in 2011, over these years, the company has earned a reputation that has
                    a unique combination of quality, value, trust and reliability. The founders of our company have
                    combined 15+ years of publishing service experience and are uniquely equipped to provide
                    innovative solutions and services to industry. We are content development and publishing
                    services company which develops in-house content for schools, institutes, colleges, and
                    universities, we also provide pre-press services like typesetting, proof reading, copyediting,
                    translations for various publishing houses.</p>
                <p class="pad-top10">Throughout the period of its existence, VinRa has had the experience of
                    working in various thematic niches: STM books and journals, reference works on various topics,
                    books on psychology and economics, children’s literature, scholarly works, esoteric literature
                    and encyclopaedic works. <span><a href="about-us.php">Read More...</a></span></p>
                <br />

            </div>
        </div>
    </div>
</div>
<br />
<div class="container-fluid professional">
    <div class="container">
        <section class="professional_builder">
            <div class="row builder_all">
                <div class="col-lg-4 col-sm-12 builder">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    <h4>We Deliver Quality</h4>
                    <p>VinRa is committed to supplying its customers with a complete solution for all aspects
                        of products and services. Our well trained, highly experienced staff, we aim to exceed the
                        expectations
                        of our customers.</p>
                </div>
                <div class="col-lg-4 col-sm-12 builder">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h4>Always On Time</h4>
                    <p>We understand the value of time So We Deliver the product on time. we services for the
                        complaints
                        always on TAT (Turned around time). </p>
                </div>
                <div class="col-lg-4 col-sm-12 builder">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4>We Are Pasionate</h4>
                    <p>Our expert team is pasionate to do work with quality. we are always serve the quality to our
                        valuable
                        custemers. </p>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="container-fluid contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h3>If you’ve been dreaming of putting a little bit of yourself and your book out there for the
                    world to see, do allow us to introduce ourselves.</h3>
            </div>
            <div class="col-md-4 col-sm-12 pad-top30">

            </div>
            <div type="button" class="btn contact-sec-btn" data-toggle="modal" data-target="#publish">Publish With
                Us</div>

        </div>

        <!------------- Modal code start------->
        <div class="publish-with-us">
            <div id="publish" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form name="publish-form" method="post" action="">
                                    <fieldset>
                                        <legend>Publish with us</legend>
                                        <p>We welcome quality content and invite authors to publish with us. In case you
                                            have a manuscript or are planning to develop one, please provide us with the
                                            details, so that we can study your proposal.</p>
                                        <p>You can send us your sample content with your details at
                                            <strong>info@vinra.co.in</strong></p>
                                        <p>Or</p>
                                        <p>Submit your details, will connect you with our team.</p><br />
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="form-group"><label for="fname">First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name"
                                                        name="fname" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                                <div class="form-group"><label for="lname">Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name"
                                                        name="lname" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                                <div class="form-group"><label for="phone">Cell Phone</label>
                                                    <input type="number" class="form-control"
                                                        placeholder="(999) 999-9999" name="mobile" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                                <div class="form-group"><label for="email">E-Mail</label>
                                                    <input type="email" class="form-control" placeholder="abc@gmail.com"
                                                        name="email" required />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group"><label for="address">Address</label>
                                                    <input type="text" class="form-control" placeholder="Address"
                                                        name="address" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                                <div class="form-group"><label for="upload">Upload Synopsis</label>

                                                    <input type="file" name="upload-file" /><br />
                                                    <p class="note-text">* Only DOC, DOCX, RTF, PDF File can be uploaded
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <p>Or</p>
                                                <div class="form-group"><label for="comment">Write Synopsis</label>
                                                    <textarea class="form-control" rows="4" name="synopsis"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-offset-0 col-lg-12 col-sm-12">
                                                <div class="form-group">
                                                    <a href=""><button class="button" name="submit"
                                                            type="button"><span>Submit
                                                            </span></button></a>
                                                </div>
                                            </div>

                                        </div>

                            </div>



                            </fieldset>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!----------------- Modal code end--------------->

</div>

</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="js/jquery-1.9.1.min.js"></script> -->

<!-- jssor slider scripts-->
<!-- use jssor.slider.debug.js for debug -->

<script>
jQuery(document).ready(function($) {
    var options = {
        $FillMode: 2, //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
        $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
        $Idle: 5000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
        $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

        $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
        $SlideEasing: $JssorEasing$
        .$EaseOutQuint, //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
        $SlideDuration: 1000, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
        $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
        //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
        //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
        $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
        $Cols: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
        $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
        $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
        $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
        $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

        $BulletNavigatorOptions: { //[Optional] Options to specify and enable navigator or not
            $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
            $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 1, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
            $Rows: 1, //[Optional] Specify lanes to arrange items, default value is 1
            $SpacingX: 8, //[Optional] Horizontal space between each item in pixel, default value is 0
            $SpacingY: 8, //[Optional] Vertical space between each item in pixel, default value is 0
            $Orientation: 1, //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            $Scale: false //Scales bullets navigator or not while slider scale
        },

        $ArrowNavigatorOptions: { //[Optional] Options to specify and enable arrow navigator or not
            $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 1, //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 2, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1 //[Optional] Steps to go for each navigation request, default value is 1
        }
    };

    var jssor_slider1 = new $JssorSlider$("slider1_container", options);
    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizing
    function ScaleSlider() {
        var bodyWidth = document.body.clientWidth;
        if (bodyWidth)
            jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1900));
        else
            window.setTimeout(ScaleSlider, 30);
    }
    ScaleSlider();
    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    //responsive code end
});
</script>

<?php
    include "includes/footer.php";
?>