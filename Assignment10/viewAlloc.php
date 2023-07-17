<?php 
    require 'dbOps.php';

    if(isset($_GET['delete']))
    {
        deleteRecord($_GET['delete']);
        header('Location:viewAlloc.php');
    }

    if(isset($_POST['Change']))
    {
        $_POST['startDate'] = DATE($_POST['startDate']);
        $_POST['endDate'] = DATE($_POST['endDate']);
        $keys = array_keys($_POST);
        foreach ($keys as $key) 
        {
            if($key != 'Change' and $key != 'emp_name' and $key != 'allocationID')
            {
                updateRecord($key,$_POST[$key],$_POST['allocationID']);
            }
        }
        header('Location:viewAlloc.php');
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
        table th,td
        {
            text-align:center;
            height:2.75rem;
            color:dodgerblue;
            font-family:cursive;
            width:100vw;
        }

        tbody tr:hover
        {
            background-color:white;
            scale : 1.012;
            box-shadow: 5px 5px 5px rgba(255,205,35,0.6) ,
                        5px 5px 5px rgba(225,2,30,0.6);
        }
        
        table
        {
            border-collapse:collapse;
            margin: 2rem 1rem;
            background:white;
        }
        .Main
        {   height:100vh;
            width:100vw;
            background-color:black;
        }
        #del
        {
            text-decoration:none;
            background-color:crimson;
            padding:5px;
            color:white;
            font-size:18px;
            margin-left:10px;
        }
        #upd,#chg
        {
            text-decoration:none;
            background-color:mediumseagreen;
            padding:5px;
            color:white;
            font-size:18px;
            
        }
        .Main table tbody td > *
        {
            border:0px;
            outline:0px;
        }
        input:not([type='submit'])
        {
            width:130px;
            text-align:center;
            font-size:18px;
            border-radius:4px;
        }
    </style>
</head>
<body>
    <div class="Main">
        <?php require 'header.php';?>
        <table>
            <thead>
                <tr style="background-color:yellow;">
                    <th>Allocation Id</th>
                    <th>Project Id</th>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Assigned</th>
                    <th>Finish Before</th>
                    <th> Operations </th>
                </tr>
                <tbody>
                    <?php
                        $r1 = projalloc_viewer($_SESSION['projId']);
                        while ($row = mysqli_fetch_assoc($r1)) 
                        {
                            if(isset($_GET['update']) and $_GET['update'] == $row['allocationID'])
                            {
                                unset($_GET['update']);
                             
                            ?>
                              <form action="" method="post">

                              <tr>
                                <td>
                                    <input type="text" name="allocationID" id="aid" value=<?php echo $row['allocationID'];?> readonly>
                                </td>

                                <td>
                                    <input type="text" name="projectId" style="outline:2px solid orange;" id="pid" value=<?php echo $row['projectId'];?> >
                                </td>

                                <td>
                                    <input type="text" name="employeeID" id="eid" value=<?php echo $row['emp_id'];?> readonly>
                                </td>

                                <td>
                                    <input type="text" name="emp_name" id="ename" value=<?php echo $row['emp_name'];?> readonly>
                                </td>

                                <td>
                                    <input type="date" name="startDate" id="sdt" value=<?php echo $row['startDate'];?> >
                                </td>

                                <td>
                                    <input type="date" name="endDate" id="edt" value=<?php echo $row['endDate'];?>>
                                </td> 
                                
                                <td colspan="2">
                                    <input type="submit" style="cursor:pointer;" value="Change" name="Change" id="chg">
                                    <a href="viewAlloc.php?delete=<?php echo $row['allocationID']; ?>" id="del"> Delete </a>
                                </td>
                            </tr>
                         </form>
 
                        <?php
                            continue;
                            }
                        ?>
                            <tr>
                                <td>
                                    <input type="text" id="aid" value=<?php echo $row['allocationID'];?> readonly>
                                </td>

                                <td>
                                    <input type="text" id="pid" value=<?php echo $row['projectId'];?> readonly>
                                </td>

                                <td>
                                    <input type="text" id="eid" value=<?php echo $row['emp_id'];?> readonly>
                                </td>

                                <td>
                                    <input type="text" id="ename" value=<?php echo $row['emp_name'];?> readonly>
                                </td>

                                <td>
                                    <input type="date" id="sdt" value=<?php echo $row['startDate'];?> readonly>
                                </td>

                                <td>
                                    <input type="date" id="edt" value=<?php echo $row['endDate'];?> readonly>
                                </td>
                                
                                <td colspan="2">
                                    <a href="viewAlloc.php?update=<?php echo $row['allocationID']; ?>" id="upd"> Update </a>
                                    <a href="viewAlloc.php?delete=<?php echo $row['allocationID']; ?>" id="del"> Delete </a>
                                </td>

                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </thead>
        </table>

    </div>
</body>
</html>
