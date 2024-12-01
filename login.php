<?php
// Inizia una sessione PHP per gestire il login dell'utente
session_start();

// Variabile per memorizzare i messaggi di errore
$error = "";

// Se l'utente è già loggato (verifica la sessione), reindirizza automaticamente alla pagina principale
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php"); // Reindirizza alla pagina index.html se l'utente è già loggato
    exit; // Ferma l'esecuzione del codice dopo il reindirizzamento
}

// Se il metodo di richiesta è POST (cioè il form è stato inviato)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Imposta le credenziali statiche di login (modificabili per un uso reale)
    $username = "admin"; // Username predefinito
    $password = "password123"; // Password predefinita

    // Ottieni i dati inseriti dall'utente nel form
    $user_input = $_POST['username']; // Nome utente inserito nel form
    $pass_input = $_POST['password']; // Password inserita nel form

    // Verifica se le credenziali inserite corrispondono a quelle predefinite
    if ($user_input == $username && $pass_input == $password) {
        // Se le credenziali sono corrette, imposta la variabile di sessione 'logged_in' su true
        $_SESSION['logged_in'] = true;
        header("Location: index.php"); // Reindirizza alla pagina principale index.php dopo il login riuscito
        exit; // Ferma l'esecuzione del codice dopo il reindirizzamento
    } else {
        // Se le credenziali sono errate, memorizza il messaggio di errore da visualizzare
        $error = "Credenziali errate!"; // Messaggio di errore se login fallito
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <!-- Se esiste un errore, mostra il messaggio di errore in rosso -->
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p> <!-- Visualizza il messaggio di errore -->
    <?php endif; ?>

    <!-- Form di login -->
    <form action="login.php" method="POST"> <!-- Il form invia i dati al file login.php tramite metodo POST -->
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Accedi"> <!-- Bottone per inviare il form -->
    </form>
</body>
</html>
