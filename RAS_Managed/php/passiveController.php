<!DOCTYPE html>
<html>
<head>
	<title>Window Control</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/subCss.css"/>
</head>
<body>
	<div id="#">
    <div id="auto-header">
      <h1>Window Control Setting</h1>
    </div>  
    <div id="auto-contents">
      <h3>수동 개폐 제어</h3>
    	<form action="passiveController.php" method="post">
  			<input type="submit" name="windowOpen" value="window OPEN">
  			<input type="submit" name="windowClose" value="window CLOSE">
    	</form>
      <h3>수동 투명도 제어</h3>
    	<form action="passiveController.php" method="post">
  			<input type="submit" name="windowOpacityOn" value="OpacityOn">
  			<input type="submit" name="windowOpacityOff" value="OpacityOff">
    	</form>
    </div>
    <div id="auto-sidebar">
      <h3>자동화 모드를 끄고 실행해주세요.</h3>
      <a href="../mainPage.php"><button type="button" class="btn btn-primary"> Go Home </button></a>
    </div>
    <div id="auto-footer">
      Copy Right@
    </div>
  </div> 
    <?php
    	if ($_POST["windowOpen"]) { 
  			exec("sudo ./passiveMode/passiveOpen open", $a, $error);
  		}
    	if ($_POST["windowClose"]) { 
  			exec("sudo ./passiveMode/passiveOpen close", $a, $error);
  		}
    	if ($_POST["windowOpacityOn"]) { 
  			exec("php ./passiveMode/opacityOn.php", $a, $error);
  		}
  		if ($_POST["windowOpacityOff"]) {
  			exec("php ./passiveMode/opacityOff.php");
  		}
    ?>
</body>
</html>
