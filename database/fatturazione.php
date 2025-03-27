<html>
<body>
    <h1>Gestione Fatture e Articoli</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";         // Host del database
        $username = "Admin";         // Nome utente per l'accesso al database
        $password = "Admin123!";     // Password per l'accesso al database
        $dbname = "fatturazione";    // Nome del database
    
        // Creazione della connessione al database
        $conn = new mysqli($host, $username, $password, $dbname);
    
        // Controllo della connessione
        if ($conn->connect_error) {
            // Mostra messaggio di errore in rosso se la connessione fallisce
            echo "<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>";
        } else {
            // Mostra messaggio di successo in verde se la connessione riesce
            echo "<p style='color: green;'>Connessione al database avvenuta con successo!</p>";
        }
    ?>

    <!-- Form per inviare richieste di visualizzazione -->
    <!-- Ogni pulsante invia una richiesta POST diversa in base al pulsante cliccato -->
    <form action="fatturazione.php" method="post">
        <input type="submit" name="query1" value="Articoli fattura nr. 2">
        <input type="submit" name="query2" value="Fatture cliente Rossi">
        <input type="submit" name="query3" value="Articoli venduti a Roma">
        <input type="submit" name="query4" value="Fatture per prodotto">
        <input type="submit" name="query5" value="Fatture non pagate >400€">
        <input type="submit" name="query6" value="Articoli venduti a Rossi e Gialli">
        <input type="submit" name="query7" value="Articoli >200€ venduti a Napoli">
        <input type="submit" name="query8" value="Fatture pagate da privati Roma">
    </form>

