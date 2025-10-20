// Toggle Dark/Light Mode
const themeToggle = document.getElementById("theme-toggle");
themeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
  if (document.body.classList.contains("dark-mode")) {
    themeToggle.textContent = "☀️ Light Mode";
  } else {
    themeToggle.textContent = "🌙 Dark Mode";
  }
});

// Greeting Button
const greetBtn = document.getElementById("greet-btn");
greetBtn.addEventListener("click", () => {
  alert("Hi there! Welcome to Vanya's website 💖");
});

// Fun Fact Section
const facts = [
  "I love cheese 🧀",
  "I have a cute cat 🐱",
  "I enjoy teaching coding 💻",
  "My favorite hobby is drawing 🎨",
  "I’m learning Go language 🐹",
];

const factBtn = document.getElementById("fact-btn");
const factDisplay = document.getElementById("fact-display");

factBtn.addEventListener("click", () => {
  const randomFact = facts[Math.floor(Math.random() * facts.length)];
  factDisplay.textContent = randomFact;
});
