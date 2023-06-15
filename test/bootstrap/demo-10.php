<?php
namespace MySQL\create_lab_env ;
include '../../MySQL/create_lab_env/common.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 实例</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
</body>
</html>

<?php
$lab_db_conn ;    //Lab DB class
$db_conn ;       //common  DB connector class
$log = new Log() ;
$log->f_log("Test for log");
header('content-type:application/json;charset=utf8');
$lab_db_conn  = new db_connect() ;
$db_conn = $lab_db_conn->conn ;

/*
try     {
        $my_lab = new Lab($lab_id);
        }
catch( Exception $e) {
        echo $e->getMessage();
        exit -1;
        }
*/
 
// Attempt select query execution
$sql = "SELECT * FROM Lab";
if($result = mysqli_query($db_conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<container>";
            echo "<row>";
                echo "<th>Lab_id</th>";
                echo "<th>Level</th>";
                echo "<th>Time_limit</th>";
            echo "</div>";
        while($row = mysqli_fetch_array($result)){
            echo "<row>";
                echo "<td>" . $row['lab_id'] . "</td>";
                echo "<td>" . $row['level'] . "</td>";
                echo "<td>" . $row['time_limit'] . "</td>";
            echo "</row>";
        }
        echo "</div>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_conn);
}
 
?>
