<?php
define('OPENAI_API_KEY', ''); //need to put your key
define('OPENAI_API_URL','https://api.openai.com/v1/chat/completions');

$conn=new mysqli('localhost', 'root', '', 'quiz_app');