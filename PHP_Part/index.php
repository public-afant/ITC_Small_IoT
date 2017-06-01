<?php
function GetPercent($val,$total)
{
    if($val)
    {
        return ($val/$total)*100;
    }else
    {
        return 0;
    }
}
$nowString = exec("date");

$cputmp = 0;
$cputmp = exec("cat /sys/class/thermal/thermal_zone0/temp"); 
$cputmp1 = $cputmp/1000;
$cputmp2 = $cputmp/100;
$cputmpM = $cputmp2 % $cputmp1;
$cputmpString = "<div>CPU temp = ".$cputmp1. $cputmpM ."°C</div>"; 
$diskInfo =exec("df -h |grep /dev/root");
$diskTemp = str_replace("       "," ",$diskInfo);
$diskTemp1 = str_replace("  "," ",$diskTemp);
$diskArray = explode(" ",$diskTemp1);

$nowDiskString = "<div>Disk : ".$diskArray[1]." | Used : ".$diskArray[2]." | Use% : ".$diskArray[4]." </div>";

exec("cat /proc/meminfo", $memory, $error);
$memTotal = sprintf('%.1f',trim($memory[0],"MemTotal: kB")/1024);
$memFree = sprintf('%.1f',trim($memory[1],"MemFree: kB")/1024);
$memPer = sprintf('%.1f',GetPercent($memFree,$memTotal));

$nowMemString = "<div>FreeMemory = ". $memPer."%  <br>Free/Total = ". $memFree."Mb / ".$memTotal."Mb</div>";
?>


<!DOCTYPE HTML> 
<html>
	<head>
		<meta charset="UTF-8">
		<title>RASPBERRY PI</title>
		<meta http-equiv="Content-Type" content="text/html;charset=euc-kr;">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, 
		maximum-scale=1.0,minimum-scale=1.0,width=device-width">
		
		<style>
			div {font-family:Tahoma;}
			.f12 { font-size:17px; margin-bottom:15px;} 
		</style>

	</head> 

<body>
<div style="border:1px solid #CCC; padding:20px 10px;">
	<div class="f12"> 
		<?php echo $nowString; ?>
	</div>
--------------------------------------------------- 
	<div class="f12"> Home Humi/Temp = 
		<?php system("sudo python /home/pi/Desktop/Temp/Project/Start_Up/Ctll.py");?>
		°C
	</div>
--------------------------------------------------- 
	<div class="f12">
		<?php echo $cputmpString; ?>
	</div>
--------------------------------------------------- 
	<div class="f12">
		<?php
		echo $nowDiskString;
/*foreach ($diskoutput as $dp){
echo "<div class=\"f12\">".$dp ."</div>";
}*/ ?>
	</div>
	
---------------------------------------------------
	<div class="f12"> <?php
		echo $nowMemString; ?>
	</div>
---------------------------------------------------
	<div class="f12"> 
	<input type="button" name="Web Cam" height= 300px width= 700px value="Web Cam" 
	onclick="location.href='http://wh9721.iptime.org:8090'">
	</div>	
---------------------------------------------------
	<div class="f12"> 
	<input type="button" name="RGB OFF" height= 300px width= 700px value="RGB OFF" 
	onclick="location.href='./ledoff.php'">
	<input type="button" name="RGB RED" height= 300px width= 700px value="RGB RED" 
	onclick="location.href='./ledredon.php'">
	<input type="button" name="RGB GREEN" height= 300px width= 700px value="RGB GREEN" 
	onclick="location.href='./ledgreenon.php'">
	<input type="button" name="RGB BLUE" height= 300px width= 700px value="RGB BLUE" 
	onclick="location.href='./ledblueon.php'">
	</div>	
---------------------------------------------------
	
</div> 
</body> 
</html>