<html>
<head>
    <title>Esercizio B</title>
</head>
<body>
    <h1>Buongiorno/Buonasera/Buonanotte</h1>


    <?php
    // Descrizione del funzionamento del codice 
    // Funzionamento del codice:
    // La variabile $nome è definita come 'Paolo'.
    // Viene recuperata l'ora attuale con date('H') per determinare il saluto:
    // - 'Buongiorno' se l'ora è tra 8 e 12,
    // - 'Buonasera' se l'ora è tra 12 e 20,
    // - 'Buonanotte' se l'ora è tra 20 e 8.
    // Viene analizzato l'User-Agent dell'utente per determinare il browser utilizzato (Chrome, Firefox, Safari, Edge o 'Browser sconosciuto').
    // Infine, viene mostrato il saluto, il nome e il tipo di browser.
    // Un pulsante permette di tornare alla pagina principale index.html.

    ?>

<?php
// Definisci la variabile con il nome
$nome = "Paolo";

// Ottieni l'ora attuale
$ora = date("H");

// Determina il saluto in base all'ora
if ($ora >= 8 && $ora < 12) {
    $saluto = "Buongiorno";
} elseif ($ora >= 12 && $ora < 20) {
    $saluto = "Buonasera";
} else {
    $saluto = "Buonanotte";
}

// Ottieni il tipo di browser dell'utente
$userBrowser = $_SERVER['HTTP_USER_AGENT'];

// Determina il nome del browser
if (strpos($userBrowser, 'Chrome') !== false) {
    $browser = 'Google Chrome';
} elseif (strpos($userBrowser, 'Firefox') !== false) {
    $browser = 'Firefox';
} elseif (strpos($userBrowser, 'Safari') !== false) {
    $browser = 'Safari';
} elseif (strpos($userBrowser, 'Edge') !== false) {
    $browser = 'Edge';
} else {
    $browser = 'Browser sconosciuto';
}

// Mostra il messaggio
echo "<p><strong>OUTPUT:</strong></p>";
echo "$saluto $nome,<br>";
echo "benvenuto nella mia prima pagina PHP.<br>";
echo "Stai utilizzando il browser: $browser.";
?>

<p><button onclick="window.location.href='index.php';">Torna all'indice</button></p>
<?php include 'footer.php'; ?>

</body>
</html>