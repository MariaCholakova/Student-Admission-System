document.addEventListener("DOMContentLoaded", function(){

    document.getElementById("bachelorButton").addEventListener("click", function(){
        event.preventDefault();
     document.getElementById("bachelor").style.display="inline-block";
     document.getElementById("master").style.display="none";
    });
    document.getElementById("masterButton").addEventListener("click", function(){
        event.preventDefault();
        document.getElementById("master").style.display="inline-block";
        document.getElementById("bachelor").style.display="none";
    });


});





function loadStudents() {
  
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var students=this.responseText.split(',');
                console.log(students);
                document.querySelector("section").innerHTML = '<table class="studentsTable"><tr> <th>Name</th> <th>EGN</th> <th>Email</th> <th>Address</th> <th>Izpit</th> <th>Matura</th> </tr></table>';
                for(var i=0;i<students.length;i++){
                    console.log(students[i]);
                    var student = students[i].split("*");
                    var tr=document.createElement("tr");
                    for(var j=0; j<student.length;j++){
                        
                            tr.innerHTML+=`<td>${student[j]}</td>`;
                
                        
                    }
                        document.querySelector("tbody").append(tr);
                    
                }  
            }
        };
        xmlhttp.open("GET", "http://localhost/kss/db.php", true);
        xmlhttp.send(null);
    
}
 

