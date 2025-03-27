<html>
<body>
    <h1>Gestione Fatturazione</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";
        $username = "Admin";
        $password = "Admin123!";
        $dbname = "vendite";
    
        // Creazione della connessione al database
        $conn = new mysqli($host, $username, $password, $dbname);
    
        // Controllo della connessione
        if ($conn->connect_error) {
            echo "<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>Connessione al database avvenuta con successo!</p>";
        }
    ?>

    <!-- Form per inviare richieste di visualizzazione delle query -->
    <form action="vendite.php" method="post">
        <input type="submit" name="query_a" value="Articoli fatturati 2021 per categoria">
        <input type="submit" name="query_b" value="Fatture clienti Lombardia">
        <input type="submit" name="query_c" value="Articoli 80-350€ con clienti">
        <input type="submit" name="query_d" value="Articoli venduti +5 pezzi">
        <input type="submit" name="query_e" value="Articoli venduti a Natale">
        <input type="submit" name="query_f" value="Articoli venduti per cliente e città">
        <input type="submit" name="query_g" value="Media prezzi clienti Lazio">
    </form>

<?php
    // Query a: Articoli fatturati 2021 per categoria
    if (isset($_POST['query_a'])) {
        $result = $conn->query("SELECT a.descrizione AS articolo, c.descrizione AS categoria
                              FROM articoli a
                              JOIN categoria c ON a.id_categoria = c.ID_categoria
                              JOIN dettagli d ON a.ID_articolo = d.id_articolo
                              JOIN fatture f ON d.id_fattura = f.ID_fatture
                              WHERE YEAR(f.data) = 2021
                              ORDER BY c.descrizione");
        
        echo "<h2>Articoli fatturati nel 2021 per categoria</h2>";
        echo "<table border='1'><tr><th>Articolo</th><th>Categoria</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['articolo']."</td><td>".$row['categoria']."</td></tr>";
        }
        echo "</table>";
    }
    
    // Query b: Fatture clienti Lombardia
    elseif (isset($_POST['query_b'])) {
        $result = $conn->query("SELECT f.num_fattura, f.data, f.importo, cl.nome AS cliente
                              FROM fatture f
                              JOIN clienti cl ON f.id_cliente = cl.ID_clienti
                              JOIN citta ci ON cl.id_citta = ci.ID_citta
                              WHERE ci.regione = 'Lombardia'");
        
        echo "<h2>Fatture emesse per clienti della Lombardia</h2>";
        echo "<table border='1'><tr><th>Numero Fattura</th><th>Data</th><th>Importo</th><th>Cliente</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['num_fattura']."</td><td>".$row['data']."</td><td>".$row['importo']."</td><td>".$row['cliente']."</td></tr>";
        }
        echo "</table>";
    }
    
    // Query c: Articoli 80-350€ con clienti (corretta)
    elseif (isset($_POST['query_c'])) {
        $result = $conn->query("SELECT a.descrizione AS articolo, cl.nome AS cliente, f.data
                            FROM articoli a
                            LEFT JOIN dettagli d ON a.ID_articolo = d.id_articolo
                            LEFT JOIN fatture f ON d.id_fattura = f.ID_fatture
                            LEFT JOIN clienti cl ON f.id_cliente = cl.ID_clienti
                            WHERE a.prezzo_unitario BETWEEN 80 AND 350
                            ORDER BY a.descrizione");
        
        echo "<h2>Articoli 80-350€ con clienti e date di vendita</h2>";
        echo "<table border='1'><tr><th>Articolo</th><th>Cliente</th><th>Data Vendita</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['articolo']."</td><td>".($row['cliente'] ?? "-")."</td><td>".($row['data'] ?? "Mai venduto")."</td></tr>";
        }
        echo "</table>";
        echo "<p>Spiegazione: Smartphone: 500€ → Escluso (fuori range) <br> Maglietta: 20€ → Escluso (troppo economica) <br> Pasta: 1.50€ → Escluso (troppo economica</p>";
    }

    // Query d: Articoli venduti +5 pezzi (corretta)
    elseif (isset($_POST['query_d'])) {
        $result = $conn->query("SELECT a.descrizione, a.prezzo_unitario, SUM(d.quantita) AS quantita_totale
                            FROM articoli a
                            JOIN dettagli d ON a.ID_articolo = d.id_articolo
                            JOIN fatture f ON d.id_fattura = f.ID_fatture
                            GROUP BY a.ID_articolo, f.id_cliente
                            HAVING quantita_totale > 5");
        
        echo "<h2>Articoli venduti in più di 5 pezzi allo stesso cliente</h2>";
        echo "<table border='1'><tr><th>Articolo</th><th>Prezzo Unitario</th><th>Quantità Totale</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['descrizione']."</td><td>".$row['prezzo_unitario']."€</td><td>".$row['quantita_totale']."</td></tr>";
        }
        echo "</table>";
        echo "Spiegazione: - Nessun articolo è stato venduto in più di 5 pezzi allo stesso cliente.";
    }

// Query e: Articoli venduti a Natale (corretta)
elseif (isset($_POST['query_e'])) {
    $result = $conn->query("SELECT SUM(d.quantita) AS totale_articoli
                          FROM dettagli d
                          JOIN fatture f ON d.id_fattura = f.ID_fatture
                          WHERE MONTH(f.data) = 12 AND DAY(f.data) BETWEEN 20 AND 31");
    $row = $result->fetch_assoc();
    $totale = $row['totale_articoli'] ?? 0;
    
    echo "<h2>Articoli venduti nel periodo natalizio</h2>";
    echo "<p>Totale articoli venduti tra il 20 e il 31 dicembre: <strong>".$totale."</strong></p>";
}
    
    // Query f: Articoli venduti per cliente e città
    elseif (isset($_POST['query_f'])) {
        $result = $conn->query("SELECT cl.nome AS cliente, ci.nome AS citta, SUM(d.quantita) AS totale_articoli
                              FROM clienti cl
                              JOIN citta ci ON cl.id_citta = ci.ID_citta
                              JOIN fatture f ON cl.ID_clienti = f.id_cliente
                              JOIN dettagli d ON f.ID_fatture = d.id_fattura
                              GROUP BY cl.ID_clienti, ci.ID_citta");
        
        echo "<h2>Articoli venduti per cliente e città di residenza</h2>";
        echo "<table border='1'><tr><th>Cliente</th><th>Città</th><th>Totale Articoli</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['cliente']."</td><td>".$row['citta']."</td><td>".$row['totale_articoli']."</td></tr>";
        }
        echo "</table>";
    }
    
    // Query g: Media prezzi clienti Lazio
    elseif (isset($_POST['query_g'])) {
        $result = $conn->query("SELECT AVG(a.prezzo_unitario) AS media_prezzo
                              FROM articoli a
                              JOIN dettagli d ON a.ID_articolo = d.id_articolo
                              JOIN fatture f ON d.id_fattura = f.ID_fatture
                              JOIN clienti cl ON f.id_cliente = cl.ID_clienti
                              JOIN citta ci ON cl.id_citta = ci.ID_citta
                              WHERE ci.regione = 'Lazio'");
        $row = $result->fetch_assoc();
        
        echo "<h2>Media del prezzo unitario degli articoli venduti ai clienti del Lazio</h2>";
        echo "<p>Media prezzo: <strong>".number_format($row['media_prezzo'], 2)."€</strong></p>";
    }
?>

<!-- Collegamenti ad altre pagine -->
<p><a href="../index.php">Torna all'indice</a></p>
<?php include '../footer.php'; ?>
</body>
</html>