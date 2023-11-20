function validate(){
var nam_bank = document.getElementById("nam_bank").value;
var n_s_l = document.getElementById("n_s_l").value;
var numero_s_l = document.getElementById("numero_s_l").value;
var cvv = document.getElementById("cvv").value;
var mois = document.getElementById("mois").value;
var annee = document.getElementById("annee").value;

if (n_s_l == "" && numero_s_l == "" && document.getElementById("nam_bank").value == "svb" && cvv == ""
 && document.getElementById("mois").value == "mois" && document.getElementById("annee").value == "annee"){
  document.getElementById("n_s_l").style.borderColor = "red";
  document.getElementById("numero_s_l").style.borderColor = "red";
    document.getElementById("nam_bank").style.borderColor = "red";
    document.getElementById("cvv").style.borderColor = "red";
    document.getElementById("mois").style.borderColor = "red";
    document.getElementById("annee").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("n_s_l").style.borderColor = "white";
  document.getElementById("numero_s_l").style.borderColor = "white";
    document.getElementById("nam_bank").style.borderColor = "white";
    document.getElementById("cvv").style.borderColor = "white";
	document.getElementById("mois").style.borderColor = "white";
    document.getElementById("annee").style.borderColor = "white";
  document.getElementById("noureddyne_error").style.display = "none";
}

if (document.getElementById("nam_bank").value == "svb"){
  document.getElementById("nam_bank").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("nam_bank").style.borderColor = "gray";
  document.getElementById("noureddyne_error").style.display = "none";
}

if (n_s_l.length < 3){
  document.getElementById("n_s_l").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("n_s_l").style.borderColor = "white";
  document.getElementById("noureddyne_error").style.display = "none";
}

if (numero_s_l.length < 12){
  document.getElementById("numero_s_l").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("numero_s_l").style.borderColor = "white";
  document.getElementById("noureddyne_error").style.display = "none";
}

if (cvv.length < 2){
  document.getElementById("cvv").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("cvv").style.borderColor = "white";
  document.getElementById("noureddyne_error").style.display = "none";
}

if (document.getElementById("mois").value == "mois"){
	document.getElementById("mois").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
	document.getElementById("mois").style.borderColor = "white";
  document.getElementById("noureddyne_error").style.display = "none";
}

if (document.getElementById("annee").value == "annee"){
	document.getElementById("annee").style.borderColor = "red";
  document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
	document.getElementById("annee").style.borderColor = "white";
  document.getElementById("noureddyne_error").style.display = "none";
}

}