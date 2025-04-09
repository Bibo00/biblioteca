<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN MATTEI</title>
    <style>
        /* Contenitore principale */
        body {
            font-family: Calibri, sans-serif;
        }

        #container {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid black;
            border-radius: 15px; /* Arrotonda i bordi */
        }

        #rigasotto {
            margin: 0 auto;
        }
        .input-group {
            margin: 0 auto;
        }
        .emailEpassw {
            display: inline-block;
        }
        #Emaildiv {
            margin-right: 30px;
        }
        /* Titolo e immagine */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px; /* Aumenta la larghezza dell'immagine a 100px */
            margin-right: 15px;
        }

        /* Nuovo stile per il titolo (p al posto di h1) */
        .header p {
            font-size: 22px; 
            margin: 0;
        }

        label {
            display: block;
        }

        /* Form e input */
        .form-container {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 10px;
            margin: 10px 0;
        }
        .blocchisotto {
            display: inline-block;
            margin-top: 20px;
        }
        /* Bottone registrati (in basso a sinistra) */
        #btn-registrati {
            align-self: flex-start;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Bottone accedi (in basso a destra) */
        #btn-accedi {
            align-self: flex-end;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        /* Effetti hover per i bottoni */
        #btn-registrati:hover {
            background-color: #4CAF50;
            transform: scale(1.1);
        }

        #btn-accedi:hover {
            background-color: #008CBA;
            transform: scale(1.1);
        }

        /* Link password dimenticata (al centro) */
        #password-link {
            text-align: center;
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
</head>
<body>

<div id="container">
    <!-- Header con immagine e titolo -->
    <div class="header">
        <img src="immagini/mattei.png" alt="Logo">
        <p>Biblioteca IIS E.Mattei - Login</p>
    </div>

    <!-- Form di login -->
    <form class="form-container" action="registra.php" method="POST" onsubmit="return validateForm()">
        <!-- Campo email -->
        <div class="input-group">
            <div class="emailEpassw" id="Emaildiv">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Inserisci la tua email" >
            </div>
            <div class="emailEpassw">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Inserisci la tua password" >
            </div>
        </div>

        <div id="rigasotto">
            <button type="button" id="btn-registrati" class="blocchisotto" onclick="">Registrati</button>

            <div class="blocchisotto" id="password-link">
                <a href="#">Password dimenticata?</a>
            </div>

            <button type="submit" id="btn-accedi" class="blocchisotto">Accedi</button>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Regex per validazione email (contiene almeno una @ e un . con caratteri prima e dopo)
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        // Regex per validazione password (almeno 10 caratteri, 1 maiuscolo, 1 numero, 1 carattere speciale)
        var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;

        // Verifica email
        if (!emailRegex.test(email)) {
            alert("L'email non è valida. Deve contenere una @ e un punto con almeno 2 caratteri dopo il punto.");
            return false;
        }

        // Verifica password
        if (!passwordRegex.test(password)) {
            alert("La password deve essere lunga almeno 10 caratteri e contenere una lettera maiuscola, un numero e un carattere speciale.");
            return false;
        }

        return true; // Se entrambe le verifiche passano, invia il form
    }
</script>

</body>
</html>