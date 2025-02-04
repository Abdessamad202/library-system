const modal = document.getElementById('modal');
const openModalBtns = document.querySelectorAll('.openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const closeModalFooterBtn = document.getElementById('closeModalFooterBtn');
const saveChangesBtn = document.getElementById('saveChangesBtn');
// Function to open modal
function openModal() {
    modal.style.display = 'flex';
}

// Function to close modal
function closeModal() {
    modal.style.display = 'none';
}

// Event listeners
openModalBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        openModal();
        if (btn.classList.contains("update")) {
            modal.querySelector('#categoryName').value = btn.getAttribute('data-name');
            modal.querySelector('#categoryDescription').value = btn.getAttribute('data-description');
        } else {
            modal.querySelector('#categoryName').value = ""
            modal.querySelector('#categoryDescription').value = ""
        }
        modal.querySelector('form').setAttribute('action', btn.getAttribute('data-action'))
        // console.log(e.target.getAttribute('data-id'), modal.querySelector('#categoryName'));

    });
});
// openModalBtn.addEventListener('click', openModal);
closeModalBtn.addEventListener('click', closeModal);
closeModalFooterBtn.addEventListener('click', closeModal);

// Save button event
// saveChangesBtn.addEventListener('click', () => {
//     const name = document.getElementById('categoryName').value;
//     const description = document.getElementById('categoryDescription').value;

//     if (name && description) {
//         console.log('Category Updated:', {
//             name,
//             description
//         });
//         alert('Category updated successfully!');
//         closeModal();
//     } else {
//         alert('Please fill in all fields.');
//     }
// });

// Close modal when clicking outside the content
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});