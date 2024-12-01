<?php
// Avvia la sessione per accedere ai dati di sessione dell'utente (come ad esempio lo stato di login)
session_start();

// Controllo se l'utente è loggato o meno
// La variabile di sessione 'logged_in' viene impostata su true quando l'utente effettua correttamente il login
// Se 'logged_in' non è impostata o non è uguale a true, significa che l'utente non è autenticato
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Se l'utente non è loggato, lo reindirizzo alla pagina di login
    // Il comando header() invia una risposta HTTP al browser, dicendo di caricare la pagina login.php
    header("Location: login.php"); 
    
    // Una volta che il reindirizzamento è stato inviato, eseguo il comando exit() per interrompere l'esecuzione del codice
    // Questo è fondamentale per evitare che l'utente acceda comunque al contenuto della pagina protetta
    exit;
}

// Se l'utente è loggato, il codice continua e l'accesso alla pagina protetta sarà permesso
?>
