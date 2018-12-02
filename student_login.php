<?php

   require "db_config.php";
   session_start();
   $_SESSION['is_student']=true;
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
        if (isset($_POST['egn'])){
            $myegn= $_POST['egn'];
            $sql = "SELECT * FROM students WHERE EGN=$myegn";
            $query = $conn->query($sql) or die(" Не съществува потребител с това ЕГН!");
            $row = $query->fetch(PDO::FETCH_ASSOC);
		
            if($row) {
                $_SESSION['user_egn'] = $myegn;
                header("location: student_profile.php");
            }else {
                //if there is no such EGN in db
                header("location: invalid_user_data.php");
            }
        }else {
            //if EGN not set
            header("location: invalid_user_data.php");
        }
   }
?>
