    
<?php
// Your database connection code
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
$mysqli = mysqli_connect($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if a search term is provided
if (isset($_GET['search_term'])) {
    $search_term = $_GET['search_term'];

    // Construct and execute the SQL query
    $query = "SELECT * FROM registration WHERE lastName LIKE '%$search_term'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Loop through the results and generate the search results
        echo "<table> ";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>FirstName:</td><td>{$row['firstName']}</td></tr>";
            echo "<tr><td>LastName:</td><td>{$row['lastName']}</td></tr>";
            echo "<tr><td> email:</td><td>{$row['email']}</td></tr>";
            echo "<tr><td> mobileNumber:</td><td>{$row['mobileNumber']}</td></tr>";
            echo "<tr><td> description:</td><td>{$row['description']}</td></tr>";
            // Add more fields as needed
        }
        echo "</table>";

        // Close the database connection if opened
        mysqli_close($mysqli);
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>


