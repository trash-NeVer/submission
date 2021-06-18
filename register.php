<?php
    
if (isset($_POST['register_btn'])) {
        $userID =$_POST['userID'];
        $userPassword = $_POST['userPassword'];
        
        switch ($_POST['institution']) {
            case 1: $officeName == "서울특별시"; break;
            case 2: $officeName == "인천광역시"; break;
            case 3: $officeName == "대구광역시"; break;
            case 4: $officeName == "부산광역시"; break;
        }
        
//        $sql = "INSERT INTO userTBL(userID, userPassword, addedPoint, userPoint)"
//                . "VALUES('$userID', '$userPassword', NULL, NULL)";
//                mysqli_query($mysqli, $sql);
        //        $sql2 = "INSERT INTO userGiftTBL(userID, officeName, gift)"
//                . "VALUES('$userID', '$userPassword', '$officeName', NULL)";
        //mysqli_query($mysqli, $sql2);
        
        $dsn = 'mysql:dbname=neverdb;host=localhost';
        try {
            $dbh = new PDO($dsn, 'root', 'root_password');
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        
        $stmt = $dbh->prepare("CALL  p_register('$userID', '$userPassword', 0, 0, '$userID', '$officeName', 'undifined')");
  
        $_SESSION['message'] = "회원가입 되었습니다";
        $_SESSION['userID'] = $userID;
        $_SESSION['institution'] = $officeName;
        header("location: mypage.html");
}
