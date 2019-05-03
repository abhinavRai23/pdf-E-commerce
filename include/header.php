<?php
include "connect.inc.php";
include "session.php";
ob_start();

function mysql_entities_fix_string($db_server,$string)
{
    return htmlentities(mysql_fix_string($db_server,$string));
} 

function mysql_fix_string($db_server,$string)
{
// if (get_magic_quotes_gpc()) 
//   $string = stripslashes($string);
    return mysqli_real_escape_string($db_server,$string);
}
?>
<?php include "head.php" ?>
<body>
    <div id="wrapper">

        <?php include "navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" style="min-height:600px;">