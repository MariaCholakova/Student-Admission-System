
var form = document.getElementById('student_form');

function show_message(element_id,string){
	document.getElementById(element_id).style.visibility="visible";
    document.getElementById(element_id).innerHTML=string;
}


function validate_form(form){
     
    var nameRE = /[а-яА-Я]+ [а-яA-Я]+ [а-яА-Я]+/;
    if(!nameRE.test(form.name.value)) {
        show_message('name_msg',"Моля въведете трите имена на студента, разделени с интервал !");
        return false;
    }
	
	var egnRE = /\d{10}/;
	if(!egnRE.test(form.egn.value)) {
        show_message('egn_msg',"Моля въведете правилно ЕГН!");
        return false;
    }
    
	var emailRE = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!emailRE.test(form.email.value)) {
        show_message('email_msg',"Моля въведете правилен имейл адрес!");
        return false;
    }
   
    var gradeRE= /([3-5]+[.]\d{2})|(6.00)/;
    if (!gradeRE.test(form.grade.value)) {
        show_message('grade_msg',"Моля въведете оценка във формат (3,50)!");
        return false;
    }
	
    return true;
}
