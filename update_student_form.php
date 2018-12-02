<?php
    require "db_config.php";
    session_start();
    if ( isset($_SESSION['is_student']))  {
        if ($_SESSION['is_student']==true){
            header("location: index.html");
        }
    }
    
    if ( isset($_GET['egn']) ) { 
        $egn= $_GET['egn'];
        $sql = "SELECT * FROM students WHERE EGN=$egn";
        $query = $conn->query($sql) or die("  this failed!");
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
    <link rel="stylesheet" href="stylesheets/checkbox.css">
    <script src="javascript/add_student.js"></script>
  
    <title>Промяна на студент</title>
</head>
<body onload="showBachelors()">
    <header>
        <img src="images/logo.png" alt="logo" id='logo'>
        <h1>Промени данни за кандидат-студент с ЕГН:<?php echo $egn;?></h1>
    </header>
    <button class="top-right" onclick="window.location.href='admin_profile.php'">Назад</button>
    <div class="container">
        <form id="student_form" action="update_student.php?egn=<?php echo $egn;?>" method="POST" onsubmit="return validate_form(this);">
                <h2>Посочете нова информация в желаните полетата:</h2>
                <div class="centered col-3">
                        <h4>Име:</h4>
                        <input class="wide" type="text" placeholder="<?php echo $student['name']?>" id="name" name="name"/>
                        <label class="error_message" id="name_msg"></label> 
                        <h4>Tелефон:</h4>
                        <input class="wide" type="text" placeholder="<?php echo $student['mobile']?>" id="mobile" name="mobile"/>
                        <label class="error_message" id="mobile_msg"></label>
                        <h4>Имейл:</h4>
                        <input class="wide" type="text" placeholder="<?php echo $student['email']?>" id="email" name="email"/>
                        <label class="error_message" id="email_msg"></label>
                </div>
                <div class="checkbox-container">
                    <label class="box">Мъж
                        <input type="radio" name="gender" value="Мъж" >
                        <span class="checkmark"></span>
                    </label>
                    <label class="box">Жена
                        <input type="radio" name="gender" value="Жена" >
                        <span class="checkmark"></span>
                    </label>
                </div>
               
          
                <div class="checkbox-container">
                    <label class="box">Държавна поръчка
                        <input type="radio" name="admission_type" value="държавна поръчка" onclick="showGrades()">
                        <span class="checkmark"></span>
                    </label>
                    <label class="box">Платено
                        <input type="radio" name="admission_type" value="платено" onclick="hideGrades()">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div id="grades" class="input-container col-2">
                    <h4>Оценка от диплома:</h4>
                    <input class="thin" type="text" placeholder="<?php echo $student['diploma']?>" name="diploma"/>
                    <label class="error_message" id="grade_msg"></label>
                    <h4>Оценка от изпит</h4>
                    <input class="thin" placeholder="<?php echo $student['exam']?>" name="exam"/>
                    <label class="error_message" id="grade_msg"></label>
                </div>
           
                <div class="checkbox-container"> 
                    <label class="box">Бакалавър
                        <input type="radio"  name="program" value="Бакалавър" onclick="showBachelors()">
                        <span class="checkmark"></span>
                    </label>
                    <label class="box">Магистър
                        <input type="radio"  name="program" value="Магистър" onclick="showMasters()">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div id='bachelor'>
                    <h4>Първо желание</h4>
                    <div > 
                        <label class="box">Софтуерно инженерство
                            <input type="radio"  name="first_wish" value="Софтуерно инженерство"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Компютърни науки
                            <input type="radio"  name="first_wish" value="Компютърни науки"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Информатика
                            <input type="radio"  name="first_wish" value="Информатика"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Информационни системи
                            <input type="radio"  name="first_wish" value="Информационни системи"> <span class="checkmark"></span>
                        </label>
                    </div>
                    <h4>Второ желание</h4>
                    <div > 
                        <label class="box">Софтуерно инженерство
                            <input type="radio"  name="second_wish" value="Софтуерно инженерство"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Компютърни науки
                            <input type="radio"  name="second_wish" value="Компютърни науки"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Информатика
                            <input type="radio"  name="second_wish" value="Информатика"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Информационни системи
                            <input type="radio"  name="second_wish" value="Информационни системи"> <span class="checkmark"></span>
                        </label>
                    </div>
                    <h4>Трето желание</h4>
                    <div > 
                        <label class="box">Софтуерно инженерство
                            <input type="radio"  name="third_wish" value="Софтуерно инженерство"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Компютърни науки
                            <input type="radio"  name="third_wish" value="Компютърни науки"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Информатика
                            <input type="radio"  name="third_wish" value="Информатика"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Информационни системи
                            <input type="radio"  name="third_wish" value="Информационни системи"> <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div id="master">
                    <h4>Първо желание</h4>
                    <div > 
                        <label class="box">Компютърна графика
                            <input type="radio"  name="first_wish" value="Компютърна графика"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Логика и алгоритми
                            <input type="radio"  name="first_wish" value="Логика и алгоритми"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Математическо моделиране в икономиката
                            <input type="radio"  name="first_wish" value="Математическо моделиране в икономиката"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Изкуствен интелект
                            <input type="radio"  name="first_wish" value="ai"> <span class="checkmark"></span>
                        </label>
                    </div>
                    <h4>Второ желание</h4>
                    <div > 
                        <label class="box">Компютърна графика
                            <input type="radio"  name="second_wish" value="Компютърна графика"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Логика и алгоритми
                            <input type="radio"  name="second_wish" value="Логика и алгоритми"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Математическо моделиране в икономиката
                            <input type="radio"  name="second_wish" value="Математическо моделиране в икономиката"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Изкуствен интелект
                            <input type="radio"  name="second_wish"  value="Изкуствен интелект"> <span class="checkmark"></span>
                        </label>
                    </div>
                    <h4>Трето желание</h4>
                    <div > 
                        <label class="box">Компютърна графика
                            <input type="radio" name="third_wish" value="Компютърна графика"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Логика и алгоритми
                            <input type="radio"  name="third_wish" value="Логика и алгоритми"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Математическо моделиране в икономиката
                            <input type="radio"  name="third_wish" value="Математическо моделиране в икономиката"> <span class="checkmark"></span>
                        </label>
                        <label class="box">Изкуствен интелект
                            <input type="radio"  name="third_wish" value="Изкуствен интелект"> <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                
                
                <button type="submit" value="Промени">Промени</button>
        </form>
    </div>
   
</body>
</html> 
