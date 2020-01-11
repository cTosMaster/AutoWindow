<?php
      include "../../functionCall/pageMover.php";

      session_cache_expire(6); 
      session_start();
      $conn = mysqli_connect("localhost", "jbs", "1234");
      mysqli_query($conn, 'set names utf8');
      $id = $_POST['id'];
      $passwd = $_POST['password'];

      if(!$conn){
        echo "Unable to Connect to DB : " . mysqli_connect_error();
        exit;
      }
      if(!mysqli_select_db($conn, 'autowindow')){
        echo "Unable to Select mydbName : " . mysqli_connect_error();
        exit;
      }
    
      $result = mysqli_query($conn, 'select * from user_info'); // query 생성
    
      if(!$result){
        echo "Couldn`t successfully run query!!" . mysqli_connect_error();
        exit;
      }
      if(mysqli_num_rows($result) == 0){
        echo "개체가 없다!! record not exist!";
        exit;
      }

      $row = mysqli_fetch_assoc($result); 

      if($id == $row['id']){
        if($passwd == $row['password']){
          $_SESSION['sid'] = session_id();    // session id 만듬
          $_SESSION['userid'] = $id;          // session 변수에 user 집어넣음

          if(isset($_SESSION['userid'])){
            header('Location: ../../mainPage.php');
          }
          else{
            echo "<script>alert('session create Failed!!!\n\n');</script>";
          }
        }
        else
          back_caution("패스워드가 일치하지 않습니다.");
      }
      else{
        back_caution("계정이 존재하지 않습니다!!");
      }

      mysqli_free_result($result);
      mysqli_close($conn);
?>
