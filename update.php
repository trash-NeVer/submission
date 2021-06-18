<?php
   $con=mysqli_connect("localhost", "root", "password", "neverdb") or die("MySQL 접속 실패 !!");
   $sql ="SELECT * FROM userTBL WHERE userID='".$_GET['userID']."'";

   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['userID']." 아이디의 회원이 없음!!!"."<br>";
		   echo "<br> <a href='mypage.html'> <--돌아가기</a> ";
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 조회 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<br> <a href=''> <--돌아가기</a> ";
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   
   $userPassword = $row["userPassword"];
   
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 회원 정보 수정 </h1>
<FORM METHOD="post"  ACTION="update_result.php">
	비밀번호 : <INPUT TYPE ="text" NAME="userPassword" VALUE=<?php echo $userPassword ?> READONLY> <br>
	<BR><BR>
	<INPUT TYPE="submit"  VALUE="정보 수정">
</FORM>

</BODY>
</HTML>