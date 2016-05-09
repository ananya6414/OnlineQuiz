
<?php
include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '497773033750704'; //Facebook App ID
$appSecret = 'f0e3e61a60450b3b112cfaf4f416c45c'; // Facebook App Secret
$homeurl = 'http://localhost/OnlineQuiz/userhome.php';  //return to home
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret

));
$fbuser = $facebook->getUser();
?>