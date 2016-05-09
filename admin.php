
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
<form name="admin" action="admin.php" method="POST">
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
		
		<!--<li ><a href="home.php" class="ho1" ><b >HOME</b></a></li>
        <li><a href="articles.php" class="ho1"><b>ARTICLES</b></a></li>
		<li><a href="categories.php" class="ho1"><b>CATEGORIES</b></a></li>	
        <li><a href="my_profile.php" class="ho1"><b>MY PROFILE</b></a></li>
		<li><a href="about.php" class="ho1"><b>ABOUT </b></a></li>
		<li><a href="logout.php" class="ho1" ><b>LOG OUT</b></a>-->
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
				Hello Admin
				
				<table>
				<tr>
				<td><input id='Career-submit' type='submit' name = 'submit'    value = 'Career_Test'></td>

				</tr>
				<tr>
				<td><input id='Personality-submit' type='submit' name = 'submit' value = 'Personality_Test'></td>
				</tr>
				
				</table>


</center>
</form>
</body>
</html>
<?php
session_start();
if (isset($_POST['submit'])) 
{
$cat=$_POST['submit'];
if($cat=="Career_Test")
{
	$_SESSION['cat']='Career_Test';
}
elseif($cat=="Personality_Test")
{
	$_SESSION['cat']='Personality_Test';
}
}

if (isset($_POST['submit'])) 
{
	$type=$_POST['submit'];
	echo "<center>".$type."</center>";
	if($type=='NEXT')
	{
		$q=$_POST['ques'];
		$a=$_POST['opa'];
		$b=$_POST['opb'];
		$c=$_POST['opc'];
		$d=$_POST['opd'];
	$con=mysqli_connect('localhost','root','')or die("no Connection");

	mysqli_select_db($con,'quiz')or die("no DB");
	if($_SESSION['cat']=="Career_Test")
	{
	$query="insert into Questions_CR(Ques,op1,op2,op3,op4) VALUES('$q','$a','$b','$c','$d')";
	if(mysqli_query($con,$query))
		echo " ";
	else
		echo "Fail".mysqli_error($con);
	}
	
	elseif($_SESSION['cat']=="Personality_Test")
	{
	$query="insert into Questions_py(Ques,op1,op2,op3,op4) VALUES('$q','$a','$b','$c','$d')";
	if(mysqli_query($con,$query))
		echo " ";
	else
		echo "Fail".mysqli_error($con);
	}
	}

	?>
	<html>
<body>
	<form name="questions" action="admin.php" method="POST">
	<center>
	<table>
	<tr>
	<input type="Text" name="ques" >
	</tr>
	<tr>
	<td>a)<input type="Text" name="opa" ></td>
	<td>b)<input type="Text" name="opb" ></td>
	</tr>
	<tr>
	<td>c)<input type="Text" name="opc" ></td>
	<td>d)<input type="Text" name="opd" ></td>
	</tr>
	</table>
	<input id='Next-submit' type='submit' name = 'submit' value = 'NEXT'>
	</center>
	</form>
</body>
	</html>
<?php
}
?>