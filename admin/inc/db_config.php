<?php

$hostname = 'localhost';
$username = 'root';
$pass = 'rinyua.475;';
$db = 'hotel';

$con = mysqli_connect($hostname, $username, $pass, $db);

if (!$con) {
    die("Cannot Connect to Database: " . mysqli_connect_error());
}
else {
    echo `<script>alert("Connected successfully") </script>`;
}

// function filteration($data)
// {
//     $filtered_data = [];
//     foreach ($data as $key => $value) {
//         $value = trim($value);
//         $value = stripslashes($value);
//         $value = htmlspecialchars($value);
//         $value = strip_tags($value);
//         $filtered_data[$key] = $value;
//     }
//     return $filtered_data;
// }

function filteration($data)
{
    
    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        $data[$key] = $value;
    }
    return $data;
}
function selectAll($table){
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, "SELECT * FROM `$table`");
    return $res;
    
        $con = $GLOBALS['con'];
        if($order_by != null) {
            $sql = "SELECT * FROM `$table` ORDER BY `$order_by` $order";
        } else {
            $sql = "SELECT * FROM `$table`";
        }
        if ($res = mysqli_query($con, $sql)) {
            return $res;
        } else {
            die("Query cannot be executed - Select All: " . mysqli_error($con));
        }
          $con = $GLOBALS['con'];
            if ($res = mysqli_query($con, $sql)) {
                return $res;
            } else {
                die("Query cannot be executed - Select All: " . mysqli_error($con));
            }

}
{

    // $con = $GLOBALS['con'];
    // if($order_by != null) {
    //     $sql = "SELECT * FROM `$table` ORDER BY `$order_by` $order";
    // } else {
    //     $sql = "SELECT * FROM `$table`";
    // }
    // if ($res = mysqli_query($con, $sql)) {
    //     return $res;
    // } else {
    //     die("Query cannot be executed - Select All: " . mysqli_error($con));
    // }
    //  $con = $GLOBALS['con'];
    // if ($res = mysqli_query($con, $sql)) {
    //     return $res;
    // } else {
    //     die("Query cannot be executed - Select All: " . mysqli_error($con));
    // }

}   



function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select: " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Select: " . mysqli_error($con));
    }
}

function update($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Update " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Update" . mysqli_error($con));
    }
}

function insert($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_insert_id($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Insert " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Insert" . mysqli_error($con));
    }
}
function delete($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Delete " . mysqli_stmt_error($stmt));
        }
    } else {
        die("Query cannot be prepared - Delete" . mysqli_error($con));
    }
}

?>