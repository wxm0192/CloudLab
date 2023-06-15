<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Bootstrap Table!</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css">
  </head>
<?php
define('DB_SERVER', '10.102.161.40');
define('DB_USER', 'wxm');
define('DB_PWD', 'wxm123321');
define('DB_NAME', 'shiyan');
define('ROOTPATH', '/usr/share/nginx/www/');
define('LOG_FILE_NAME', 'log/log');
$db_conn = mysqli_connect(DB_SERVER, DB_USER ,DB_PWD,DB_NAME );
if(!$db_conn ){
	echo " Failed to open data base ";
	return -1 ;
	}
?>
  <body>
    <table data-toggle="table">
      <thead>
        <tr>
          <th>Lab_id</th>
          <th>Level</th>
          <th>Duration</th>
        </tr>
      </thead>
      <tbody>
	<?php
	$sql = "SELECT  lab_id , level , time_limit  FROM Lab  ";
	$result = mysqli_query($db_conn, $sql);
                if (mysqli_num_rows($result) > 0) {
			 while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row[lab_id]."</td>";
				echo "<td>".$row[level]."</td>";
				echo "<td>".$row[time_limit]."</td>";
				}
			}
	?>



        <tr>
          <td>1</td>
          <td><?php echo "record1 from database"; ?></td>
          <td>$1</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Item 2</td>
          <td>$2</td>
        </tr>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
  </body>
</html>
