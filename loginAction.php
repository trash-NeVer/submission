<?php include "database.php"; ?>
<?php session_start(); ?>

<?php
    if(isset($_POST['userID']) && isset($_POST['userPassword'])) {
        $userID = $_POST['userID'];
        $userPassword = $_POST['userPassword'];
        
        $query = "SELECT * FROM `userTBL` WHERE userID='$userID' and userPassword='$userPassword'";
        
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $count = mysqli_num_rows($result);
        
        if ($count == 1) {
            $_SESSION['userID'] = $userID;
        }
        else {
              $fmsg = "정보가 일치하지 않습니다!";;
        }
    }
    
    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
        echo "안녕하세요" .$userID. "";
        
        header("Location: index.php");
    }
    
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

