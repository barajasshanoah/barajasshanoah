<html>
    <head>
  <title>Insert New Employee Record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>
  <body>
    <div id="page" data-role="page" data-theme="b" >
  <div data-role="header" data-theme="b">
<h1>
  Find a record
    </h1>	</div>
        <div data-role="content">
  <?php
  include 'mod2_config_sampledb.php';
  include 'mod2_opendb.php';

               $employeeid= (isset($_POST['employeeid'])    ? $_POST['employeeid']   : '');
               $lastname= (isset($_POST['lastname'])    ? $_POST['lastname']   : '');
               $firstname= (isset($_POST['firstname'])    ? $_POST['firstname']   : '');
               $employeephone= (isset($_POST['employeephone'])    ? $_POST['employeephone']   : '');
               $employeeaddress= (isset($_POST['employeeaddress'])    ? $_POST['employeeaddress']   : '');


$sql= "	INSERT INTO employees (employeeid, lastname, firstname, employeephone, employeeaddress)
            VALUES ('$employeeid','$lastname','$firstname','$employeephone','$employeeaddress')";
$result = mysqli_query($conn, $sql);

$sql= "	SELECT employeeid, lastname, firstname, employeephone, employeeaddress from employees WHERE employeeid = $employeeid LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<b>Record successfully inserted:</b><br>";
        echo "<b>EmployeeID: " . $row["employeeid"]. "</b><br>";
        echo "<b>Name: " . $row["lastname"]. " " . $row["firstname"]. "</b><br>";
        echo "<b>Phone: " . $row["employeephone"]. "</b><br>";
        echo "<b>Address: " . $row["employeeaddress"]. "</b><br>";
    }
} else {
    echo "Sorry there are no matches! Please check your entry and try again.";
}

mysqli_close($conn);

?>



        <div data-role="footer" data-theme="b">
    <h4>Employees Database Shanoah Barajas &copy; 2018</h4>
  </div>
