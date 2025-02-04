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
  });
});

// openModalBtn.addEventListener('click', openModal);

closeModalBtn.addEventListener('click', closeModal);
closeModalFooterBtn.addEventListener('click', closeModal);
window.addEventListener('click', (event) => {
  if (event.target === modal) {
    closeModal();
  }
});