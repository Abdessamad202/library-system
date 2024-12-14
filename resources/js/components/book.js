// ==========================================================================
// Date
// ==========================================================================
const minDate = new Date(); // Current date and time
const maxDate = new Date(minDate); // Clone the current date
maxDate.setDate(minDate.getDate() + 7); // Add 7 days
const dateInput = document.getElementById("date_emprunt");
// dateInput.value = todayDate;
console.log(minDate, maxDate);

dateInput.setAttribute("min", minDate.toISOString().split('T')[0]);
dateInput.setAttribute("max", maxDate.toISOString().split('T')[0]);
dateInput.onchange = (e) => {
    if (e.target.value >= e.target.getAttribute("max")) {
        e.target.value = e.target.getAttribute("max");
    }else if (e.target.value <= e.target.getAttribute("min")) {
        e.target.value = e.target.getAttribute("min");
    }
}
// ==========================================================================
// Time
// ==========================================================================
const timeSelect = document.getElementById("hour_emprunt");
for (let i = 8; i < 18; i++) {
    for (let j = 0; j <=30; j=j+30) {
        const option = document.createElement("option");
        option.value = `${i < 10 ? `0${i}` : i}:${j == 0 ? `00` : j}`;
        option.textContent = `${i < 10 ? `0${i}` : i}:${j == 0 ? `00` : j}`;
        timeSelect.appendChild(option);
    }
}
// ==========================================================================
let reservBtn = document.getElementById("confirmReservation");
// fetch request post
console.log(reservBtn.getAttribute('data-token'));

reservBtn.addEventListener("click", (e) => {
    let bookId = e.target.getAttribute("data-book-id");
    let dateEmprunt = document.getElementById("date_emprunt").value;
    let timeEmprunt = document.getElementById("hour_emprunt").value;

    let formData = JSON.stringify({
        book_id: bookId,
        date_emprunt: dateEmprunt,
        hour_emprunt: timeEmprunt
    })

    fetch('/reserve', {
        headers: {
            'X-CSRF-TOKEN': e.target.getAttribute('data-token'),
            'Content-Type': 'application/json'
        },
        method: 'POST',
        body: formData
    })
        .then(response =>  response.json())
        .then(data => {
            if(data.success) {
                showAlert("success",data.message);
            }else{
                showAlert('error', data.message);
            }
            console.log(data);
        })
        .catch(err => {
            console.log(err);
        });
});
//sweetalert code
import swal from 'sweetalert2';
function showAlert(state, message) {

    swal.fire({
        icon: `${state}`,
        title: `${message}`,
        // showConfirmButton: false,
        // timer: 1500
    })
}
