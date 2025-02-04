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

        // Populate form fields if the button has the "update" class
        if (btn.classList.contains("update")) {
            modal.querySelector('#BookTitle').value = btn.getAttribute('data-title');
            modal.querySelector('#BookAuthor').value = btn.getAttribute('data-author');
            modal.querySelector('#BookDescription').value = btn.getAttribute('data-description');
            modal.querySelector('#BookDate').value = btn.getAttribute('data-date-edition');
            modal.querySelector('#BookStock').value = btn.getAttribute('data-stock');
            modal.querySelector('#BookCover').value = ""; // File inputs can't be pre-filled

            // Set the selected category
            const categoryId = btn.getAttribute('data-category-id');
            const categorySelect = modal.querySelector('#CategorySelect');
            if (categorySelect) {
                categorySelect.value = categoryId; // Set the selected option
            }

            // Update the form action
            modal.querySelector('form').setAttribute('action', btn.getAttribute('data-action'));
        } else {
            // Reset form fields for a new book
            modal.querySelector('#BookTitle').value = "";
            modal.querySelector('#BookAuthor').value = "";
            modal.querySelector('#BookDescription').value = "";
            modal.querySelector('#BookDate').value = "";
            modal.querySelector('#BookStock').value = "";
            modal.querySelector('#BookCover').value = "";

            // Reset the category dropdown
            const categorySelect = modal.querySelector('#CategorySelect');
            if (categorySelect) {
                categorySelect.value = ""; // Reset to the default option
            }
        }
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