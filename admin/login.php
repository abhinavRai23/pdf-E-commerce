<?php
    require 'include/connect.inc.php';

    if(isset($_POST["username"]) && isset($_POST["pass"]) ) 
    {

        $username= mysql_entities_fix_string($db_server, $_POST["username"]);
        $pass = mysql_entities_fix_string($db_server, $_POST["pass"]);

        $query = "SELECT * FROM user WHERE username='$username' AND password='$pass'";
        $run = mysqli_query($db_server, $query);

        if(!$run) die (mysqli_error($db_server));
        // echo "Fuck you".$username;
        $rows=mysqli_num_rows($run);
        if($rows!=0)
        {
            for ($j = 0 ; $j < $rows ; ++$j)
            {
                $row = mysqli_fetch_row($run);
            }
            session_start();
            $_SESSION['id']=$row[0];
            $_SESSION['username']=$row[1];
            $_SESSION['user_type']= $row[5];
            if($row[5]==0)
                header("location:include/logout.php");
            else            
                header("location:home.php");
        }   
        else
        {
            header("location:index.php");
        }
    }   
    else{ 
        header("location:index.php");
    }

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