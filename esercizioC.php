<html>
<head>
    <title>Esercizio C</title>
</head>
<body>
    <h1>Tabella Pitagorica</h1>


    <?php
    // Descrizione del funzionamento del codice 
    echo "<p><strong>Funzionamento del codice:</strong></p>";
    echo "<ul>";
    echo "<li>Il codice inizializza un ciclo esterno che gestisce le righe di ciascun triangolo.</li>";
    echo "<li>Per il triangolo (a), il ciclo esterno va da 1 a 10, aumentando il numero di asterischi di riga in riga.</li>";
    echo "<li>Un ciclo interno stampa gli asterischi per ciascuna riga, con il numero di asterischi che aumenta progressivamente.</li>";
    echo "<li>Nel triangolo (b), il ciclo esterno va da 10 a 1, diminuendo il numero di asterischi di riga in riga.</li>";
    echo "<li>Per i triangoli specchiati (c e d), prima viene stampato un numero di spazi per allineare gli asterischi a destra.</li>";
    echo "<li>Nel triangolo (c), gli asterischi decrescono e gli spazi aumentano da sinistra a destra.</li>";
    echo "<li>Nel triangolo (d), gli asterischi crescono e gli spazi diminuiscono da sinistra a destra.</li>";
    echo "<li>Alla fine di ciascun ciclo esterno, il codice esegue <code>echo '<br>'</code> per andare a capo e iniziare la riga successiva.</li>";
    echo "</ul>";
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

<p><button onclick="window.location.href='index.html';">Torna all'indice</button></p>
<?php include 'footer.php'; ?>
</body>
</html>