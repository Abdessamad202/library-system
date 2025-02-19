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
    } else if (e.target.value <= e.target.getAttribute("min")) {
        e.target.value = e.target.getAttribute("min");
    }
}
// ==========================================================================
// Time
// ==========================================================================
const timeSelect = document.getElementById("hour_emprunt");
for (let i = 8; i < 18; i++) {
    for (let j = 0; j <= 30; j = j + 30) {
        const option = document.createElement("option");
        option.value = `${i < 10 ? `0${i}` : i}:${j == 0 ? `00` : j}`;
        option.textContent = `${i < 10 ? `0${i}` : i}:${j == 0 ? `00` : j}`;
        timeSelect.appendChild(option);
    }
}
// ==========================================================================
import axios from 'axios';
import swal from 'sweetalert2';

let reservBtn = document.getElementById("confirmReservation");

// Reservation button click event listener
reservBtn.addEventListener("click", (e) => {
    let bookId = e.target.getAttribute("data-book-id");
    let dateEmprunt = document.getElementById("date_emprunt").value;
    let timeEmprunt = document.getElementById("hour_emprunt").value;

    if (!dateEmprunt || !timeEmprunt) {
        showAlert('error', 'Please select a date and time.');
        return;
    }

    const csrfToken = e.target.getAttribute('data-token');
    if (!csrfToken) {
        showAlert('error', 'Missing CSRF token.');
        return;
    }

    let formData = {
        book_id: bookId,
        date_emprunt: dateEmprunt,
        hour_emprunt: timeEmprunt
    };
    console.log(formData);

    reservBtn.disabled = true; // Disable button

    // Axios POST request
    axios.post('/reserve', formData, {
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            reservBtn.disabled = false; // Re-enable button
            const data = response.data;
            if (data.success) {
                showAlert("success", data.message);
                setTimeout(() => {
                    window.location = '/reservation';
                }, 500);
            } else {
                console.log(data);
                showAlert("error", data.message);
            }
        })
        .catch(error => {
            reservBtn.disabled = false; // Re-enable button
            showAlert("error", "An error occurred. Please try again later.");
            console.error(error);
        });
});

// SweetAlert2 code
function showAlert(state, message) {
    swal.fire({
        icon: state,
        title: state === 'success' ? 'Reservation Confirmed!' : 'Error',
        text: message,
        showConfirmButton: true,
        confirmButtonText: 'OK',
        timer: state === 'success' ? 2000 : undefined
    });
}

const editCommentModal = document.getElementById('editCommentModal')
if (editCommentModal) {
    editCommentModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const comment = button.getAttribute('data-comment')
        const action = button.getAttribute('data-action')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalTitle = editCommentModal.querySelector('.modal-title')
        const modalBodyInput = editCommentModal.querySelector('.modal-body textarea')
        const form = editCommentModal.querySelector('form')
        form.action = action
        modalBodyInput.value = comment
    })
}
let likeBtn = document.querySelector(".like-btn");

likeBtn.addEventListener("click", (e) => {
    // Get the book ID and CSRF token
    let bookId = e.target.getAttribute("data-book-id");
    let csrfToken = document.querySelector("meta[name='csrf-token']").content;

    // Send an AJAX POST request to toggle the like
    axios.post(`/like/${bookId}`, {}, {
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(response => {
            const data = response.data;

            if (data.success) {
                // Update the like count
                likeBtn.querySelector(".like-count").textContent = data.count;

                // Toggle the "liked" class to change the button's appearance
                likeBtn.classList.toggle("liked");

                // Update the title attribute to reflect the current state
                likeBtn.setAttribute("title", data.is_liked ? "Unlike" : "Like");
            } else {
                console.log("Error:", data.message);
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
});
