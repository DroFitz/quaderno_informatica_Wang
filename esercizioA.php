<html>
<head>
    <title>Esercizio A</title>
</head>
<body>
    <h1>Tabella Pitagorica</h1>
     
    <?php
    // Descrizione del funzionamento del codice 
    // Funzionamento del codice:
    // Il codice inizializza la variabile $number a 1.
    // Un ciclo esterno crea 10 righe della tabella (for ($row = 1; $row <= 10; $row++)).
    // Un ciclo interno crea 10 celle per ogni riga (for ($col = 1; $col <= 10; $col++)), stampando il valore corrente di $number.
    // Ogni volta che una cella è stampata, il valore di $number viene incrementato di 1.
    // Alla fine della tabella, viene generato un pulsante per tornare alla pagina principale index.html.

    ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <?php
        $number = 1; // Inizializzazione del contatore che va da 1 a 100
        echo "<p><strong>OUTPUT:</strong></p>";
        // Ciclo esterno: genera le righe della tabella
        for ($row = 1; $row <= 10; $row++) {
            echo "<tr>"; // Inizio di una nuova riga
            
            // Ciclo interno: genera le celle per ogni riga
            for ($col = 1; $col <= 10; $col++) {
                echo "<td>$number</td>"; // Stampa il valore corrente di $number nella cella
                $number++; // Incrementa il numero per la prossima cella
            }
            
            echo "</tr>"; // Fine della riga
        }
        ?>
    </table>
    
    <p><button onclick="window.location.href='index.php';">Torna all'indice</button></p>
    <?php include 'footer.php'; ?>
</body>
</html>
