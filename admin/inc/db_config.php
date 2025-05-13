<?php
// Database configuration
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'hotel';

// Connect to the database
$con = mysqli_connect($hostname, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

/**
 * Sanitize input data array.
 *
 * @param array $data Input data.
 * @return array Sanitized data.
 */
function filteration($data)
{
    foreach ($data as $key => $value) {
        // Remove extra spaces, backslashes,
        // and encode HTML entities while stripping any tags.
        $data[$key] = strip_tags(htmlspecialchars(stripslashes(trim($value))));
    }
    return $data;
}

/**
 * Select all rows from a table.
 *
 * @param string $table Table name.
 * @return mysqli_result Query result.
 */
function selectAll($table)
{
    $con = $GLOBALS['con'];
    $sql = "SELECT * FROM `$table`";
    $result = mysqli_query($con, $sql);
    if ($result === false) {
        die("Query cannot be executed - Select All: " . mysqli_error($con));
    }
    return $result;
}

/**
 * Execute a select query using prepared statements.
 *
 * @param string $sql SQL query with placeholders.
 * @param array  $values Values for parameters.
 * @param string $datatypes Types for the parameters.
 * @return mysqli_result Query result.
 */
function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $result;
        }
        mysqli_stmt_close($stmt);
        die("Query cannot be executed - Select: " . mysqli_stmt_error($stmt));
    }
    die("Query cannot be prepared - Select: " . mysqli_error($con));
}

/**
 * Execute an update query using prepared statements.
 *
 * @param string $sql SQL query.
 * @param array  $values Values for parameters.
 * @param string $datatypes Types for the parameters.
 * @return int Number of affected rows.
 */
function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $affectedRows = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $affectedRows;
        }
        mysqli_stmt_close($stmt);
        die("Query cannot be executed - Update: " . mysqli_stmt_error($stmt));
    }
    die("Query cannot be prepared - Update: " . mysqli_error($con));
}

/**
 * Execute an insert query using prepared statements.
 *
 * @param string $sql SQL query.
 * @param array  $values Values for parameters.
 * @param string $datatypes Types for the parameters.
 * @return int Inserted record's ID.
 */
function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $insertId = mysqli_stmt_insert_id($stmt);
            mysqli_stmt_close($stmt);
            return $insertId;
        }
        mysqli_stmt_close($stmt);
        die("Query cannot be executed - Insert: " . mysqli_stmt_error($stmt));
    }
    die("Query cannot be prepared - Insert: " . mysqli_error($con));
}

/**
 * Execute a delete query using prepared statements.
 *
 * @param string $sql SQL query.
 * @param array  $values Values for parameters.
 * @param string $datatypes Types for the parameters.
 * @return int Number of affected rows.
 */
function delete($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $affectedRows = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $affectedRows;
        }
        mysqli_stmt_close($stmt);
        die("Query cannot be executed - Delete: " . mysqli_stmt_error($stmt));
    }
    die("Query cannot be prepared - Delete: " . mysqli_error($con));
}
?>