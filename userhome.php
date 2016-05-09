

<html>
<head>
<title>Online Quiz</title>

    <style type="text/css" media="screen">

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
<form name="login" action="test.php" method="POST">
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
		<li ><a href="index.php" class="ho1" style="color:#FFFFFF;"><b >Login</b></a></li>
		
		
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
  <center>
  
<?php

  Session_start();
  $_SESSION['counter']=0;
 
  
$con=mysqli_connect('localhost','root','')or die("no Connection");
mysqli_select_db($con,'quiz')or die("no DB");
if(isset($_POST['submit']))
{
$id=$_POST['id'];
$pass=$_POST['pass'];

$query1='select userid,password,role from userdata ';

$resultset=mysqli_query($con,$query1);

if(! $resultset )
{
	
		
	
  die('Could not get data: ' . mysql_error());
}


while($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC))
{
	if($pass==$row['password'])
	{
		echo"<center><label>valid Username & password</Label></center>";
		$_SESSION['user']=$_POST['id'];
		if($row['role']=='admin')
		{
			echo"<script>document.location='admin.php'</script>";
		}
		
?>	

	
<table>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
				<td><input id='Career-submit' type='submit' name = 'submit'    value = 'Career_Test'></td>
				<td><input id='Personality-submit' type='submit' name = 'submit' value = 'Personality_Test'></td>
				</tr>
				
</table>
</center>
<?php		
	}
		
}
}else
{
	$_SESSION['user']='facebookUser';
	?>
	<table>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
				<td><input id='Career-submit' type='submit' name = 'submit'    value = 'Career_Test'></td>
				<td><input id='Personality-submit' type='submit' name = 'submit' value = 'Personality_Test'></td>
				</tr>
				
</table>
</center>
	<?php
}	
	

?>
</form>
</body>
</html>
