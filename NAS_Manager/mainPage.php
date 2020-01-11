<!DOCTYPE html>
<html>
<head>
	<title>mainPage</title>
	<meta http-equiv="Content-Type" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mainCss.css"/>
</head>
<body>
	  <div id="jb-container">
	    <div id="jb-header">
           <h1>Auto window</h1>
					 <button onclick="location.href='php/userAccount/logOut.php'">Logout</button>
      </div>
      <div id="jb-content">
          <h2>Content</h2>
          <span onclick="location.href='explain.html'">설명서</span>
          <div class="dropdown">
            <span>개발팀 정보
              <li onclick="location.href='#'">프로젝트 요약</li>
              <li onclick="location.href='#'">개발팀 소개</li>
            </span>
          </div>
      </div>
      <div id="jb-sidebar">
        <h2>Controller Select</h2>
        <button class="btn" onclick="location.href='php/AutoSystemController.php'"> 자동화 설정 </button>
        <button class="btn" onclick="location.href='php/passiveController.php'"> 모니터링 </button>
        <button class="btn" onclick="location.href='php/SecurityManagement.php'"> 보안관리 </button>
      </div>
      <div id="jb-footer">
          <p>@Copyright</p>
      </div>
    </div>
</body>
</html>

<?php
  include "functionCall/pageMover.php";
  session_start();

  if($_SESSION['sid'] == NULL)
    goto_caution("비정상적인 접근입니다!!", "loginPage.html");

  exec("ps -ef |grep autoBright", $uvStat, $error1);
  exec("ps -ef |grep autoOpen", $rainStat, $error2);

  var_dump($uvStat);
  var_dump($error1);
  print_r($rainStat);
  print_r($error2);
?>

<!--if(strcasecmp($id, $cmp_id) && strcasecmp($id, $cmp_password)){
      echo "<script>location.href='mainPage.php';</script>";
    }
-->
