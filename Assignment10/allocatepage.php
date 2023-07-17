<?php
    require 'dbOps.php';

    if(isset($_POST['allocateproj']))
    {
        $p1 = $_POST['projectId'];
        $p2 = $_POST['empId'];
        $p3 = $_POST['startproj'];
        $p4 = $_POST['Endproj'];

        insertRecord($p1,$p2,$p3,$p4);
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
        .Box2 > table th,td
        {
            padding: 1.25rem;
        }
        table th
        {
            text-align:right;
            color:mediumspringgreen;
            font-family:monospace;
        }
        .Box2 table
        {
            margin:2.5rem 0rem;
            display:flex;
            justify-content:center;

        }
        .Box2 table td > select,input
        {
            width:9rem;
        }

        .Main1
        {   height:100vh;
            background-color:#444;
        }
       
    </style>
    <script>
        function present()
        {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("Endproj").min = today;
            document.getElementById("startproj").min = today;
        }

        function validateDuration()
        {
            var st = new Date(document.getElementById("startproj").value);
            var ed = new Date(document.getElementById("Endproj").value);
            var y_diff = ed.getFullYear() - st.getFullYear();
            var m_diff = ed.getMonth() - st.getMonth();
            var d_diff = ed.getDate() - st.getDate()
            if(y_diff == 0 && m_diff == 0 &&d_diff <= 0)
            {
                alert('Dates given are not appropriate (:\nPlease check ');
                return false;
            }
            else if(y_diff == 0 && m_diff < 0)
            {
                alert('Dates given are not appropriate (:\nPlease check ');
                return false;
            }
            else if(y_diff < 0)
            {
                alert('Dates given are not appropriate (:\nPlease check ');
                return false;
            }   
            return true;
        }
    </script>
</head>
<body onload = present()>
    <div class="Main1">
        <?php require 'header.php';?>

        <div class="Box2">
            <form action="" method="post" onsubmit="return validateDuration()">
                <table>
                    <tr>
                        <th><label for="projectId"> Project ID : </label> </th>
                        <td><input type="text" name="projectId" value=<?php echo $_SESSION['projId']; ?> readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <th><label for="empId">Employee Id : </label></th>
                        <td>
                            <select name="empId" id="empId">
                                <?php
                                $a_res = emp_viewer();
                                while($row = mysqli_fetch_array($a_res)) 
                                {
                                    echo '<option value='.$row['emp_id'].'>'.$row['emp_id'].'</option>';
                                }
                                ?> 
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="startproj">Start Allocation Date : </label> </th>
                        <td><input type="date" name="startproj" id="startproj" required/></td>
                    </tr>
                    <tr>
                        <th><label for="Endproj"> End Allocation Date : </label></th>
                        <td><input type="date" name="Endproj" id="Endproj" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><input type="submit" name="allocateproj" value="Allocate  Project"></center></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>