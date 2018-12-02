
<?php
    session_start();
    require "db_config.php";
    
     function filter($assoc_array, $key, $value){
        $res=array();
        foreach ($assoc_array as $ind => $row){
            if ($row[$key]==$value){
                array_push($res,$row);
            }
        }
        return $res;
    }
    
    function desc_cmp($row1, $row2){
        $key='total_grade';
        if ($row1[$key] == $row2[$key]) {
            return 0;
        }
        return ($row1[$key] < $row2[$key]) ? 1 : -1;
    }
    
    
    
    
    //program is Бакалавър или Магистър
    function rank_students($program){
        $sql = "SELECT * FROM majors WHERE type='$program'";
        $query = $conn->query($sql) or die("  failed!");
        //majors is the array with all majors of type "$program"
        $majors = $query->fetchAll(PDO::FETCH_ASSOC); 
        $majors_cnt = count($majors);
        //add waitlist to each major
        for ($i = 0; $i<$majors_cnt;$i++){
            $majors[$i]['curr_list']=array();
        }
        //this array will hold all rejected students
        $rejected = array();
        //phase 1 of the algorithm - first wish
        for ($i = 0; $i<$majors_cnt;$i++){
            //count the free positions in each major - that is all students count
            //minus paying students, because the ones who pay are automatically accepted
            $title = $majors[$i]['title'];
            $sql = "SELECT * FROM students WHERE admission_type='платено'
                    AND first_wish='$title'";
            $query = $conn->query($sql) or die("  failed!");
            $paying = $query->fetchAll(PDO::FETCH_ASSOC); 
            $majors[$i]['paying'] = $paying;
            $majors[$i]['students_count']= $majors[$i]['students_count'] - count($paying);
            echo "<br>major st priem: ".$majors[$i]['students_count']."<br>";
            //select all students who want to apply to this major and don't pay
            $sql = "SELECT EGN,first_wish,second_wish,third_wish,total_grade FROM students
                    WHERE admission_type='държавна поръчка' AND first_wish='$title'
                    ORDER BY total_grade DESC";
            $query = $conn->query($sql) or die("  failed!");
            $count_sql = "SELECT COUNT(*) c FROM students
                          WHERE admission_type='държавна поръчка' AND first_wish='$title'";
            $count_query = $conn->query($count_sql) or die("  failed!");
            $number_rows=$count_query->fetch(PDO::FETCH_ASSOC);
            for ($j = 0; $j<$majors[$i]['students_count'] && $number_rows['c']>0 ;$j++){
                array_push($majors[$i]['curr_list'],$query->fetch(PDO::FETCH_ASSOC));
                $number_rows['c']--;
            }
            //push unaccepted students to rejected array
            while ($student = $query->fetch(PDO::FETCH_ASSOC)) {
                    array_push($rejected, $student);
            }
        }
        
        $wishes=array("second_wish", "third_wish");
        for ($w=0;$w<2;$w++){
            $wish=$wishes[$w];
            for ($i=0;$i<$majors_cnt;$i++){
                    $title=$majors[$i]['title'];
                    $rejected_filtered = filter($rejected,$wish,$title);
                    usort($rejected_filtered,"desc_cmp");
                    //the there are free positions in this major
                    if (count($majors[$i]['curr_list']) < $majors[$i]['students_count'] ){
                        $how_many = $majors[$i]['students_count'] - count($majors[$i]['curr_list']);
                        $majors[$i]['curr_list'] = array_merge($majors[$i]['curr_list'],array_slice($rejected_filtered,0,$how_many));
                        usort($majors[$i]['curr_list'],"desc_cmp");
                        $rejected = array_merge($rejected,array_slice($rejected_filtered,$how_many));
                            
                    } 
            }
        }
          
        
        //set accepted students in the database
        for ($i=0;$i<$majors_cnt;$i++){
            $EGNs=array();
            foreach ($majors[$i]['curr_list'] as $ind => $student){
               // echo "waitlist:".count($majors[$i]['curr_list'])."<br>";
                array_push($EGNs,$student['EGN']);
                if ($majors[$i]['title']==$student['first_wish'])
                    $wish_accepted = "first_wish";
                if ($majors[$i]['title']==$student['second_wish'])
                    $wish_accepted = "second_wish";
                if ($majors[$i]['title']==$student['third_wish'])
                    $wish_accepted = "third_wish";
               // echo "<br>".$wish_accepted."<br>";
                $sql = "UPDATE students SET accepted_at = ? WHERE EGN = ?";
                $conn->prepare($sql)->execute([$wish_accepted, $student['EGN']]);
            }
            foreach ($majors[$i]['paying'] as $ind => $student){
                array_push($EGNs,$student['EGN']); 
            }
            $string_EGNs=implode(" ",$EGNs);
            echo $string_EGNs."<br>";
            $sql = "UPDATE majors SET accepted_students = ? WHERE title = ?";
            $conn->prepare($sql)->execute([$string_EGNs, $majors[$i]['title']]);
            
        }
        
    }
    
//     echo "<br>Бакалавър<br>";
//     rank_students("Бакалавър");
//     
//     echo "<br>Mагистър<br>";
//     rank_students("Магистър");
//     
    
    
    
    
    
    
    

?> 
