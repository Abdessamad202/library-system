document.getElementById('scrollToTop').addEventListener('click', function () {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});
window.addEventListener('scroll', function () {
  const scrollToTopButton = document.getElementById('scrollToTop');
  if (window.scrollY > 300) { // Show the button when scrolled down 300px
    scrollToTopButton.style.opacity = 1;
  } else {
    scrollToTopButton.style.opacity = 0;
  }
});
