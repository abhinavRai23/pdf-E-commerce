 <!-- <?php 

if(!isset($_SESSION))
    session_start();

session_destroy();
?> -->
<?php include "include/head.php"; ?>

<style>
.panel-default>.panel-heading {
background-color: #CBCBCB;
}
.msg{color:red;
     font-style:italic;
 }
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" id="username" type="text" autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" id="pass" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type= "submit" value="Submit" class="btn btn-lg btn-success btn-block"><hr>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
