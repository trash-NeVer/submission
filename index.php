 <?php include "database.php"; ?>

<?php
	//Get the total questions
	$query="select * from quiz";
	//Get Results
	$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Quiz</title>
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1>분리수거 퀴즈</h1>
	</div>
      </header>


      <main>
      <div class="container">
        <h2>퀴즈를 풀어 포인트를 얻어봅시다!</h2>
	<ul>
		<li><strong>Number of Questions: </strong><?php echo $total; ?></ul>
		<li><strong>Type: </strong>Multiple Choice</ul>
		<li><strong>Estimatd Time: </strong><?php echo $total*0.5; ?> minutes</ul>
	</ul>
	<a href="question.php?n=1" class="start">Start Quiz</a>
      </div>
    </div>
    </main>


    <footer>
      <div class="container">
      	   Copyright &copy; trashnever
      </div>
    </footer>
  </body>
</html>