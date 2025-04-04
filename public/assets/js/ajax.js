function trovaLibri(query, callback) {
    query = query.replace(/ /g, "-");
    fetch(`home/ricerca/${query}`)
        .then(response => {
            if(!response.ok) throw new Error(`Errore ${response.status}`);
            return response.json();
        })
        .then(callback)
        .catch(onError);
}


function findAll(callback, onError = console.error) {
    fetch('home/findAll')
        .then(response => {
            if (!response.ok) throw new Error(`Errore ${response.status}`);
            return response.json();
        })
        .then(callback)
        .catch(onError);
}

function renderBooks(books) {
    const main = document.getElementById('main-content');
    if (!main || books.length === 0) return;

    let bookRow = document.createElement('div');
    bookRow.classList.add('book-row');

    books.forEach((book, i) => {
        if (i % 6 === 0 && i !== 0) {
            main.appendChild(bookRow);
            bookRow = document.createElement('div');
            bookRow.classList.add('book-row');
        }

        const bookItem = document.createElement('div');
        bookItem.classList.add('book-item');
        bookItem.id = book.IdL;
        bookItem.innerHTML = `
            <img src="data:image/png;base64,${book.Copertina}" alt="${book.Titolo}">
            <p>${book.Titolo} (${book.Anno}) - ${book.Autore}</p>
        `;

        bookRow.appendChild(bookItem);
    });

    if (bookRow.children.length > 0) {
        main.appendChild(bookRow);
    }
}

window.addEventListener('load', () => {
    findAll(renderBooks);
});
