<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         *
        {
            margin: 0px;
            font-size: 20px;
        }
        .navbar
        {
            padding: 0.4rem 1rem;
            display : flex;
            justify-content: space-between;
            align-items: center;
            background:linear-gradient(55deg,orchid,dodgerblue,lightgreen); 
        }
        .navbar > h1
        {
            padding:1rem 0.5rem;
            font-size: 1.75rem;
            color:navajowhite;
            font-weight: lighter;
        }

        .navlinks >ul > li
        {
            list-style-type: none;
            justify-content:end;
            
            padding: 0rem 1rem;
            margin: 0.75rem 0.6rem;
            height:1.5rem;

            float: left;

            font-weight: bold;
            font-family:Times New Roman;
            background:#FFFACD;

            border-radius: 0.5rem;
            
        }
        .navlinks >ul > li > a
        {
            color:crimson;
            text-decoration: none;
            vertical-align: middle;            
        }
        
        .navbar #greet
        {
            font-style: italic;
            font-weight:bolder;
            font-size: 1.25rem;
            color:purple;
            text-align:right;
            
        } 
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Resource Management System</h1>
        <div class="box1">

            <p id="greet">Welcome <?php echo $_SESSION["uname"] ?> :) </p>
            <div class="navlinks">
                <ul>
                    <li><a href="selectProject.php">Assign Page</a></li>
                    <li><a href="selectProject.php">View Allocation</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <p>
                    <?php
                        date_default_timezone_set("Asia/Kolkata");
                        $t=time();
                        echo(date("Y-m-d H:i:s",$t));
                    ?>
                </p>
            </div>
        </div>
    </div>
    
</body>
</html>