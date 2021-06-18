<!-- search.html 수정해야합니다.
<p>배출 방법이 궁금한 품목을 검색해보면 배출 방법을 알려드립니다.</p>
                        
                        <form action="search_result.php" method="post">
                        <div class="search">
                          <input type="text" name="keyword" placeholder="검색어를 입력해주세요.">
                        </div>
                        <div class="ml-lg-auto col-lg-5 col-12">
                            <input type="submit" class="form-control submit-btn" 
                                  name="search_btn" value="search">
                          </div>
                        </form>
                    </div> -->

<?php
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['keyword']);
      $query ="SELECT * FROM trashListTBL WHERE trashName like '%" . $aKeyword[0] . "%'";
     
     for($i = 1; $i < count($aKeyword); $i++) {
		if(!empty($aKeyword[$i])) {
			$query .= " OR trashName like '%" . $aKeyword[$i] . "%'";
		}
      }
    
     $result = $mysqli->query($query);
     echo "<br>You have searched for keywords: " . $_POST['keyword'];
					
     if(mysqli_num_rows($result) > 0) {
		$row_count=0;
		echo "<br>Result Found: ";
		echo "<br><table border='1'>";
		While($row = $result->fetch_assoc()) {   
			$row_count++;						  
			echo "<tr><td> 연관 ".$row_count." </td><td>쓰레기 종류: ". $row['trashName'] . "</td><td> 버리는 곳: ". $row['dischargePlace'] . "</td></tr>";
		}
		echo "</table>";
    }
    else {
		echo "<br>Result Found: NONE";
    }
}
?>