<?php
    // Query 1: Elencare tutti gli articoli venduti nella fattura nr. 2
    if (isset($_POST['query1'])) {
        // Esegue la query per selezionare gli articoli della fattura F2023002
        $result = $conn->query("
            SELECT a.* 
            FROM articoli a
            JOIN fatture f ON a.id_fattura = f.ID_fattura
            WHERE f.numero = 'F2023002'
        ");
        
        // Se ci sono risultati, crea una tabella HTML per visualizzarli
        if ($result->num_rows > 0) {
            echo "<h2>Articoli venduti nella fattura nr. 2</h2><table border='1'>
                <tr><th>ID</th><th>Descrizione</th><th>Prezzo</th><th>Importo</th><th>Evaso</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_articolo']."</td><td>".$row['descrizione']."</td>
                      <td>".$row['prezzo_unitario']."</td><td>".$row['importo']."</td>
                      <td>".($row['evaso'] ? 'Sì' : 'No')."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessun articolo trovato nella fattura nr. 2</p>";
        }
    }
    
    // Query 2: Elencare tutte le fatture del cliente Rossi
    elseif (isset($_POST['query2'])) {
        // Esegue la query per selezionare le fatture del cliente con ragione sociale contenente "Rossi"
        $result = $conn->query("
            SELECT f.* 
            FROM fatture f
            JOIN clienti c ON f.id_cliente = c.ID_cliente
            WHERE c.ragione_sociale LIKE '%Rossi%'
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Fatture del cliente Rossi</h2><table border='1'>
                <tr><th>ID</th><th>Numero</th><th>Data</th><th>Pagata</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_fattura']."</td><td>".$row['numero']."</td>
                      <td>".$row['data']."</td><td>".($row['pagata'] ? 'Sì' : 'No')."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessuna fattura trovata per il cliente Rossi</p>";
        }
    }
    
    // Query 3: Elencare tutti gli articoli venduti a clienti che abitano a Roma
    elseif (isset($_POST['query3'])) {
        // Esegue la query per selezionare gli articoli venduti a clienti con città = Roma
        $result = $conn->query("
            SELECT a.* 
            FROM articoli a
            JOIN fatture f ON a.id_fattura = f.ID_fattura
            JOIN clienti c ON f.id_cliente = c.ID_cliente
            WHERE c.citta = 'Roma'
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Articoli venduti a clienti di Roma</h2><table border='1'>
                <tr><th>ID</th><th>Descrizione</th><th>Prezzo</th><th>Importo</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_articolo']."</td><td>".$row['descrizione']."</td>
                      <td>".$row['prezzo_unitario']."</td><td>".$row['importo']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessun articolo venduto a clienti di Roma</p>";
        }
    }
    
    // Query 4: Elencare il numero e la data delle fatture per ciascun prodotto
    elseif (isset($_POST['query4'])) {
        // Esegue la query per selezionare le fatture ordinate per descrizione prodotto
        $result = $conn->query("
            SELECT a.descrizione, f.numero, f.data
            FROM articoli a
            JOIN fatture f ON a.id_fattura = f.ID_fattura
            ORDER BY a.descrizione
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Fatture per prodotto</h2><table border='1'>
                <tr><th>Prodotto</th><th>Numero fattura</th><th>Data fattura</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['descrizione']."</td><td>".$row['numero']."</td>
                      <td>".$row['data']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessun risultato trovato</p>";
        }
    }
    
    // Query 5: Elencare tutte le fatture non pagate di importo superiore a € 400
    elseif (isset($_POST['query5'])) {
        // Esegue la query per selezionare le fatture non pagate con totale > 400€
        $result = $conn->query("
            SELECT f.*, SUM(a.importo) as totale
            FROM fatture f
            JOIN articoli a ON f.ID_fattura = a.id_fattura
            WHERE f.pagata = FALSE
            GROUP BY f.ID_fattura
            HAVING totale > 400
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Fatture non pagate >400€</h2><table border='1'>
                <tr><th>ID</th><th>Numero</th><th>Data</th><th>Totale</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_fattura']."</td><td>".$row['numero']."</td>
                      <td>".$row['data']."</td><td>".$row['totale']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessuna fattura non pagata con importo superiore a 400€</p>";
        }
    }
    
    // Query 6: Elencare tutti gli articoli venduti ai clienti Rossi e Gialli
    elseif (isset($_POST['query6'])) {
        // Esegue la query per selezionare gli articoli venduti a clienti con ragione sociale contenente "Rossi" o "Gialli"
        $result = $conn->query("
            SELECT a.* 
            FROM articoli a
            JOIN fatture f ON a.id_fattura = f.ID_fattura
            JOIN clienti c ON f.id_cliente = c.ID_cliente
            WHERE c.ragione_sociale LIKE '%Rossi%' OR c.ragione_sociale LIKE '%Gialli%'
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Articoli venduti a Rossi e Gialli</h2><table border='1'>
                <tr><th>ID</th><th>Descrizione</th><th>Prezzo</th><th>Importo</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_articolo']."</td><td>".$row['descrizione']."</td>
                      <td>".$row['prezzo_unitario']."</td><td>".$row['importo']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessun articolo venduto a Rossi e Gialli</p>";
        }
    }
    
    // Query 7: Elencare gli articoli di costo superiore a € 200 venduti a Napoli lo scorso anno
    elseif (isset($_POST['query7'])) {
        // Esegue la query per selezionare articoli >200€ venduti a Napoli nell'anno precedente
        $result = $conn->query("
            SELECT a.* 
            FROM articoli a
            JOIN fatture f ON a.id_fattura = f.ID_fattura
            JOIN clienti c ON f.id_cliente = c.ID_cliente
            WHERE a.prezzo_unitario > 200 
            AND c.citta = 'Napoli'
            AND YEAR(f.data) = YEAR(CURRENT_DATE) - 1
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Articoli >200€ venduti a Napoli lo scorso anno</h2><table border='1'>
                <tr><th>ID</th><th>Descrizione</th><th>Prezzo</th><th>Importo</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_articolo']."</td><td>".$row['descrizione']."</td>
                      <td>".$row['prezzo_unitario']."</td><td>".$row['importo']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessun articolo >200€ venduto a Napoli lo scorso anno</p>";
        }
    }
    
    // Query 8: Elencare tutte le fatture pagate da cittadini privati di Roma negli ultimi tre anni
    elseif (isset($_POST['query8'])) {
        // Esegue la query per selezionare fatture pagate da privati (cod_fiscale not null) di Roma negli ultimi 3 anni
        $result = $conn->query("
            SELECT f.* 
            FROM fatture f
            JOIN clienti c ON f.id_cliente = c.ID_cliente
            WHERE f.pagata = TRUE
            AND c.citta = 'Roma'
            AND c.cod_fiscale IS NOT NULL
            AND f.data >= DATE_SUB(CURRENT_DATE, INTERVAL 3 YEAR)
        ");
        
        if ($result->num_rows > 0) {
            echo "<h2>Fatture pagate da privati di Roma (ultimi 3 anni)</h2><table border='1'>
                <tr><th>ID</th><th>Numero</th><th>Data</th><th>Cliente</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['ID_fattura']."</td><td>".$row['numero']."</td>
                      <td>".$row['data']."</td><td>".$row['id_cliente']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessuna fattura pagata da privati di Roma negli ultimi 3 anni</p>";
        }
    }
?>

<!-- Collegamenti ad altre pagine -->
<p><a href="../index.php">Torna all'indice</a></p>
<?php include '../footer.php'; ?>
</body>
</html>