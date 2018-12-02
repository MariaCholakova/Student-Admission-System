<?php
    require "algorithm.php";
    require "db_config.php";
    session_start();
    if ( isset($_SESSION['is_student']))  {
        if ($_SESSION['is_student']==true){
            header("location: index.html");
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $total_grade=0;
        if ($_POST['admission_type']=="държавна поръчка"){
            $total_grade = $_POST['diploma'] + 2*$_POST['exam'];
        }
        
        $name = $_POST['name'];
        $egn = $_POST['egn'];
        $mobile =  $_POST['mobile'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $admission_type = $_POST['admission_type'];
        $diploma = $_POST['diploma'];
        $exam = $_POST['exam'];
        $program = $_POST['program'];
        $fw = $_POST['first_wish'];
        $sw = $_POST['second_wish'];
        $tw = $_POST['third_wish'];
        $accepted="";
        $ins_query = $conn->prepare("INSERT INTO 
									 students (EGN, name, mobile, email, gender, diploma, exam, total_grade,
									           program, first_wish, second_wish, third_wish, admission_type,accepted_at) 
									 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");							 
		$ins_query->execute([ $egn, $name, $mobile, $email, $gender, $diploma, $exam, $total_grade, $program, $fw, $sw, $tw, $admission_type, $accepted]); 
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
  
    <title>Добавяне на студент</title>
</head>
<body>

    <div class="container">
        <h3 class="centered">Студентът с ЕГН:<?php echo $egn;?> е добавен към базата данни!</h3>
        <button onclick="window.location.href='admin_profile.php'">Назад</button>
    </div>
   
</body>
</html> 
