
<?php 
// Include il file check_login.php per verificare se l'utente è loggato 
include('check_login.php'); ?> 

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Quaderno di Informatica</title>
</head>
<body>
    <h1>Indice degli Esercizi</h1>
    
    <ul>
        <li><a href="esercizioA.php">Esercizio A</a></li>
        <li><a href="esercizioB.php">Esercizio B</a></li>
        <li><a href="esercizioC.php">Esercizio C</a></li>
        <li><a href="esercizioD.php">Esercizio D</a></li>
        <li><a href="normalizzazione.php">Normalizzazione</a></li>
        <br>

        <h2>Database</h2>
        <li><a href="database/agenzia_marittima.php">Agenzia Marittima</a></li>
        <li><a href="database/vendite.php">Vendite</a></li>
        <li><a href="database/fatturazione.php">Fatturazione</a></li>
        <li><a href="database/atletica.php">Atletica</a></li>
        <li><a href="database/azienda_commerciale.php">Azienda Commerciale</a></li>
    </ul>

    <!-- Link di logout -->
    <p><a href="logout.php">Logout</a></p>
    <?php include 'footer.php'; ?>
</body>
</html>
