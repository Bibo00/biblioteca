<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=asset ?>/css/bookStyle.css">
        <title>Document</title>
    </head>
    <body>
        <header>
            <img class="head" id="mattei" src="<?=asset ?>/images/mattei.png" alt="Logo">
            <input class="head" type="text" id="search-bar" placeholder="Cerca..." list="suggerimenti">
            <datalist id="suggerimenti">    </datalist>
            <div class="icons-container">
                <a href="notifiche.HTML">
                    <img class="head" src="<?=asset ?>/images/BELL.png" id="campanella" alt="Notifiche">
                </a>
                <a href="account.HTML">
                    <img src="<?=asset ?>/images/PROFILO.png" id="account" alt="Account">
                </a>
            </div>
        </header>


        <aside class="sidebar">
            <a href="home.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/HOME.png" class="menu-icon" >
                    <p>Home</p>
                </div>
            </a>
            <a href="catalogo.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/CATALOGO.jpg" class="menu-icon" >
                    <p>Catalogo</p>
                </div>
            </a>
            <a href="prestiti.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/PRESTITI.png" class="menu-icon">
                    <p>Prestiti</p>
                </div>
            </a>
            <a href="preferiti.HTML">
                <div class="menu-item">
                    <img src="<?=asset ?>/images/PREFERITI.jpg" class="menu-icon" >
                    <p>Preferiti</p>
                </div>
            </a>
            <a href="informazioni.HTML">
                <div class="menu-item" id="UltimodivNAVBAR">
                    <img src="<?=asset ?>/images/INFO.png" class="menu-icon" >
                    <p>Informazioni</p>
                </div>
            </a>
        </aside>


        <main class="main-content">
            <div id="riquadro_interno">
                <div id="left_tag">
                </div>
                <div id="right_tag">
                    
                </div>
            </div>
        </main>


        <script src="<?=asset ?>/js/ajax.js"></script>

        <script>
            const divImg = document.getElementById('left_tag');
            const text = document.getElementById('right_tag');
            const query = "<?php echo $_SESSION['IdL'] ?>";

            trovaLibri(query, function(books) {
                books.forEach(book => {
                    divImg.innerHTML = `
                        <img src="data:image/png;base64,${book.Copertina}" alt="${book.Titolo}" class="book-cover"">
                    `;
                    text.innerHTML = `
                        <h1>${book.Titolo} (${book.Anno}) - ${book.Autore}</h1>
                        <p style="height:50%;font-size:20px;">${book.Descrizione}</p>
                        <h1 style="height:10%;">Copie disponibili: ${book.Numero_Copie}</h1>
                        <div id="rigasotto">
                            <a class="anelmain"href="Modifica.php">
                            <input type="button" id="btn-modifica" value="MODIFICA"></a>
                            <a class="anelmain" href="Elimina.php">
                            <input type="button" id="btn-elimina" value="ELIMINA"></a>
                        </div>
                    `;
                });
            });
        </script>
        
    </body>

</html>