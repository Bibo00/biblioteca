<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header con Lunghezza Fissa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?=asset ?>/css/homeStyle.css">
    <style>
        /* Contenitore della barra di ricerca */
        .search-container {
            position: relative;
            width: 700px; /* Barra di ricerca più lunga */
            display: flex;
            align-items: center;
        }
        /* Stile del dropdown */
        .dropdown-container {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 250px;
            overflow-y: auto;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
            display: none; /* Inizialmente nascosto */
            border-top: none; /* Per attaccarlo alla barra */
        }

        /* Stile delle opzioni */
        .dropdown-option {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .dropdown-option:hover {
            background-color: #f0f0f0;
        }

        /* Stile per l'immagine della copertina */
        .dropdown-option img {
            width: 150px;
            height: 200px;
            margin-right: 10px;
            border-radius: 5px;
        }

        /* Testo informativo dei libri */
        .info-libro {
            display: flex;
            flex-direction: column;
        }

        .info-libro h1 {
            font-size: 16px;
            margin: 0;
        }

        .info-libro h3 {
            font-size: 14px;
            color: gray;
            margin: 0;
        }
    </style>
</head>
<body>

    <header>
        <img class="head" id="mattei" src="<?=asset ?>/images/mattei.png" alt="Logo">
        
        <!-- Contenitore barra di ricerca -->
        <div class="search-container">
            <input type="text" id="search-bar" placeholder="Cerca...">
            <div id="dropdown-container" class="dropdown-container"></div>
        </div>
        
        <div class="icons-container">
            <a href="notifiche.HTML">
                <img class="head" src="<?=asset ?>/images/BELL.png" id="campanella" alt="Notifiche">
            </a>
            <a href="account.HTML">
                <img src="<?=asset ?>/images/PROFILO.png" id="account" alt="Account">
            </a>
        </div>
    </header>

    <main class="main-content">
        <aside class="sidebar">
            <a href="home.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/HOME.png" class="menu-icon">
                    <p>Home</p>
                </div>
            </a>
            <a href="catalogo.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/CATALOGO.jpg" class="menu-icon">
                    <p>Catalogo</p>
                </div>
            </a>
            <a href="prestiti.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/PRESTITI.png" class="menu-icon">
                    <p>Prestiti</p>
                </div>
            </a>
            <a href="utenti.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/UTENTI.png" class="menu-icon">
                    <p>Utenti</p>
                </div>
            </a>
        </aside>
        <h1>Contenuto principale</h1>
        <p>Questo è il contenuto principale della pagina.</p>
    </main>

    <footer class="footer"></footer>

    <script>
        /*function trovaLibri(query, callback) {
            // Simuliamo una ricerca AJAX (puoi sostituirla con una chiamata reale al server)
            const libriSimulati = [
                { Titolo: "Il Signore degli Anelli", Descrizione: "Un epico racconto di avventure fantasy", Copertina: "https://via.placeholder.com/50x70" },
                { Titolo: "Harry Potter", Descrizione: "Le avventure di un giovane mago", Copertina: "https://via.placeholder.com/50x70" },
                { Titolo: "Il Piccolo Principe", Descrizione: "Una fiaba filosofica e poetica", Copertina: "https://via.placeholder.com/50x70" },
            ];

            const results = libriSimulati.filter(book => book.Titolo.toLowerCase().includes(query.toLowerCase()));
            callback(results);
        }*/

        document.getElementById('search-bar').addEventListener('input', function() {
            const query = this.value;
            //console.log(query);
            const dropdownContainer = document.getElementById('dropdown-container');
            dropdownContainer.innerHTML = "";

            if (query.length >= 2) {
                trovaLibri(query, function(books) {
                    if (books.length > 0) {
                        dropdownContainer.style.display = 'block';

                        books.forEach(book => {
                            const divOption = document.createElement('div');
                            divOption.classList.add('dropdown-option');
                            divOption.innerHTML = `
                                <img src="data:image/png;base64,${book.Copertina}" alt="${book.Titolo}">
                                <div class="info-libro">
                                    <h1>${book.Titolo}</h1>
                                    <h3>${book.Descrizione}</h3>
                                </div>
                            `;

                            divOption.addEventListener('click', () => {
                                document.getElementById('search-bar').value = book.Titolo;
                                dropdownContainer.innerHTML = "";
                                dropdownContainer.style.display = 'none';
                            });

                            dropdownContainer.appendChild(divOption);
                        });
                    } else {
                        dropdownContainer.style.display = 'none';
                    }
                });
            } else {
                dropdownContainer.style.display = 'none';
            }
        });

        document.addEventListener('click', (event) => {
            const dropdownContainer = document.getElementById('dropdown-container');
            if (!dropdownContainer.contains(event.target) && event.target !== document.getElementById('search-bar')) {
                dropdownContainer.innerHTML = "";
                dropdownContainer.style.display = 'none';
            }
        });
    </script>
    <script src="<?=asset ?>/js/ajax.js"></script>
</body>
</html>
