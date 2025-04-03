function trovaLibri(query, callback) {  // da notare che la query è il valore del contenuto della searchbar
    // Creiamo la richiesta AJAX
    console.log(query);
    query = query.replace(/ /g, "-");
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `home/ricerca/${query}`, true);  //nell url GET inserisce il valore di quanto inserito nella navbar
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Se la risposta è corretta (status 200), processa i dati JSON
            const books = JSON.parse(xhr.responseText);
            const img = document.createElement('img');
            callback(books);
        }
    };
    xhr.send();
}
