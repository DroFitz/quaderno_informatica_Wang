
<body>
    <h1>Gestione Azienda Commerciale</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";        // Host del database (di solito 'localhost')
        $username = "Admin";         // Nome utente del database
        $password = "Admin123!";             // Password del database
        $dbname = "azienda_commerciale";  // Nome del database
    
        // Creazione della connessione
        $conn = new mysqli($host, $username, $password, $dbname);
    
        // Controllo della connessione
        if ($conn->connect_error) {
            // Mostra un messaggio di errore in caso di connessione fallita
            echo "<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>";
        } else {
            // Mostra un messaggio di successo in caso di connessione riuscita
            echo "<p style='color: green;'>Connessione al database avvenuta con successo!</p>";
        }
    
        // Chiusura della connessione
        //$conn->close();
        ?>

    <form action="azienda_commerciale.php" method="post">
        <input type="submit" name="view_categorie" value="Visualizza Categorie">
        <input type="submit" name="view_clienti" value="Visualizza Clienti">
        <input type="submit" name="view_fornitori" value="Visualizza Fornitori">
	    <input type="submit" name="view_ordini" value="Visualizza Ordini">
	    <input type="submit" name="view_prodotti" value="Visualizza Prodotti">
	    <input type="submit" name="view_dettagli_ordini" value="Visualizza Dettagli_Ordini">

    </form>

   

    <?php
    if (isset($_POST['view_categorie'])) {
        $result = $conn->query("SELECT * FROM Categorie");
        echo "<h2>Categorie</h2><table border='1'><tr><th>id_categoria</th><th>Descrizione</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_categoria'] . "</td><td>" . $row['descrizione'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_fornitori'])) {
        $result = $conn->query("SELECT * FROM Fornitori");
        echo "<h2>Fornitori</h2><table border='1'><tr><th>ID Fornitore</th><th>Ragione Sociale</th><th>Indirizzo</th><th>Città</th><th>CAP</th><th>Provincia</th><th>Telefono</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_fornitore'] . "</td><td>" . $row['ragione_sociale'] . "</td><td>" . $row['indirizzo'] . "</td><td>" . $row['città'] . "</td><td>" . $row['cap'] . "</td><td>" . $row['provincia'] . "</td><td>" . $row['n_telefono'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_clienti'])) {
        $result = $conn->query("SELECT * FROM Clienti");
        echo "<h2>Clienti</h2><table border='1'><tr><th>ID Cliente</th><th>Ragione Sociale</th><th>Indirizzo</th><th>Città</th><th>CAP</th><th>Provincia</th><th>Telefono</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_cliente'] . "</td><td>" . $row['ragione_sociale'] . "</td><td>" . $row['indirizzo'] . "</td><td>" . $row['città'] . "</td><td>" . $row['cap'] . "</td><td>" . $row['provincia'] . "</td><td>" . $row['n_telefono'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_ordini'])) {
        $result = $conn->query("SELECT * FROM Ordini");
        echo "<h2>Ordini</h2><table border='1'><tr><th>ID Ordine</th><th>Data Ricezione</th><th>Data Evasione</th><th>ID Cliente</th><th>Spese Trasporto</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_ordine'] . "</td><td>" . $row['data_ricezione'] . "</td><td>" . $row['data_evasione'] . "</td><td>" . $row['id_cliente'] . "</td><td>" . $row['spese_trasporto'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_prodotti'])) {
        $result = $conn->query("SELECT * FROM Prodotti");
        echo "<h2>Prodotti</h2><table border='1'><tr><th>ID Prodotto</th><th>Nome Prodotto</th><th>Categoria</th><th>Fornitore</th><th>Prezzo Acquisto</th><th>Prezzo Vendita</th><th>Giacenza</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_prodotto'] . "</td><td>" . $row['nome_prodotto'] . "</td><td>" . $row['id_categoria'] . "</td><td>" . $row['id_fornitore'] . "</td><td>" . $row['prezzo_acquisto'] . "</td><td>" . $row['prezzo_vendita'] . "</td><td>" . $row['giacenza'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_dettagli_ordini'])) {
        $result = $conn->query("SELECT * FROM Dettagli_Ordini");
        echo "<h2>Dettagli Ordini</h2><table border='1'><tr><th>ID Ordine</th><th>ID Prodotto</th><th>Quantità</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_ordine'] . "</td><td>" . $row['id_prodotto'] . "</td><td>" . $row['quantità'] . "</td></tr>";
        }
        echo "</table>";
    }
?>


<p>Clicca sul link qui sotto per andare alla home page:</p>
<a href="../index.php">Torna all'indice</a>
<?php include '../footer.php'; ?>
</body>
</html>