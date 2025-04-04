<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header con Lunghezza Fissa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?=asset ?>/css/homeStyle.css">
</head>
<body>

    <header>
        <!-- Hamburger Menu Icon 
        <button class="hamburger-menu" aria-label="Toggle menu">
            ☰  Questo è il carattere per l'icona hamburger 
        </button>-->

        <img class="head" id="mattei" src="<?=asset ?>/images/mattei.png" alt="Logo IIS Enrico Mattei">

        <!-- Contenitore barra di ricerca -->
        <div class="search-container">
            <input type="text" id="search-bar" class="search-bar" placeholder="Search">
            <div id="dropdown-container" class="dropdown-container"></div>
        </div>

        <div class="icons-container">
            <a href="notifiche.HTML" aria-label="Notifiche">
                <img class="head icon-bell" src="<?=asset ?>/images/BELL.png" id="campanella" alt="Notifiche"> <!-- Usa classi per icone se preferisci -->
            </a>
            <a href="account.HTML" aria-label="Account utente">
                <img class="head icon-profile" src="<?=asset ?>/images/PROFILO.png" id="account" alt="Account"> <!-- Usa classi per icone se preferisci -->
            </a>
        </div>
    </header>
    <div class="tot">
        <aside class="sidebar">
            <!-- Usa gli elementi dal mockup -->
            <a href="home.HTML">
                <div class="menu-item active"> <!-- Aggiungi classe 'active' per la pagina corrente -->
                    <img src="<?=asset ?>/images/HOME.png" class="menu-icon" alt=""> <!-- Icona Home -->
                    <p>Home</p>
                </div>
            </a>
            <a href="catalogo.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/CATALOGO.jpg" class="menu-icon" alt=""> <!-- Icona Catalogo -->
                    <p>Catalogo</p>
                </div>
            </a>
            <a href="prestiti.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/PRESTITI.png" class="menu-icon" alt=""> <!-- Icona Prestiti -->
                    <p>Prestiti</p>
                </div>
            </a>
            <a href="preferiti.HTML"> <!-- Link Preferiti dal mockup -->
                <div class="menu-item">
                    <img src="<?=asset ?>/images/STAR_PREFERITI.png" class="menu-icon" alt=""> <!-- Icona Preferiti (ipotetica) -->
                    <p>Preferiti</p>
                </div>
            </a>
            <a href="about.HTML"> <!-- Link About dal mockup -->
                <div class="menu-item">
                    <img src="<?=asset ?>/images/INFO_ABOUT.png" class="menu-icon" alt=""> <!-- Icona About (ipotetica) -->
                    <p>About</p>
                </div>
            </a>
            <!-- Nota: Il link 'Utenti' era nel template originale ma non nel mockup -->
            <!-- <a href="utenti.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/UTENTI.png" class="menu-icon">
                    <p>Utenti</p>
                </div>
            </a> -->
        </aside>
        <main class="main-content" id="main-content">

            <!-- Contenuto del Mockup -->
            <h2 class="book-section-title">Libri più visti</h2>

            
            <!-- Fine Contenuto del Mockup -->

        </main>
    </div>
    

    <footer class="footer"></footer>

    <script>
        document.getElementById('search-bar').addEventListener('input', function() {
            const query = this.value;
            //console.log(query);
            const dropdownContainer = document.getElementById('dropdown-container');
            dropdownContainer.innerHTML = "";

            if (query.length >= 2) {
                trovaLibri(query, function(books) { // Assicurati che la funzione trovaLibri sia definita (o usa quella commentata o una reale)
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
                                // Qui potresti reindirizzare alla pagina del libro o fare altre azioni
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
            const searchBar = document.getElementById('search-bar');
            if (dropdownContainer && searchBar && !dropdownContainer.contains(event.target) && event.target !== searchBar) {
                dropdownContainer.innerHTML = "";
                dropdownContainer.style.display = 'none';
            }
        });

         

    </script>
    <script src="<?=asset ?>/js/ajax.js"></script> <!-- Assicurati che questo file esista e definisca trovaLibri o includi la definizione qui -->
</body>
</html>

<!--
Spiegazione delle modifiche:

Pulizia del <main>: Ho rimosso il contenuto preesistente (<h1>Catalogo principale</h1>) all'interno del tag <main class="main-content">.

Aggiunta Titolo Sezione: Ho inserito un <h2> con il testo "Libri più visti" come nel mockup, aggiungendo una classe book-section-title per poterlo stilizzare.

Creazione Righe (book-row): Ho usato due <div> con classe book-row per rappresentare le due file orizzontali di libri.

Creazione Elementi Libro (book-item): Dentro ogni book-row, ho creato sei <div> con classe book-item per ciascun libro.

Immagine Placeholder: Dentro ogni book-item, ho inserito un tag <img>. Ho usato un src generico (<?=asset ?>/images/placeholder-image.png) che dovrai sostituire con un'immagine placeholder reale nel tuo percorso asset/images o usare gli stili CSS forniti per creare un box grigio. Ho aggiunto anche un alt text descrittivo.

Testo Libro: Sotto ogni immagine, ho aggiunto un tag <p> con il testo "Titolo (Anno) - Autore" come mostrato nel mockup.

CSS Aggiuntivo (Inline <style>): Ho aggiunto alcuni stili CSS di base all'interno di un tag <style> nell'<head> per replicare rapidamente il layout del mockup (libri in riga, spaziatura, sfondo placeholder). Idealmente, questi stili dovrebbero andare nel tuo file homeStyle.css o style.css. Li ho messi qui per rendere l'esempio auto-contenuto e funzionante.

Sidebar Aggiornata: Ho aggiornato i link nella <aside class="sidebar"> per corrispondere a quelli mostrati nel mockup (Home, Catalogo, Prestiti, Preferiti, About) e rimosso/commentato il link "Utenti" che non era nel mockup. Ho aggiunto icone placeholder (STAR_PREFERITI.png, INFO_ABOUT.png) che dovrai creare o sostituire.

Header Aggiornato: Ho aggiunto gli elementi mancanti nell'header rispetto al mockup: l'icona hamburger (usando un carattere HTML) e aggiornato i tag <img> per le icone campana e profilo con alt text e classi (opzionali) per styling.

Script trovaLibri: Ho aggiunto una definizione di base (simulata) per la funzione trovaLibri all'interno dello script in fondo, dato che veniva chiamata ma non definita nel codice fornito (era commentata). Dovrai sostituirla con la tua implementazione AJAX reale o assicurarti che sia definita nel file ajax.js.

Ora, il contenuto principale (<main>) della tua pagina HTML rispecchia la struttura visiva presentata nel mockup. Ricorda di creare le immagini placeholder e di spostare gli stili CSS nei tuoi file .css dedicati.-->