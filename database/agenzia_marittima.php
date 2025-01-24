<html>

<body>
    <h1>Gestione Film e Proiezioni</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";        // Host del database (di solito 'localhost')
        $username = "Admin";       // Nome utente del database
        $password = "Admin123!";   // Password del database
        $dbname = "agenzia_marittima";  // Nome del database da utilizzare
    
        // Creazione della connessione al database
        $conn = new mysqli($host, $username, $password, $dbname);
    
        // Controllo della connessione
        if ($conn->connect_error) {
            // Mostra un messaggio di errore se la connessione fallisce
            echo "<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>";
        } else {
            // Mostra un messaggio di successo se la connessione riesce
            echo "<p style='color: green;'>Connessione al database avvenuta con successo!</p>";
        }
        // La connessione rimane aperta per l'uso successivo
    ?>

    <!-- Form per inviare richieste di visualizzazione delle tabelle -->
    <form action="agenzia_marittima.php" method="post">
        <!-- Pulsanti per ciascuna tabella del database -->
        <input type="submit" name="view_merce" value="Visualizza Merce">
        <input type="submit" name="view_navi" value="Visualizza Navi">
        <input type="submit" name="view_porti" value="Visualizza Porti">
        <input type="submit" name="view_viaggi" value="Visualizza Viaggi">
        <input type="submit" name="view_polizzeDiCarico" value="Visualizza Polizze di Carico">
        <input type="submit" name="view_cliente" value="Visualizza Cliente">
        <input type="submit" name="view_fornitore" value="Visualizza Fornitore">
    </form>

<?php
    // Controlla quale pulsante è stato premuto e visualizza i dati corrispondenti

    // Visualizza la tabella 'merce'
    if (isset($_POST['view_merce'])) {
        $result = $conn->query("SELECT * FROM merce");
        echo "<h2>Merce</h2><table border='1'><tr><th>ID_Merce</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Merce'] . "</td>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'navi'
    elseif (isset($_POST['view_navi'])) {
        $result = $conn->query("SELECT * FROM navi");
        echo "<h2>Navi</h2><table border='1'><tr><th>Bandiera</th><th>Nome_Capitano</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Bandiera'] . "</td><td>" . $row['Nome_Capitano'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'porti'
    elseif (isset($_POST['view_porti'])) {
        $result = $conn->query("SELECT * FROM porti");
        echo "<h2>Porti</h2><table border='1'><tr><th>ID Porti</th><th>Porto Partenza</th><th>Porto Arrivo</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Porti'] . "</td><td>" . $row['Porto_Partenza'] . "</td><td>" . $row['Porto_Arrivo'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'viaggi'
    elseif (isset($_POST['view_viaggi'])) {
        $result = $conn->query("SELECT * FROM viaggi");
        echo "<h2>Viaggi</h2><table border='1'><tr><th>Sigla</th><th>Data Partenza</th><th>Data Arrivo</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Sigla'] . "</td><td>" . $row['Data_Partenza'] . "</td><td>" . $row['Data_Arrivo'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'polizze_di_carico'
    elseif (isset($_POST['view_polizzeDiCarico'])) {
        $result = $conn->query("SELECT * FROM polizze_di_carico");
        echo "<h2>Polizze Di Carico </h2><table border='1'><tr><th>Codice Alfa Numerico</th><th>Tipo Merce</th><th>Tipo Colli</th><th>Numero Colli</th><th>Peso Totale</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Codice_Alfanumerico'] . "</td><td>" . $row['Tipo_Merce'] . "</td><td>" . $row['Tipo_Colli'] . "</td><td>" . $row['Numero_Colli'] . "</td><td>" . $row['Peso_Totale'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'cliente'
    elseif (isset($_POST['view_cliente'])) {
        $result = $conn->query("SELECT * FROM cliente");
        echo "<h2>Cliente</h2><table border='1'><tr><th>ID Cliente</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Cliente'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'fornitore'
    elseif (isset($_POST['view_fornitore'])) {
        $result = $conn->query("SELECT * FROM fornitore");
        echo "<h2>Fornitore</h2><table border='1'><tr><th>ID_Fornitore</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Fornitore'] . "</td></tr>";
        }
        echo "</table>";
    }
    // La connessione al database rimane aperta per eventuali operazioni successive
?>

<!-- Collegamenti ad altre pagine -->
<p>Clicca sul link qui sotto per andare alla pagina di inserimento dati:</p>
<a href="insert_data.php">Pagina di inserimento dati</a>

<p>Clicca sul link qui sotto per tornare alla home page:</p>
<a href="../index.php">Torna all'indice</a>

</body>
</html>
