<?php
  if ($_POST['message'] != "") {
    $f = fopen("message.txt", "a");
    fwrite($f, htmlspecialchars($_POST['message']) . "\n");
    fclose($f);
	$condition = 'success';
	$result = 'file_output_success';
  }else{
	$condition = 'miss';
	$result = 'file_output_miss';
  }
  header('Location: http://www18.atpages.jp/hirokisato1988/learning_php/post_message.php?condition=' . $condition . '&result=' . $result);
?>
