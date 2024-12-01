<html>
<head>
    <title>Esercizio C</title>
</head>
<body>
    <h1>Tabella Pitagorica</h1>


    <?php
    // Descrizione del funzionamento del codice
    // Il codice inizializza un ciclo esterno che gestisce le righe di ciascun triangolo.
    // Per il triangolo (a), il ciclo esterno va da 1 a 10, aumentando il numero di asterischi di riga in riga.
    // Un ciclo interno stampa gli asterischi per ciascuna riga, con il numero di asterischi che aumenta progressivamente.
    // Nel triangolo (b), il ciclo esterno va da 10 a 1, diminuendo il numero di asterischi di riga in riga.
    // Per i triangoli specchiati (c e d), prima viene stampato un numero di spazi per allineare gli asterischi a destra.
    // Nel triangolo (c), gli asterischi decrescono e gli spazi aumentano da sinistra a destra.
    // Nel triangolo (d), gli asterischi crescono e gli spazi diminuiscono da sinistra a destra.
    // Alla fine di ciascun ciclo esterno, il codice esegue il comando per andare a capo e iniziare la riga successiva.

    ?>


    <?php
    echo "<p><strong>OUTPUT:</strong></p>";
    // (a) Triangolo con asterischi crescenti
    echo "<h3>(a) Triangolo con asterischi crescenti</h3>";
    for ($i = 1; $i <= 10; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    // (b) Triangolo con asterischi decrescenti
    echo "<h3>(b) Triangolo con asterischi decrescenti</h3>";
    for ($i = 10; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    // (c) Triangolo specchiato con asterischi decrescenti
    echo "<h3>(c) Triangolo specchiato con asterischi decrescenti</h3>";
    for ($i = 10; $i >= 1; $i--) {
        // Spazio prima degli asterischi
        for ($j = 1; $j <= (10 - $i); $j++) {
            echo "&nbsp; ";
        }
        // Asterischi
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    // (d) Triangolo specchiato con asterischi crescenti
    echo "<h3>(d) Triangolo specchiato con asterischi crescenti</h3>";
    for ($i = 1; $i <= 10; $i++) {
        // Spazio prima degli asterischi
        for ($j = 1; $j <= (10 - $i); $j++) {
            echo " &nbsp;";
        }
        // Asterischi
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>

<p><button onclick="window.location.href='index.php';">Torna all'indice</button></p>
<?php include 'footer.php'; ?>
</body>
</html>