document.addEventListener("DOMContentLoaded", function(){

    document.querySelector(".addStudent>div:first-child button").addEventListener("click", function(){
        event.preventDefault();
        this.parentNode.parentNode.style.display="none";
        document.getElementById("program").style.display="inline-block";  
    })


    document.getElementById("bachelorButton").addEventListener("click", function(){
     document.getElementById("bachelor").style.display="inline-block";
     document.getElementById("master").style.display="none";
    });
    document.getElementById("masterButton").addEventListener("click", function(){
        document.getElementById("master").style.display="inline-block";
        document.getElementById("bachelor").style.display="none";
    });


    document.querySelectorAll("select").forEach(s=>s.addEventListener("click", function(){
        this.children[0].setAttribute("disabled", "true");
    }));


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
 

function add(){
   document.getElementById("addStudent").style.display="inline-block";
    
}