// Select the login button
// Import Bootstrap's JavaScript


const loginButton = document.querySelector('.login-button');

// Add mouseover event
loginButton.addEventListener('mouseover', () => {
  // Add the "change" class to both <i> and <span> elements
  loginButton.querySelector("i").classList.add("change");
  loginButton.querySelector("span").classList.add("change");
});

// Add mouseout event
loginButton.addEventListener('mouseout', () => {
  // Remove the "change" class from both <i> and <span> elements
  loginButton.querySelector("i").classList.remove("change");
  loginButton.querySelector("span").classList.remove("change");
});
let icon = document.querySelector(".form-floating #icon")
let passwordField = document.querySelector(".form-floating .password")
// passwordField.setAttribute("type","text")
// console.log(icon);

icon.onclick = () => {
  if (passwordField.getAttribute("type")=="password") {
    passwordField.setAttribute("type","text")
    icon.setAttribute("class","fa-solid fa-eye-slash")
  }else{
    passwordField.setAttribute("type","password")
    icon.setAttribute("class","fa-solid fa-eye")
  }
  passwordField.focus()
}
