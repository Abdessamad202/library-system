let image = document.querySelector(".img-thumbnail");
let input = document.querySelector("#profilePicture");

input.addEventListener("change", function () {
  image.src = URL.createObjectURL(input.files[0]);
})