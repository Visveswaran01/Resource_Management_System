<?php
    require 'connectDB.php';

    function projalloc_viewer($arg1)
    {  
        $sql = "SELECT * FROM projectallocation pa INNER JOIN employee e ON pa.employeeID = e.emp_id where pa.projectId='{$arg1}'";
        $result = mysqli_query($_SESSION['conn'], $sql);
        return $result;
    }

    function proj_viewer()
    {
        $sql = "SELECT * FROM project";
        $result = mysqli_query($_SESSION['conn'], $sql);
        return $result;
    }

    function emp_viewer()
    {
        $sql = "SELECT * FROM employee";
        $result = mysqli_query($_SESSION['conn'], $sql);
        return $result;
    }

    function insertRecord($arg1,$arg2,$arg3,$arg4)
    {
        $sql = "INSERT INTO projectallocation (projectId,employeeID,startDate,endDate) VALUES ('{$arg1}','{$arg2}','{$arg3}','{$arg4}')";
        try
        {
            mysqli_query($_SESSION['conn'], $sql);
        }
        catch(Exception $e)
        {
            echo '<script>alert("Cannot Insert The Record Into Database");</script>';
        } 

    }

    function updateRecord($arg1,$arg2,$arg3)
    {
        $sql = "UPDATE projectallocation SET $arg1 = '".$arg2."' where allocationID = $arg3";
        try
        {
            echo $arg1." ".$arg2." ".$arg3;
            mysqli_query($_SESSION['conn'], $sql);
        }
        catch(Exception $e)
        {
            echo $arg1." ".$arg2." ".$arg3;
            //echo '<script>alert("Cannot Update The Record Into Database");</script>';
        } 


    }

    function deleteRecord($aid)
    {
        $sql = "delete from projectallocation where allocationID = '{$aid}'";
        if (!mysqli_query($_SESSION['conn'], $sql)) 
        {
            $err_msg = "Error: " . $sql . "<br>" . mysqli_error($_SESSION['conn']);
            echo '<script>alert('.$err_msg.');</script>';
        } 
        
    }
    
?>