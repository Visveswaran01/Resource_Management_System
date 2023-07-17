<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    if($_POST['Submit'])
    {
        if($_POST['passwd'] != "Admin22")
        {
            //echo "Not Connected ...";
            header("Location:home.html");
        }
        else
        {
            $_SESSION["uname"] = $_POST['username'];
            $_SESSION["pwd"] = $_POST['passwd'];
            header("Location:selectProject.php");

        }
    }
    else
    {
        echo "Not Connected ...";
    }

?>