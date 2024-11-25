<html>
<head>
    <title>Esercizio B</title>
</head>
<body>
    <h1>Buongiorno/Buonasera/Buonanotte</h1>


    <?php
    // Descrizione del funzionamento del codice 
    echo "<p><strong>Funzionamento del codice:</strong></p>";
    echo "<ul>";
    echo "<li>La variabile <code>\$nome</code> è definita come 'Paolo'.</li>";
    echo "<li>Viene recuperata l'ora attuale con <code>date('H')</code> per determinare il saluto:</li>";
    echo "<ul>";
    echo "<li><code>'Buongiorno'</code> se l'ora è tra 8 e 12,</li>";
    echo "<li><code>'Buonasera'</code> se l'ora è tra 12 e 20,</li>";
    echo "<li><code>'Buonanotte'</code> se l'ora è tra 20 e 8.</li>";
    echo "</ul>";
    echo "<li>Viene analizzato l'User-Agent dell'utente per determinare il browser utilizzato (Chrome, Firefox, Safari, Edge o 'Browser sconosciuto').</li>";
    echo "<li>Infine, viene mostrato il saluto, il nome e il tipo di browser.</li>";
    echo "<li>Un pulsante permette di tornare alla pagina principale <code>index.html</code>.</li>";
    echo "</ul>";
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

<p><button onclick="window.location.href='index.html';">Torna all'indice</button></p>
<?php include 'footer.php'; ?>

</body>
</html>