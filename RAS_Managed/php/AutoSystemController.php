<!DOCTYPE html>
<html>
<head>
	<title>AutoSystemController</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/subCss.css"/>
  <script src="../js/statFunc.js" type="text/javascript" language="javascript"></script>
</head>
<body>
  <div id="auto-container">
	  <div id="auto-header">
      <h1>Auto Control Setting</h1>
    </div>
    <div id="auto-contents">
      <h3> 자외선 차단 </h3>
   	  <form action="AutoSystemController.php" method="post" accept-charset="utf-8">
  		  <input type="submit" name="autosetOpacityOn" value="투명 자동화 ON" onclick="switchColor('btn1')">
  		  <input type="submit" name="autosetOpacityOff" value="투명 자동화 OFF" onclick="switchColor('btn2')">
   	  </form>
      <h3> 빗물 차단 </h3>
      <form action="AutoSystemController.php" method="post" accept-charset="utf-8">
        <input type="submit" name="autosetOpenOn" value="창문 개폐 자동화 ON" onclick="switchColor('btn3')">
        <input type="submit" name="autosetOpenOff" value="창문 개폐 자동화 OFF" onclick="switchColor('btn4')">
      </form>
    </div>
    <div id="auto-sidebar">
      <table>
        <thead>
          <tr>
            <th colspan="3" id="thead"> Currently AutoSystem Status </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tbodyTd">AUTO UV BLOCK</td>
            <td class="tbodyTd">AUTO RAIN BLOCK</td>
          </tr>
          <tr>
            <td id="auto-uvStat">Stopped</td>
            <td id="auto-rainStat">Stopped</td>
          </tr>
        </tbody>
      </table><br/><br/>
      <a href="../mainPage.php"><button type="button" class="btn btn-primary"> Go Home </button></a>
    </div>
    <div id="auto-footer">
      Copy Right@
    </div>
  </div>
  <?php
    if ($_POST["autosetOpacityOn"]) {
      exec("sudo ./autoMode/autoBright", $autoOpacity, $error1);
    }
    if ($_POST["autosetOpacityOff"]){
      exec("sudo pkill autoBright", $autoOpacity, $error2);
    }
    if ($_POST["autosetOpenOn"]) {
      exec("sudo ./autoMode/autoOpen", $autoOpen, $error2);
    }
    if ($_POST["autosetOpenOff"]) {
      exec("sudo pkill autoOpen", $autoOpen, $error2);
    }

  ?>
</body>
</html>
