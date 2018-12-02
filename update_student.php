
<?php
    require "algorithm.php";
    require "db_config.php";
    session_start();
    $egn = $_GET['egn'];
    $sql = "SELECT * FROM students WHERE EGN=$egn";
    $query = $conn->query($sql) or die("  this failed!");
    $student = $query->fetch(PDO::FETCH_ASSOC);  //student is needed for diploma and exam grades
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_values=array();
         if (isset($_POST['gender'])){
            array_push($new_values, "gender='".$_POST['gender']."'");
         }
         if (isset($_POST['program'])){
            array_push($new_values, "program='".$_POST['program']."'");
         }
         if (isset($_POST['first_wish'])){
            array_push($new_values, "first_wish='".$_POST['first_wish']."'");
         }
         if (isset($_POST['second_wish'])){
            array_push($new_values, "second_wish='".$_POST['second_wish']."'");
         }
         if (isset($_POST['third_wish'])){
            array_push($new_values, "third_wish='".$_POST['third_wish']."'");
         }
         if ($_POST['name']!=""){
            array_push($new_values, "name='".$_POST['name']."'");
         }
         if ($_POST['mobile']!=""){
            array_push($new_values, "mobile='".$_POST['mobile']."'");
         }
         if ($_POST['email']!=""){
            array_push($new_values, "email='".$_POST['email']."'");
         }
         if ($_POST['diploma']!=""){
            array_push($new_values, "diploma='".$_POST['diploma']."'");
            $student['diploma'] = $_POST['diploma'];
         }
         if ($_POST['exam']!=""){
            array_push($new_values, "exam='".$_POST['exam']."'");
            $student['exam'] = $_POST['exam'];
         }
         if (isset($_POST['admission_type'])){
            array_push($new_values,"admission_type='".$_POST['admission_type']."'");
            if ($_POST['admission_type'] == "платено"){
                array_push($new_values, "exam=''");
                $student['exam'] = 0;
            }
         }
        $old_total_grade=$student['total_grade'];
        $total_grade = $student['diploma'] + 2*$student['exam'];
        array_push($new_values,"total_grade='".$total_grade."'");
        $new_values = implode(', ', $new_values);
        //print_r($new_values);
        $sql ="UPDATE students SET $new_values WHERE EGN=$egn"; 
        $query = $conn->query($sql) or die("  this failed!");
        if ($old_total_grade != $total_grade){
            //if type of program is changed, do the corresponding ranking
            if (isset($_POST['program']))
                rank_students($_POST['program']);
            else 
                rank_students($student['program']);
        }
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
  
    <title>Промяна на студент</title>
</head>
<body>

    <div class="container">
        <h3 class="centered">Данните за студента с ЕГН:<?php echo $egn;?> са променени!</h3>
        <button onclick="window.location.href='admin_profile.html'">Назад</button>
    </div>
   
</body>
</html> 
