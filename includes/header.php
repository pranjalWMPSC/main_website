<?php

 include "admin/connection/connect.php";

 if(isset($_POST['newsletter_btn']))

    {

        $newsletter_email = $_POST['newsletter_email']; 

        $check = "SELECT * FROM subscribe_mail WHERE subscribe_mail='".$newsletter_email."'";

        $chexe = mysqli_query($mysqli,$check);

        if(mysqli_affected_rows($mysqli)>0)

        {

        	echo "<script>";

        	echo "alert('You are already Subscribe With IPSC!')";

        	echo "</script>";

        }

        else

        {

        	$subs_sql = "INSERT INTO subscribe_mail(subscribe_mail,post_date) VALUES ('".$newsletter_email."',now())";

        	$subs_exe = mysqli_query($mysqli,$subs_sql);



       		echo "<script>";

        	echo "alert('You have Successfully Subscribe With IPSC!')";

        	echo "</script>";

        }

       



    }



    $statics = "SELECT * FROM statics";

    $exestaics = mysqli_query($mysqli,$statics);

    while($static_arr = mysqli_fetch_array($exestaics))

    {

      if($static_arr['statics_title']=='Industry Partners'){$first = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Training Partners'){$two = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Assessment Partners'){$three = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Job Roles/Courses'){$four = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Candidates Enrolled'){$five = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Candidates Trained'){$six = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Candidates Assessed'){$seven = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Candidates Certified'){$eight = $static_arr['statics_number'];}

      else if($static_arr['statics_title']=='Qualification Pack/NOS'){$nine = $static_arr['statics_number'];}

    }







?>

<meta charset="utf-8">

<title>Water Management & Plumbing Skill Council  (WMPSC) | Home Page</title>

<!-- Stylesheets -->

<link href="css/bootstrap.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="css/slick.css" rel="stylesheet">

<link href="css/responsive.css" rel="stylesheet">

<!--Color Switcher Mockup-->

<link href="css/color-switcher-design.css" rel="stylesheet">

<!--Color Themes-->

<link id="theme-color-file" href="css/color-themes/orange-theme.css" rel="stylesheet">

<link rel="icon" href="images/favicon-32x32png" type="image/x-icon">



<!-- Responsive -->

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">



<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->

<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<!--

<script type="text/javascript">

(function () {

    var options = {

        whatsapp: "+919826257356", // WhatsApp number

        call_to_action: "Message us", // Call to action

        position: "left", // Position may be 'right' or 'left'



    };

    var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;

    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';

    s.onload = function () { WhWidgetSendButton.init(host, proto, options); };

    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);

})();

</script> -->



<script id="mcjs">!function(c,h,i,m,p)

{m=c.createElement(h),p=c.getElementsByTagName(h)

[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}

(document,"script","https://chimpstatic.com/mcjs-connected/js/users/3577f28867177887b14152128/c4c83a3542822b15299a76bfe.js");

</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173468287-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-173468287-1');
</script>









