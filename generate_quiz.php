<?php
require 'config.php';
$input = json_decode(file_get_contents('php://input'),true);
$topic = $input['topic'];

$wiki=@file_get_contents("https://en.wikipedia.org/api/rest_v1/page/summary/".urlencode($topic));

$prompt="Create 5 MCQs on '$topic'. Use this context:\n$wiki
Return ONLY JSON with question, options, correctIndex, explanation.";

$data=[
 'model'=>'gpt-4o-mini',
 'messages'=>[['role'=>'user','content'=>$prompt]],
 'response_format' => ['type' => 'json_object']
];

$ch=curl_init(OPENAI_API_URL);
curl_setopt_array($ch,[
 CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.OPENAI_API_KEY],
 CURLOPT_POST=>true,
 CURLOPT_POSTFIELDS=>json_encode($data),
 CURLOPT_RETURNTRANSFER=>true
]);
$res=curl_exec($ch);

header("Content-Type: application/json");
echo json_decode($res,true)['choices'][0]['message']['content'];