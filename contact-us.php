<?php
    include "includes/header.php";
    include "includes/send_mail.php";

    if(
        isset($_POST["fname"]) &&
        isset($_POST["lname"]) &&
        isset($_POST["email"]) &&
        isset($_POST["mobile"]) &&
        isset($_POST["msg"])
    ){
        $fname = mysql_entities_fix_string($db_server, $_POST["fname"]);
        $lname = mysql_entities_fix_string($db_server, $_POST["lname"]);
        $email = mysql_entities_fix_string($db_server, $_POST["email"]);
        $mobile = mysql_entities_fix_string($db_server, $_POST["mobile"]);
        $msg = mysql_entities_fix_string($db_server, $_POST["msg"]);
        $name = $fname." ".$lname;
        $subject = "Contact Request from $name ($mobile)";
        $msg = "<p>Hi <b>$name</b>, is trying to contact with mobile no $mobile and email-id $email.<br/></p>
                <p><b>Message:-</b>$msg</p>";
                
        try{
            send_mail( $subject , $msg );
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }

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
            <form name="contactform" method="post">
                <fieldset>
                    <legend>Make Your Query:-</legend>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group"><label for="fname">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="fname" required />
                            </div>
                        </div>
                        <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                            <div class="form-group"><label for="lname">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" required />
                            </div>
                        </div>
                        <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                            <div class="form-group"><label for="phone">Cell Phone</label>
                                <input type="number" max="9999999999" class="form-control" placeholder="(999) 999-9999" name="mobile" required />
                            </div>
                        </div>
                        <div class="col-lg-offset-0 col-lg-6 col-sm-12">
                            <div class="form-group"><label for="email">E-Mail</label>
                                <input type="email" class="form-control" placeholder="abc@gmail.com" name="email" required />
                            </div>
                        </div>
                        <div class="col-lg-offset-0 col-lg-12 col-sm-12">
                            <div class="form-group"><label for="comment">Your Message</label>
                                <textarea class="form-control" rows="5" name="msg"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-offset-0 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <input class="button" type="submit"/>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-lg-4 col-sm-12 mar-bott20 ">
            <div class="send-messages pad-bott20 ">
                <div class=" location" style="margin-top: 50px;">
                    <img src="Images/contact-us.jpg" alt="contact-us" width="100%" height="310" />
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
                        <p>Pune, Maharashtra, India.<br />Delhi, India.</p>
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