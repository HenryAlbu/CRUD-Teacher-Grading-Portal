<?php
$conn = mysqli_connect('localhost', 'balbuquerque', 'balbuquerque', 'C354_balbuquerque');

function insert_new_user($username, $password, $full_name, $user_type, $select)
{
    global $conn;
    
    if (does_exist($username))
        return false;
    else {
        $current_date = date('Ymd');
        $sql = "insert into users values (NULL, '$username', '$password', '$full_name','$select', '$user_type', $current_date)";        
        $result = mysqli_query($conn, $sql); 
        return $result;
    }
}

function is_valid($username, $password) 
{
    global $conn;
    
    $sql = "select * from users where (Username = '$username' and Password = '$password')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function does_exist($username) 
{
    global $conn;
    
    $sql = "select * from users where (Username = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}


function create_assignment($q, $c, $m)  
{
    global $conn;         
   
    $sql = "insert into assignments values (NULL, '$m', '$q', '$c')";
    mysqli_query($conn, $sql);
    return true;
}

function list_assignments($result)
{
    global $conn;       
       
       // $sql = "select assignment_name from Assignments where assignment_name like '%". $result ."%'";
        $sql = " Select assignments.assignment_name AS assignment,grades.grade AS Grade, assignments.max AS Total
        From assignments
        Inner Join grades on grades.assignment_id = assignments.id where grades.user_id ='$result'";
        $result = mysqli_query($conn, $sql);
        $data = array(); 
        $i = 0;
        while($row = mysqli_fetch_assoc($result))  
            $data[$i++] = $row;
        echo json_encode($data);
      
}

function list_students($result)
{
    global $conn;       
       
        $sql = "select full_name,id,class_id from users where class_id = '$result' and user_type = 0";
        $result = mysqli_query($conn, $sql);
        $data = array();  
        $i = 0;
        while($row = mysqli_fetch_assoc($result))  
            $data[$i++] = $row;
        echo json_encode($data);
      
}

function attach_assignment($a, $i, $s)
{
    global $conn;             
        $sql = "insert into grades values (NULL, $s, $i, $a)";
        mysqli_query($conn, $sql);
        return true;
      
}

function attach_assignment_button($result)
{
    global $conn;       
       
        $sql = "SELECT DISTINCT assignments.id,assignments.assignment_name
        FROM assignments
        JOIN users ON '$result'=assignments.class_id";
        $result = mysqli_query($conn, $sql);
        $data = array();  
        $i = 0;
        while($row = mysqli_fetch_assoc($result))  
            $data[$i++] = $row;
        echo json_encode($data);
      
}
    
?>   