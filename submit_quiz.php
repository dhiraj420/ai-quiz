<?php
require 'config.php';
$input = json_decode(file_get_contents('php://input'),true);
$quiz = $input['quizData'];
$score = $input['count'];
$topic = $input['topic'];

$stmt=$conn->prepare("INSERT INTO quiz_results(topic,score) VALUES(?,?)");
$stmt->bind_param("si",$topic,$score);
$stmt->execute();

$html="<h2>Score: $score / 5</h2><hr>";
echo json_encode(['html'=>$html]);