# Architecture & Decisions 
This project is a modular MVP that generates topic-based multiple-choice quizzes using an AI model. The system cleanly separates user input, AI-driven question generation, quiz evaluation, and result presentation to maintain extensibility and clarity. It follows a lightweight client–server architecture, where the frontend captures the topic and renders quiz content, while the backend manages AI interaction and quiz creation. The backend is organized around well-defined service boundaries (AI client, quiz generation, retrieval), and a structured JSON contract is enforced between the AI and application logic to ensure reliable outputs and simplified parsing.

# AI Tools & Reasoning 
I used OpenAI’s GPT-4o-mini for its strong reasoning and cost efficiency. To improve factual accuracy, I implemented a simple retrieval step using Wikipedia summaries, injected into the prompt. This provides RAG-like benefits without introducing additional infrastructure such as vector databases, which keeps the MVP fast and maintainable.

# AI-Powered Knowledge Quiz Builder
- AI-generated quizzes (OpenAI)
- Wikipedia context injection (RAG-lite)
- MySQL persistence
- Quiz history page

# Mysql Setup Steps
- CREATE DATABASE quiz_app;
- CREATE TABLE quiz_results (
  id INT AUTO_INCREMENT PRIMARY KEY,
  topic VARCHAR(255),
  score INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
