<?php
   $con=mysqli_connect("localhost", "root", "1234", "sqlDB") or die("MySQL 접속 실패 !!");


   $userPassword = $_POST["userPassword"];

   
   $sql ="UPDATE userTBL SET userPassword='".$userPassword."';
   
   $ret = mysqli_query($con, $sql);
 
    echo "<h1> 회원 정보 수정 결과 </h1>";
   if($ret) {
	   echo "데이터가 성공적으로 수정됨.";
   }
   else {
	   echo "데이터 수정 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   echo "<br> <a href='mypage.html'> <--돌아가기</a> ";
?>
