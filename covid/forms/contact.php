<?php

 

require_once "Mail.php";







 $connection_DbName = "wmpsc_covid";

  $connection_UserName = "wmpsc_covid";

  $connection_password = "J9iq3d_4";

  



$connection_host = "localhost";



$link = @mysql_connect($connection_host,$connection_UserName,$connection_password) or die('Unable to establish a DB connection');

  mysql_select_db($connection_DbName,$link);





 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 

            // Google reCAPTCHA API secret key 

            $secretKey = '6LfQlO0UAAAAAONzcChY9eiVp2EBhCuldmcYazsi'; 

             

            // Verify the reCAPTCHA response 

            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 

             

            // Decode json data 

            $responseData = json_decode($verifyResponse); 

             

            // If reCAPTCHA response is valid 

            if($responseData->success){ 



                 $name =  $_POST['name'];

                 $contact =  $_POST['contact'];

                 $exp =  $_POST['exp'];

                 $state =  $_POST['state'];

                 $city = $_POST['city'];

                 $address =  $_POST['address'];

                 

                $sqlstate="SELECT * FROM states WHERE id='".$state."'";

                $exestate = mysql_query($sqlstate);

                $arrstate = mysql_fetch_array($exestate);

                $state_name = $arrstate['name'];

                

                

                 $qry="select * from cities where id='$city'";

                 $rst=mysql_query($qry);         

                 $arr=mysql_fetch_assoc($rst);

                 $city_name = $arr['name'];

                    

                 



                 $sql = "INSERT INTO plumber_master (full_name,contact_num,state,city,address,experiance,post_date)VALUES('".$name."','".$contact."',".$state.",".$city.",'".$address."','".$exp."',now())";

                 $execute = mysql_query($sql);

                 if(mysql_affected_rows()>0)

                 {

                    //for email to this entry

                        $email = "covid@ipssc.in";

                        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

                        $post_date = date("d-M-Y H:i:s");

                            

                        

                        $strMessage = "

                            <table>

                                <tr>

                                    <td>Name: </td>

                                    <td>{$name}</td>

                                </tr>

                               

                                <tr>

                                    <td>Contact No.: </td>

                                    <td>{$contact}</td>

                                </tr>

                                <tr>

                                    <td>State: </td>

                                    <td>{$state_name}</td>

                                </tr>

                                

                                <tr>

                                    <td>City: </td>

                                    <td>{$city_name}</td>

                                </tr>



                                <tr>

                                    <td>Address: </td>

                                    <td>{$address}</td>

                                </tr>



                                <tr>

                                    <td>Experience: </td>

                                    <td>{$exp}</td>

                                </tr>

                                

                                <tr>

                                    <td>Date:</td>

                                    <td>{$post_date}</td>

                                </tr>

                                

                                <tr>

                                    <td>IP:</td>

                                    <td>{$ip}</td>

                                </tr>

                            </table>";  

                    



                            $from = $email; //replace it with full email id created on your web hosting ac hosted with us.



                            $to = "indianplumbingskillscouncil@gmail.com"; //replace it with email address  where you want to send the email to.



                            $subject = "Plumber Form Data From Covid Page";



                            $body = $strMessage;



                            $host = "mail.ipssc.in";



                            $port = "110";



                            $username = "covid@ipssc.in";



                            $password = "ebiz1234";



                            $headers = array ('From' => $from,'To' => $to,'Subject' => $subject, 'MIME-Version' => 1, 'Content-type' => 'text/html;charset=iso-8859-1');



                            $smtp = Mail::factory('smtp',



                            array ('host' => $host,



                            'auth' => false,



                            'username' => $username,



                            'password' => $password));



                            $mail = $smtp->send($to, $headers, $body);



                            if (PEAR::isError($mail)) {



                            echo("<p>" . $mail->getMessage() . "</p>");



                            } else {



                            echo "OK";



                            }

                 }

                 else

                 {

                   echo "Somthing Went wrong";

                 }



            }

            else

            {

              echo "Robot verification failed, please try again.";

            }

}

else{ 

            echo 'Please check on the reCAPTCHA box.'; 

        } 





 





?>

