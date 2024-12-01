<?php
session_start(); // Avvia la sessione, necessaria per interagire con le variabili di sessione.

// Distrugge tutte le variabili di sessione (dentro l'array $_SESSION).
$_SESSION = array(); 

// Se c'è un cookie associato alla sessione, lo cancella. Questo passaggio rimuove il cookie di sessione dal browser.
// Viene fatto per evitare che la sessione rimanga attiva nel browser.
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 43200, '/'); // Imposta il cookie di sessione con un tempo di scadenza nel passato, per distruggerlo.
}

// Distrugge la sessione stessa (in modo che l'utente non possa più accedere ai dati di sessione).
session_destroy(); 

// Dopo aver distrutto la sessione, l'utente viene reindirizzato alla pagina di login per effettuare nuovamente il login.
// La funzione header() invia un'intestazione HTTP di tipo Location, che indica al browser di caricare la pagina "login.php".
header("Location: login.php");

// L'istruzione exit() impedisce l'esecuzione di qualsiasi codice ulteriore, garantendo che l'utente venga reindirizzato correttamente.
exit;
?>
