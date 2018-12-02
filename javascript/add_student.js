function hideGrades() {
    hide('grades');
}

function showGrades() {
	show('grades');
}

function showBachelors(){
    hide('master');
    show('bachelor');
}

function showMasters(){
    hide('bachelor');
    show('master');
}

function hideAll(){
    hide('bachelor');
    hide('master');
}

function hide(element){
    var field = document.getElementById(element);    
	field.style.display = "none";    
}

function show(element){
    var field = document.getElementById(element);    
	field.style.display = "block";    
}
