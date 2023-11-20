function validate(){
var nom = document.getElementById("nom").value;
var n_d_t = document.getElementById("n_d_t").value;
var prenom = document.getElementById("prenom").value;
var jour = document.getElementById("jour").value;
var mois = document.getElementById("mois").value;
var annee = document.getElementById("annee").value;
var pays = document.getElementById("pays").value;
var ville = document.getElementById("ville").value;
var code_postal = document.getElementById("code_postal").value;
var adres = document.getElementById("adres").value;

if (n_d_t == "" && adres == "" && nom == "" && prenom == "" && document.getElementById("jour").value == "jour" && document.getElementById("mois").value == "mois" && document.getElementById("annee").value == "annee" && ville == "" && code_postal == ""){
    document.getElementById("noureddyne_error").style.display = "block";
  document.getElementById("n_d_t").style.borderColor = "red";
  document.getElementById("nom").style.borderColor = "red";
  document.getElementById("prenom").style.borderColor = "red";
  document.getElementById("jour").style.borderColor = "red";
  document.getElementById("mois").style.borderColor = "red";
  document.getElementById("annee").style.borderColor = "red";
  document.getElementById("ville").style.borderColor = "red";
  document.getElementById("adres").style.borderColor = "red";
  document.getElementById("code_postal").style.borderColor = "red";
return false;
} else {
  document.getElementById("n_d_t").style.borderColor = "white";
  document.getElementById("nom").style.borderColor = "white";
    document.getElementById("noureddyne_error").style.display = "none";
  document.getElementById("prenom").style.borderColor = "white";
  document.getElementById("jour").style.borderColor = "white";
  document.getElementById("mois").style.borderColor = "white";
  document.getElementById("annee").style.borderColor = "white";
  document.getElementById("ville").style.borderColor = "white";
  document.getElementById("adres").style.borderColor = "white";
  document.getElementById("code_postal").style.borderColor = "white";
}

if (n_d_t.length < 4){
  document.getElementById("n_d_t").style.borderColor = "red";
    document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("n_d_t").style.borderColor = "white";
    document.getElementById("noureddyne_error").style.display = "none";
}

if (nom == ""){
  document.getElementById("nom").style.borderColor = "red";
      document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("nom").style.borderColor = "white";
      document.getElementById("noureddyne_error").style.display = "none";
}

if (prenom == ""){
  document.getElementById("prenom").style.borderColor = "red";
      document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("prenom").style.borderColor = "white";
      document.getElementById("noureddyne_error").style.display = "none";
}

if (document.getElementById("jour").value == "jour"){
  document.getElementById("jour").style.borderColor = "red";
      document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("jour").style.borderColor = "gray";
      document.getElementById("noureddyne_error").style.display = "none";
}

if (document.getElementById("mois").value == "mois"){
  document.getElementById("mois").style.borderColor = "red";
    document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("mois").style.borderColor = "gray";    
  document.getElementById("noureddyne_error").style.display = "none";
}

if (document.getElementById("annee").value == "annee"){
  document.getElementById("annee").style.borderColor = "red";
      document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("annee").style.borderColor = "gray";
      document.getElementById("noureddyne_error").style.display = "none";
}

if (ville == ""){
  document.getElementById("ville").style.borderColor = "red";
return false;
} else {
  document.getElementById("ville").style.borderColor = "white";
}

if (code_postal == ""){
  document.getElementById("code_postal").style.borderColor = "red";
return false;
} else {
  document.getElementById("code_postal").style.borderColor = "white";
}

if (adres.length < 4){
  document.getElementById("adres").style.borderColor = "red";
    document.getElementById("noureddyne_error").style.display = "block";
return false;
} else {
  document.getElementById("adres").style.borderColor = "white";
    document.getElementById("noureddyne_error").style.display = "none";
}


}