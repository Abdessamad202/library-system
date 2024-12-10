import Swal from 'sweetalert2'
function showAlert() {
  Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: 'Your operation completed successfully.'
  });
}
let reservBtn = document.getElementById("reserve");
reservBtn.addEventListener("click", showAlert);