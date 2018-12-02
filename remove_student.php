
<?php
    require "algorithm.php";
    require "db_config.php";
    session_start();

    if ( isset($_GET['egn']) ) { 
        $egn= $_GET['egn'];
        $sql = "DELETE FROM students WHERE EGN=$egn";
        $conn->prepare($sql)->execute();
        $program=$_GET['program'];
        rank_students($program);
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheets/reset.css">
    <link rel="stylesheet" href="stylesheets/style.css">
  
    <title>Премахване на студент</title>
</head>
<body>

    <div class="container">
        <h3 class="centered">Студентът с ЕГН:<?php echo $egn;?> е премахнат от базата данни!</h3>
        <button onclick="window.location.href='admin_profile.php'">Назад</button>
    </div>
   
</body>
</html> 
