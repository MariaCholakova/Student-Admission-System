<?php

$conn = new PDO('mysql:host=localhost;dbname=students', 'root', '');

$sql = "SELECT * FROM STUDENTS";

$query = $conn->query($sql) or die("failed!");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name'] . "*" . $row['egn'] . "*" . $row['email'] ."*". $row['address'] ."*". $row['assessment1'] ."*". $row['assessment2'] .",";
    
}

?>