<?php
    session_start();
    if ( isset($_SESSION['is_student']))  {
        if ($_SESSION['is_student']==true){
            header("location: index.html");
        }
    }
?>


<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title>Система за класиране на кандидат студенти</title> -->
    <link rel="stylesheet" href="stylesheets/reset.css">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/login.css">
    <script src="javascript/students.js"></script>
</head>

<body>
     <header>
        <img src="images/logo.png" alt="logo" id='logo'>
        <h1>Профил на служител</h1>
    </header>
    <button class="top-right" onclick="window.location.href='admin_login.html'">Назад</button>
    
     <div class="container">
            <ul class="menu">
                <li class="active">
                    Преглед класиране
                </li>
                <li>
                    <a href="add_student.html">Добави кандидат-студент</a>
                </li>
                <li>
                    <a href="search_student.html">Търси кандидат-студент</a>
                </li>
            </ul>
            
            <h2>Текущо класиране по специалности - бакалавър</h2>
            <ul>
                <li>
                    <a href="ranklist.php?major=1">Софтуерно инженерство</a>
                </li>
                <li>
                    <a href="ranklist.php?major=2">Компютърни науки</a>
                </li>
                <li>
                    <a href="ranklist.php?major=3">Информатика</a>
                </li>
                <li>
                    <a href="ranklist.php?major=4">Информационни системи</a>
                </li>
            </ul>
            <h2>Текущо класиране по специалности - магистър</h2>
            <ul>
                <li>
                    <a href="ranklist.php?major=5">Изкуствен интелект</a>
                </li>
                <li>
                    <a href="ranklist.php?major=6">Компютърна графика</a>
                </li>
                <li>
                    <a href="ranklist.php?major=7">Логика и алгоритми</a>
                </li>
                <li>
                    <a href="ranklist.php?major=8">Математическо моделиране в икономиката</a>
                </li>
            </ul>
     
    </div>

    


</body>

</html>
