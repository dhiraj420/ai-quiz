<!DOCTYPE html>
<html>
<head>
  <title>AI Quiz Builder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="container py-4">

<h2>AI-Powered Knowledge Quiz Builder</h2>
<a href="history.php">View Quiz History</a><br><br>

<input type="text" id="topic" class="form-control mb-2" placeholder="Enter topic">
<button id="generateBtn" class="btn btn-primary mb-3">Generate Quiz</button>
<button id="resetBtn" class="btn btn-secondary mb-3">Reset</button>

<form id="quizForm" style="display:none;">
  <div id="quizContainer"></div>
  <input type="hidden" id="topicResp">
  <button type="submit" class="btn btn-success">Submit Quiz</button>
</form>

<div id="result" tabindex='1' class="mt-4"></div>

<script src="quiz.js"></script>
</body>
</html>