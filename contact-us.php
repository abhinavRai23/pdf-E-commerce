<?php
    include "includes/header.php";
?>
    <!-- service start -->
    <div class="container-fluid bred-crum-bg">
        <div class="container pad-top40 pad-bott40">
            <h1 class="bred-crum-text">Contact us</h1>
            <div class="bredcrum-center">
                <span>
                    <a href="index.php">Home /</a>
                    <a href="#"> Contact us</a>
                </span>
            </div>
        </div>

    </div>

   
    <div class="container mar-top30">

        <div class="row">
                   <div class="col-lg-8 col-sm-12 mar-bott20">
                <div class="send-messages pad-bott20">
                   
                </div>
                
                <form name="contactform" method="post" action="my-mail.php">
                    <fieldset>
                        <legend>Make Your Query:-</legend>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group"><label for="fname">First Name</label>
                                    <input type="text" class="form-control"  placeholder="First Name" name="fname" required />
                                </div>
                            </div>
                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                <div class="form-group"><label for="lname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" required/>
                                </div>
                            </div>
                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                <div class="form-group"><label for="phone">Cell Phone</label>
                                    <input type="number" class="form-control"  placeholder="(999) 999-9999" name="mobile" required />
                                </div>
                            </div>
                            <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                                <div class="form-group"><label for="email">E-Mail</label>
                                    <input type="email" class="form-control"  placeholder="abc@gmail.com" name="email" required/>
                                </div>
                            </div>
                            <div class="col-lg-offset-0 col-lg-12 col-sm-12">
                                <div class="form-group"><label for="comment">Your Message</label>
                                    <textarea class="form-control" rows="5"  name="msg"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-offset-0 col-lg-12 col-sm-12">
                                <div class="form-group">
                                        <a href=""><button class="button" name="submit" type="button"><span>Submit </span></button></a>
                                </div>
                            </div>

                        </div>



                    </fieldset>
                </form>


            </div>


              <div class="col-lg-4 col-sm-12 mar-bott20 ">
                <div class="send-messages pad-bott20 ">
                  
                    <div class=" location" style="margin-top: 50px;">
                        
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224346.6144344526!2d77.06855481413153!3d28.527217789757344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew+Delhi%2C+Delhi!5e0!3m2!1sen!2sin!4v1554988362161!5m2!1sen!2sin" width="100%" height="310" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        <img src="Images/contact-us.jpg" alt="contact-us" width="100%" height="310"/>
                       
                    </div>
              
                </div>
            </div>






        </div>
    </div>
   
<div class="container-fluid address-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <div class="item">
                        <div class="icon-holder">
                            <span class="fa fa-map-signs"></span>
                        </div>
                        <div class="content">
                            <h4>Office Address</h4>
                            <p>Pune, Maharashtra, India.<br/>Delhi,  India.</p>
                        </div>
                    </div>
                
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <div class="item">
                        <div class="icon-holder">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="content">
                            <h4>Call us</h4>
                            <p>+91-8668797556<br>+91-9657829335</p>
                        </div>
                    </div>
                
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                
                    <div class="item">
                        <div class="icon-holder">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="content">
                            <h4>SEND AN EMAIL</h4>
                            <p>Mail Us: info@vinra.co.in<br>Website: www.vinra.co.in</p>
                        </div>
                    </div>
                
            </div>

        </div>
    </div>
</div>

<?php
    include "includes/footer.php";
?>