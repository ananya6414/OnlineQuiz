
<html>
<head>
<title>Online Quiz</title>

    <style type="text/css" media="screen" >
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
.ho1{
	font-family: san-serif;
	color:#707070 ;
	text-decoration:none;
}

 .ho1:hover{
 font-family: san-serif;
	color: #FFFFFF;
	text-decoration:none;
 }
#horizontalmenu ul 
{
	padding:1; margin:1; list-style:none;
}

#horizontalmenu li
{

float:left;
 position:relative;
 padding-right:89;
 display:block;
border:0px solid #CC55FF; 
border-style:inset;
margin-left:20px;
}
#horizontalmenu li ul
 {
	display:none;
	position:absolute;
}
#horizontalmenu li:hover ul{
    display:block;
    background:#222222;
	height:auto; width:8em; 
}
#horizontalmenu li ul li
{
    clear:both;
border-style:none;}
#table{
border: 2px solid #a1a1a1;
    padding: 10px 40px; 
    <!--background: #dddddd;-->
    width: 300px;
    border-radius: 25px;
}
#t1{
	background:-webkit-radial-gradient(center, ellipse farthest-corner, #FFFFFF 0%, #612911 100%);
	box-shadow: 12px 10px 7px black;
	
}

	
body
{
	background:#342D7E;
}
</style>	
</head>
<body>
<script>
// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{your-app-id}',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

<form name="login" action="userhome.php" method="POST">
<center>

<table id="t1" width="1200" height="400" border="1" style="border-radius:10px;" >
  <tbody>
    <tr style="background-color:#98AFC7;">
    <th height="100" colspan="5" ><div style="text-align:left;color:#FFFFFF"><b><font size="+3">
			Online Quiz</th>
    </tr>
    
</div>


    <tr>
      <td height="38" colspan="2" style="background-color:#A83E49; border-radius:10px;"><!-- navigation bar-->
	
      <div id="horizontalmenu">
	  
        <ul ><!-- ALL MENUS...-->
		<li ><a href="Login.php" class="ho1" style="color:#FFFFFF;"><b >Login</b></a></li>
		
	
       </div>
              </li>
		 </ul>
                 
         

        
      </td>
    </tr>
	
    <tr>
	<!--
	<td  width="343" style="background-color:#F2E6E4;border-radius:10px;">
	<center>
	<h2><a href="input_article.php">Write An Article</a></h2>
	<h2><a href="articles.php">View All The Article </a></h2>
	<h2><a href="editarticle.php">Edit In Existing Article</a></h2>
	<h2><a href="Removearticle.php">Remove Your own Article</a></h2>
	
	
	   
	</center>
   	--> 
	
   
  <td width="974" height="555" bgcolor="#F2E6E6" style="vertical-align:text-top ;border-radius:10px;">
	 <center></br></br>
				<h1>Welcome to Online Quiz...	</h1>	</center>
<!-- space for description of menu -->
<center>
<table>
<tr>
		<td>ID: </td><td><input type="text" name="id"></td>
		</tr>
		<tr><td>Password:</td><td> <input type="password" name="pass"></td>
		</tr>
		
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr><td><input type="submit" name='submit' value='Log in'/></td></tr>
</table>


<!---<button type="submit" name="Log in">log in</button>   --->
</form>
</center>
      </td>
  
  
  <?php
  include_once("config.php");
include_once("includes/functions.php");
//destroy facebook session if user clicks reset
if(!$fbuser){
	$fbuser = null;
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginUrl.'"><img src="images/fb_login.png"></a>'; 	
}else{
	$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
	$user = new Users();
	$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
	if(!empty($user_data)){
		$output = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$user_data['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $user_data['oauth_uid'];
        $output .= '<br/>Name : ' . $user_data['fname'].' '.$user_data['lname'];
        $output .= '<br/>Email : ' . $user_data['email'];
        $output .= '<br/>Gender : ' . $user_data['gender'];
        $output .= '<br/>Locale : ' . $user_data['locale'];
        $output .= '<br/>You are login with : Facebook';
        $output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>'; 
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}
echo $output;
?>


  
  </tbody>
</table>
</center>
<!---</form> --->
</body>
</html>