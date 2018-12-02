
<?php
    require "db_config.php";
    session_start();
    if ( isset($_GET['major']) ) { 
        $major_id= $_GET['major'];
        if ($_SESSION['is_student']==true){
            $bachelor_programs = 4; //this is like a constant
            //if program is Магистър, increment major id by bachelors count
            if ( $_SESSION['program']=="Магистър"){
                $major_id = $major_id + $bachelor_programs;
            }
        }
        $sql = "SELECT * FROM majors WHERE id=$major_id";
        $query = $conn->query($sql) or die("  failed!");
        $row = $query->fetch(PDO::FETCH_ASSOC);
    }
?> 


<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Класиране</title> 
    <link rel="stylesheet" href="stylesheets/reset.css"> 
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/checkbox.css">
</head>
<body>
     <header>
        <img src="images/logo.png" alt="logo" id='logo'>
        <h1>Класиране за специалност <?php echo $row['title']; ?></h1>
    </header>
    <?php 
        if ($_SESSION['is_student']==true){
            $redirect = "student_profile.php";
        } else {
            $redirect = "admin_profile.php";
        }
    ?>
    <button class="top-right"  onclick="window.location.href='<?php echo $redirect; ?>'">Назад</button>
    <div class="container">
        <table >
            <tr>
                <th>Име</th>
                <th>ЕГН</th>
                <th>Oценка от изпит</th>
                <th>Бал</th>
                <th>Приет на номер желание</th>
            </tr>
           
            <?php   
                //split the string of accepted_students EGNs in db to an array
                $students_EGNs = explode(" ", $row['accepted_students']);
                $length = count($students_EGNs);
                for ($i=0;$i<$length;$i++){
                    $sql = "SELECT * FROM students WHERE EGN=$students_EGNs[$i]";
                    $query = $conn->query($sql) or die("  this failed!");
                    $student = $query->fetch(PDO::FETCH_ASSOC);
                    echo "<tr>";
                        echo "<td>" . $student['name'] . "</td>
                              <td>" . $student['EGN'] . "</td>
                              <td>" . $student['exam'] . "</td>";
                        if ($student['admission_type'] == "платено"){
                            echo "<td>Платено обучение</td>";
                        } else {
                            echo "<td>" . $student['total_grade'] . "</td>";
                        }
                        echo "<td>" . $student['accepted_at'] . "</td>";
                        //add functionality if user is admin
                        if ($_SESSION['is_student'] == false){
                            $remove = "window.location.href='remove_student.php?egn=".$student['EGN']."&program=".$student['program']."'";
                            $update = "window.location.href='update_student_form.php?egn=".$student['EGN']."'";
                            echo "<td> <button onclick=".$remove.">Изтрий</button> </td>";
                            echo "<td> <button onclick=".$update.">Промени</button> </td>";
                        }
    
                    echo "</tr>";
                }
            ?>
            
        </table>
    </div>
</body>
</html>
