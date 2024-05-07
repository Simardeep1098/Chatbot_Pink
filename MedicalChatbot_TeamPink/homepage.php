<!DOCTYPE html>
<html>              
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" href="homepage.css">
</head> 
<?php include ('h.php'); ?> 
<!--including header -->
<body> 
<div style="padding-top: 11px;"></div>
<div id="imageContainer">
<div id="welcomeToChatbot">
	<img src="homeImages/1.jpg" height="800px" width="1519px" usemap="#welcomeToChatbot-imageMap">
	<map name="welcomeToChatbot-imageMap">
    <area alt="registration" title="registration" href="registration.php" coords="183,515,189,506,468,504,474,512,474,566,470,571,453,573,193,571,186,570,182,562" shape="poly">
	</map>
</div>
<div id="whatIsOurChatbot">
	<img src="homeImages/2.jpg" height="800px" width="1519px">
</div>
<div id="loginCTA">
	<img src="homeImages/3.jpg" height="798px" width="1519px" usemap="#loginCTA-imageMap">
	<map name="loginCTA-imageMap">
    <area alt="login" title="login" href="login.php" coords="263,407,265,396,276,396,540,395,552,394,553,406,553,455,551,463,533,463,276,463,267,463,261,454" shape="poly">
	</map>
</div>
<div id="benefitsOfChatbot">
<img src="homeImages/4.jpg" height="800px" width="1519px">	
</div>
<div id="howChatbotWorks">
	<img src="homeImages/5.jpg" height="1100px" width="1519px">
</div>
<div id="team">
	<img src="homeImages/6.jpg" height="960px" width="1519px">
</div>
<div id="video">
	<img src="homeImages/7.jpg" height="800px" width="1519px">
</div>
<div id="registrationCTA">
	<img src="homeImages/8.jpg" height="800px" width="1519px" usemap="#registrationCTA-imageMap">
	<map name="registrationCTA-imageMap">
    <area alt="registration" title="registration" href="registration.php" coords="185,469,474,536" shape="rect">
	</map>
</div>
</div>

<?php include ('footer.php'); ?> 
<!--including footer -->

</body>
</html>