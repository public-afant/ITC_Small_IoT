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
	<div class="f12"> RGB ON
		<?php system("sudo python /home/pi/Desktop/Temp/Project/Start_Up/rgb_green.py");?>
	</div>
--------------------------------------------------- 

	<div class="f12"> 
	<input type="button" name="BACK" height= 300px width= 700px value="BACK" 
	onclick="location.href='./index.php'">
	</div>	
	
</div> 
</body> 
</html>