<?php
if (isset($_GET['name'])) {
    $servername = "localhost";
    $username = "FullUser";
    $mypassword = fopen("password.gitignore", "r") or die("Unable to open file!");
    $password = fread($mypassword, filesize("password.gitignore"));
    $database = "mydatabase";
    fclose($mypassword);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sendquery = mysqli_prepare($conn, "SELECT * FROM users WHERE name = ?");
    mysqli_stmt_bind_param($sendquery, "s", $_GET['name']);


    echo "<html>";
    echo "<body>";
    echo "<p>";
    if ($sendquery->execute()) {
        if ($result = $sendquery->get_result()) {
            //$result = $sendquery->get_result();
            if (mysqli_num_rows($result) == 0) {
                echo "No user found.";
            }
            while ($row = $result->fetch_assoc()) {
                echo "<ul>";
                echo "<li>";
                printf("id: (%s) name: (%s) email: (%s) zip: (%s) date created: (%s) \n", $row["id"], $row["name"], $row["email"], $row["zip"], $row["accountcreated"]);       //% means where it will be inserting the arguement
                echo ("\n");
                echo "</li>";
                echo "</ul>";
            }
        }
    } else {
        echo "Querry failed";
    }
    echo "</p>";
    echo "</body>";
    echo "</html>";
    $conn->close();
} else {
    echo "<html>";
    echo "<body>";
    echo "<form action='Assignment_10_form.php' method='get'>";
    echo "Name: <input type='text' name='name'><br>";
    echo "<input type='submit'>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
}
