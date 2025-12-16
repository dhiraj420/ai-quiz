# AI-Powered Knowledge Quiz Builder

- AI-generated quizzes (OpenAI)
- Wikipedia context injection (RAG-lite)
- MySQL persistence
- Quiz history page

# Mysql Setup
- CREATE DATABASE quiz_app;
- CREATE TABLE quiz_results (
  id INT AUTO_INCREMENT PRIMARY KEY,
  topic VARCHAR(255),
  score INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
