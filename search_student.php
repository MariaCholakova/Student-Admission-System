<?php 
    require "db_config.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $egn=$_GET['egn'];
        $sql = "SELECT * FROM students WHERE egn='$egn'";
        $query = $conn->query($sql) or die(" Не съществува потребител с тези данни!");
        $student = $query->fetch(PDO::FETCH_ASSOC);
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
  
    <title>Резултати от търсенето</title>
</head>
<body>

    <div class="container">
        <?php
            if ($student){
            echo " <h3 class='centered'>Информация за студентa с ЕГН:".$egn."</h3>
                    <p>Име: ".$student['name']."</p>
                    <p>ЕГН: ".$student['EGN']."</p>
                    <p>Телефон: +359  ".$student['mobile']."</p>
                    <p>Имейл: ".$student['email']."</p>
                    <p>Пол: ".$student['gender']."</p>
                    <p>Вид обучение: ".$student['admission_type']."</p>
                    <p>Оценка от изпит: ".$student['exam']."</p>
                    <p>Оценка от дипломата: ".$student['diploma']."</p>
                    <p>Бал: ".$student['total_grade']."</p>
                    <p>Вид програма: ".$student['program']."</p>
                    <p>Специалност първо желание: ".$student['first_wish']."</p>
                    <p>Специалност второ желание: ".$student['second_wish']."</p>
                    <p>Специалност трето желание: ".$student['third_wish']."</p> ";
                  if ($student['accepted_at'] == "" && $student['admission_type']=="държавна поръчка"){
                        $student['accepted_at']="Не е приет";
                  }
            echo "<p>Приет на: ".$student['accepted_at']."</p> ";
            
        }
        else{
            echo "<h3 class='centered'>Няма студент с това ЕГН!</h3>";
        }
        ?>
        <button onclick="window.location.href='search_student.html'">Назад</button>
   
            
    </div>
   
</body>
</html> 
