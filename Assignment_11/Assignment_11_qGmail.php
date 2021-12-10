<?php
$servername = "localhost";
$username = "FullUser";
$mypassword = fopen("password.gitignore","r") or die("Unable to open file!");
$password = fread($mypassword,filesize("password.gitignore"));
$database="mydatabase";
fclose($mypassword);

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email = "%@gmail%";
$sendquery =("SELECT * FROM users WHERE email LIKE '%@gmail%'");
//mysqli_real_escape_string($conn,$email));
//$sendquery =$conn->prepare("SELECT * FROM users WHERE email LIKE ?");
//$sendquery->bind_param("is",$email);
//ok wtf was happening here, these suggestions that I found online were not working, they do look butchered out in the comments now but i'd like to talk about this if possible

echo "<html>";
echo "<body>";
echo "<p>";
if ($qresult = $conn -> query($sendquery)) {
    while($row = $qresult -> fetch_row()){
        echo "<ul>";
        echo "<li>";
        printf("id: (%s) name: (%s) email: (%s) zip: (%s) date created: (%s) \n", $row[0],$row[1],$row[2],$row[3],$row[4]);       //% means where it will be inserting the arguement
        echo("\n");
        echo "</li>";
        echo "</ul>";
    }
    $qresult -> free_result();
}
echo "</p>";
echo "</body>";
echo "</html>";
$conn -> close();
?>