let bar = document.querySelector(".fa-bars");
let sidebar = document.querySelector(".sidebar");
let content = document.querySelector(".content");
bar.addEventListener("click", () => {
  sidebar.classList.toggle("active");
  content.classList.toggle("active");
});