let booksItems = document.querySelectorAll('.books-item');
    let booksArray = [...booksItems];
    const bookContainer = document.querySelector('.books');
    const inputField = document.querySelector('#default-search');
    inputField.oninput = (e) => {
        e.target.value != '' ? document.querySelector('.glasses').classList.add('hide') : document.querySelector('.glasses').classList.remove('hide');
        bookContainer.innerHTML = '';
        let booksSearched = booksArray.filter((book) => {
            return book.querySelector('.book-title').textContent
                .toLowerCase()
                .startsWith(e.target.value.toLowerCase());
        });
        if (booksSearched.length == 0) {
            document.querySelector('.not-found').classList.remove('hide');

        }else{
            document.querySelector('.not-found').classList.add('hide');
            booksSearched.forEach((book) => {
                bookContainer.appendChild(book);
            })
        }
    }