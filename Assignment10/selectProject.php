<?php

    require 'dbOps.php';

    if(isset($_POST['projId']))
    {
        $_SESSION['projId'] = $_POST['projId'];

        if(isset($_POST['Assign']))
        {
            header('Location:allocatepage.php');
        }
        else if(isset($_POST['View']))
        {
            header('Location:viewAlloc.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Project</title>
    
    <style>
        *
        {
            margin: 0px;
            font-size: 20px;
        }
        .allocateForm table
        {
            margin:4rem 25rem;
        }
        .allocateForm table th,td
        {
            padding:1rem;
            font-size:2rem;
            
        }
        .allocateForm table th
        {
            font-weight:normal;
            text-align:right;
        }
        .allocateForm
        {
            border:0.5rem double orangered;
            background-color:#001a4d;
            color:#ffcc66;
            font-family:cursive;
            flex-grow : 1;
            
        }
        .Main
        {
            display:flex;
            flex-direction:column;
           
            height:100vh;
        }
        input
        {
            padding: 0.3em;
        }
    </style>

</head>
<body>
    <div class="Main">
        <?php require 'header.php'; ?>
        <div class="allocateForm">
        <form action="" method="post">
            <table>
                <tr>
                    <th><label for="projId"> Project Label : </label> </th>
                    <td>
                        <select name="projId" id="projId">
                        <?php
                        $a_res = proj_viewer();
                        while($row = mysqli_fetch_array($a_res)) 
                        {
                            echo '<option value='.$row['proj_Id'].'>'.$row['proj_name'].'</option>';
                        }
                        ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name = "Assign" value="Assign"></td>
                    <td><input type="submit" name = "View" value="View"></td>
                </tr>
            <table>
            </form>
        </div>
    </div>
    
</body>
</html>