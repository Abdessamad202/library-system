<style>
  * {
      box-sizing: border-box;
  }

  /* Button Styles */
  .button {
      background-color: #0075ff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
  }

  .button:hover {
      background-color: #0075ff;
  }

  .button.cancel {
      background-color: #d32f2f;
  }

  .button.cancel:hover {
      background-color: #c62828;
  }

  .button.save {
      background-color: #0075ff;
  }

  .button.save:hover {
      background-color: #0075ff;
  }

  /* Modal Overlay */
  .modal {
      display: none;
      position: fixed;
      z-index: 999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      box-sizing: border-box;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
  }

  /* Modal Content */
  .modal-content {
      background-color: white;
      border-radius: 10px;
      width: 100%;
      max-width: 700px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      animation: fadeIn 0.3s ease-in-out;
  }

  /* Modal Header */
  .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      background-color: #0075ff;
      color: white;
  }

  .modal-header h2 {
      margin: 0;
  }

  .close {
      font-size: 20px;
      width: 30px;
      text-align: center;
      /* display: flex
; */
      height: 30px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
      align-content: center;
  }

  .close:hover {
      background: #d32f2f;
  }

  /* Modal Body */
  .modal-body {
      padding: 20px;
  }

  /* Form Styles */
  .form-group {
      margin-bottom: 15px;
  }

  .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
  }

  .input {
      width: 100%;
      padding: 10px;

      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
  }

  .input:focus {
      outline: none;
      border-color: #0075ff;
  }

  /* Modal Footer */
  .modal-footer {
      padding: 15px;
      text-align: right;
      background-color: #f1f1f1;
  }

  /* Keyframe Animation */
  @keyframes fadeIn {
      from {
          opacity: 0;
          transform: translateY(-20px);
      }

      to {
          opacity: 1;
          transform: translateY(0);
      }
  }
</style>
<div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
    <div class="intro p-20 d-flex space-between bg-eee">
      <div>
        <h2 class="m-0">Welcome</h2>
        <p class="c-grey mt-5">{{auth()->user()->name}}</p>
      </div>
      <img class="hide-mobile" src="../imgs/welcome.png" alt="" />
    </div>
    <img src="../imgs/avatar.png" alt="" class="avatar" />
    <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
      <div>{{auth()->user()->name}}<span class="d-block c-grey fs-14 mt-10">{{auth()->user()->role}}</span></div>
    </div>
    <button style="border: none ; cursor: pointer;" class="openModalBtn visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</button>
  </div>
  <div id="modal" class="modal">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h2>Modify Category</h2>
            <span id="closeModalBtn" class="close">&times;</span>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form id="categoryForm" method='post'>
                @csrf
                <!-- Name Field -->
                <div class="form-group">
                    <label for="BookTitle">Title</label>
                    <input type="text" id="BookTitle" name="title" class="input" rows="4"
                        placeholder="Enter category name" required>
                </div>
                <!-- Description Field -->
                <div class="form-group">
                    <label for="BookCover">Cover</label>
                    <input type="file" name="image" id="BookCover">
                </div>
                <div class="form-group">
                    <label for="BookAuthor">Author</label>
                    <input type="text" id="BookAuthor" name="author" class="input"
                        placeholder="Enter category name" required>
                </div>
                <div class="form-group">
                    <label for="BookAuthor">Edition Date</label>
                    <input type="text" id="BookAuthor" name="date_edition" class="input"
                        placeholder="Enter category name" required>
                </div>
                <div class="form-group">
                    <label for="categoryDescription">Description</label>
                    <textarea id="categoryDescription" name="description" class="input" placeholder="Enter category description"
                        rows="4" required></textarea>
                </div>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button id="closeModalFooterBtn" class="button cancel">Cancel</button>
            <button id="saveChangesBtn" type='submit' class="button save">Save Changes</button>
        </div>
        </form>
    </div>
</div>
<script>
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
                modal.querySelector('#categoryDescription').value = btn.getAttribute(
                'data-description');
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
</script>