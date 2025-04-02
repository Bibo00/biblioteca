<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header con Lunghezza Fissa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <img class="head" id="mattei" src="Immagini/mattei.png" alt="Logo">
        <input class="head" type="text" id="search-bar" placeholder="Cerca..." list="suggerimenti">
        <datalist id="suggerimenti">    </datalist>
        <div class="icons-container">
            <a href="notifiche.HTML">
                <img class="head" src="Immagini/BELL.png" id="campanella" alt="Notifiche">
            </a>
            <a href="account.HTML">
                <img src="Immagini/PROFILO.png" id="account" alt="Account">
            </a>
        </div>
    </header>
    

    <aside class="sidebar">
        <a href="home.HTML">
            <div class="menu-item">
                <img src="Immagini/HOME.png" class="menu-icon" >
                <p>Home</p>
            </div>
        </a>
        <a href="catalogo.HTML">
            <div class="menu-item">
                <img src="Immagini/CATALOGO.jpg" class="menu-icon" >
                <p>Catalogo</p>
            </div>
        </a>
        <a href="prestiti.HTML">
            <div class="menu-item">
                <img src="Immagini/PRESTITI.png" class="menu-icon">
                <p>Prestiti</p>
            </div>
        </a>
        <a href="utenti.HTML">
            <div class="menu-item">
                <img src="Immagini/UTENTI.png" class="menu-icon" >
                <p>Utenti</p>
            </div>
        </a>
       
    </aside>

    <main class="main-content">
        <h1>Contenuto principale</h1>
        <p>Questo è il contenuto principale della pagina.</p>
    </main>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Calibri, sans-serif;
        }

        header {
            width: 100%;           /* Larghezza fissa al 100% della pagina */
            height: 120px;         /* Altezza fissa per l'header */
            background-color: #fff1;  /* Colore di sfondo chiaro per l'header */
            display: flex;
            align-items: center;       /* Centra il contenuto verticalmente */
            justify-content: space-between; /* Distribuisce gli elementi orizzontalmente */
            padding: 0 20px; /* Spazio laterale */
            box-sizing: border-box;
            border-bottom: 1px solid #000;  /* Bordo inferiore di 1px */
        }

        .icons-container {
            display: flex;
            align-items: center;
            justify-content: flex-end; /* Allinea le icone a destra */
            gap: 20px; 
        }

        #mattei {
            width: 110px;        /* Larghezza fissa per l'immagine */
            height: 110px;       /* Altezza fissa per l'immagine */
        }

        #search-bar {
            height: 30px;         /* Altezza fissa per la barra di ricerca */
            width: 50%;           /* Larghezza della barra di ricerca */
            font-size: 16px;      /* Imposta la dimensione del font */
            padding: 5px 10px;    /* Padding interno per la barra di ricerca */
            border-radius: 20px;  /* Aggiungi bordi arrotondati */
        }

        .head {
            display: inline-block;
        }

        #campanella, #account {
            width: 70px;
            height: 70px;
        }

        /* Stile per la barra laterale */
        aside.sidebar {
            width: 200px;         /* Imposta la larghezza fissa dell'aside */
            padding: 0;           /* Rimuove il padding per evitare spazi indesiderati */
            position: fixed;      /* Fissa la sidebar al lato della pagina */
            top: 120px;           /* Inizia sotto l'header */
            bottom: 0;
            box-sizing: border-box; /* Assicura che il padding e il bordo non influenzino la larghezza */
            display: flex;        /* Abilita Flexbox */
            flex-direction: column; /* Allinea i div verticalmente */
            border-right: 1px solid black;  /* Aggiunge un bordo nero alla sidebar */
        }

        /* Fai sì che i menu item si estendano in larghezza per tutta la sidebar */
        .menu-item {
            display: flex;                /* Dispone gli elementi orizzontalmente */
            align-items: center;          /* Centra verticalmente gli elementi */
            justify-content: flex-start;  /* Distanza tra l'immagine a sinistra e il testo a destra */
            padding: 20px 20px;           /* Padding interno per i div */
            height: 80px;                 /* Imposta un'altezza fissa per i menu-item */
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box; /* Assicura che il padding non influisca sulla larghezza */
            margin: 0;           /* Rimuove i margini per evitare spazi laterali indesiderati */
        }

        .menu-item:hover {
            background-color: #ccc;
        }

        /* Stile per l'immagine dentro il menu */
        .menu-icon {
            width: 50px;          /* Larghezza fissa per l'immagine */
            height: 50px;         /* Altezza fissa per l'immagine */
            object-fit: contain;  /* Mantiene le proporzioni corrette dell'immagine */
            margin-right: 20px;   /* Spazio tra l'immagine e il testo */
        }

        /* Stile per il contenuto principale */
        main.main-content {
            margin-left: 220px;   /* Spazio per il menu laterale (lascia uno spazio vuoto a sinistra) */
            padding: 20px;
        }
       
    a {
        text-decoration: none;  /* Rimuove la sottolineatura */
        color: inherit;         /* Mantiene il colore del testo originale */
    }


       
    </style>



<script> /*Script ajax per compilare datalist*/

    // Funzione per fare richiesta AJAX al server
    

    // Aggiungi un event listener per l'input dell'utente
    document.getElementById('search-bar').addEventListener('input', function() {
        const query = this.value;  // qui praticamente il valore è quello inserito nella search bar
        if (query.length >= 2) {  // Inizia a cercare solo dopo che l'utente scrive almeno 2 caratteri
            trovaLibri(query, function(books) {
                console.log(books);
                const datalist = document.getElementById('suggerimenti');
                datalist.innerHTML = "";
                for (const book of books) { // Qui hai usato "books", non "libri"
                    const option = document.createElement('option');
                    const img = document.createElement('img');
                    option.value = `${book.Titolo}`;
                    datalist.appendChild(option);
                }
            });
        }
    });
</script>
<script src="<?=ROOT ?>/assets/js/ajax.js"></script>


</body>
</html>