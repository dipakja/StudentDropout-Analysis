<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Your secure content for authenticated users goes here
echo "Welcome, " . $_SESSION['username'];

// ... rest of your code to display data




// Username is root
// $user = 'root';
// $password = '';

// // Database name is geeksforgeeks
// $database = 'geeksforgeeks';

// // Server is localhost with
// // port number 3306
// $servername='localhost:3306';
// $mysqli = new mysqli($servername, $user,
// 				$password, $database);




$servername="localhost";
$username="root";
$password="";
$database="test";

$mysqli=mysqli_connect($servername,$username,$password,$database);




// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT firstName, lastName, email, mobileNumber, description FROM registration";
$result = $mysqli->query($sql);
$mysqli->close();
?>


<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
<!-- <div>
<form action="index.php" method="post">

<label for="report">First Name : </label>

<input type="text" placeholder="First Name" name="FirstName">


<label for="report">Last Name : </label>
<input type="text" placeholder="Last Name" name="LastName">


<label for="report">Email : </label>
<input type="text" placeholder="Email" name="Email">


<label for="report">Mobile No. : </label>
<input type="number" placeholder="MobileNumber" name="MobileNumber">


<label for="Name">Description : </label>
<textarea placeholder="Description" name="Description" type="text" cols="30" rows="10"></textarea>

<button type="submit">submit</button>


</form> -->



<!-- </div> -->
<div>
<h1 align-text="Center">My Data in my DataBase</h1>

</div>
<div>
<table>
<!-- <tr><th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>MobileNumber</th>
                <th>Description</th></tr> -->

    <!-- PHP CODE TO FETCH DATA FROM ROWS -->
	<?php 
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>

<tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->



                <td><?php echo  " My First name is :"  . $rows['firstName'];?></td>
                <td><?php echo  "My Last name is :" . $rows['lastName'];?></td>
                <td><?php echo  "My Email is :" .      $rows['email'];?></td>
                <td><?php echo "My mobileNumber is :" . $rows['mobileNumber'];?></td>
                <td><?php echo "My Description is :" . $rows['description'];?></td>
            </tr>
            <?php
                }
            ?>




</table>






</div>




</body>
</html>
