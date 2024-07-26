<?php
// Database components and connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "php_crud";

$con = mysqli_connect($host, $username, $password, $dbname);

$response = array();

if ($con) {
    $query = "SELECT * FROM customer";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Content-type: application/json");
        $i = 0;

        // Fetching the content of the database
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]["id"] = $row["id"];
            $response[$i]["name"] = $row["name"];
            $response[$i]["email"] = $row["email"];
            $response[$i]["phone_no"] = $row["phone_no"];
            $i++;
        }
    } else {
        $response["error"] = "Failed to fetch data.";
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    $response["error"] = "Database connection failed.";
    echo json_encode($response, JSON_PRETTY_PRINT);
}

mysqli_close($con);
?>
