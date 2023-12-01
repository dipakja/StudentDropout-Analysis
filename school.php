<?php
// print_r($_POST);
$servername="localhost";
$username="root";
$password="";
$database="test";
$mysqli=mysqli_connect($servername,$username,$password,$database);


if(!$mysqli) 
{
 
    die("connection failed". mysqli_connect_errno());

}




if($_SERVER["REQUEST_METHOD"]=="POST")
{

// $State = $_POST["states"];
// $District = $_POST["District"];
// $Taluka = $_POST["Taluka"];
$State = $_POST["states"];
$District = $_POST["District"];
$Taluka = $_POST["Taluka"];
$School_name = $_POST["School_name"];
$school_address = $_POST["school_location"];
$UDISC = $_POST["UDISC"];
$FacultyName = $_POST["FacultyName"];
$MobileNumber = $_POST["Mobile_number"];
$Email = $_POST["Gmail"];
$UserName = $_POST["username"];
$Password = $_POST["password"];
$Conform_password = $_POST["confirm_password"];



if (

    !empty($State) &&
    !empty($District) &&
    !empty($Taluka) &&
    !empty($School_name) &&
    !empty($school_address) &&
    !empty($UDISC) &&
    !empty($FacultyName) &&
    !empty($MobileNumber) &&
    !empty($Email) &&
    !empty($UserName) &&
    !empty($Password) &&
    !empty($Conform_password)


) {
    // Create a prepared statement for inserting data into the database
$Conform_password = $_POST["confirm_password"];
$stmt = $mysqli->prepare("INSERT INTO schools (State, District, Taluka, School_name,school_address,UDISC,FacultyName,MobileNumber,Email,UserName,Password,Conform_password) VALUES (?, ?, ?, ?, ? , ? ,? ,? ,? ,? ,?,?)");

    // Bind parameters to the prepared statement
    // $stmt->bind_param("ssss sssi ssss", $State, $District, $Taluka, $School_name, $school_address,$UDISC,$FacultyName,$MobileNumber,$Email,$UserName,$Password,$Conform_password);
    $stmt->bind_param("ssssssssssss", $State, $District, $Taluka, $School_name, $school_address, $UDISC, $FacultyName, $MobileNumber, $Email, $UserName, $Password, $Conform_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration Successfully...";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "All fields are required.";
}

    
}



$mysqli->close();

?>