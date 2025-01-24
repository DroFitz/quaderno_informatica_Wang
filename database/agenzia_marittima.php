<html>

<body>
    <h1>Gestione Film e Proiezioni</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";        // Host del database (di solito 'localhost')
        $username = "Admin";         // Nome utente del database
        $password = "Admin123!";             // Password del database
        $dbname = "agenzia_marittima";  // Nome del database
    
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

    <form action="agenzia_marittima.php" method="post">
        <input type="submit" name="view_merce" value="Visualizza Merce">
        <input type="submit" name="view_navi" value="Visualizza Navi">
        <input type="submit" name="view_porti" value="Visualizza Porti">
	    <input type="submit" name="view_viaggi" value="Visualizza Viaggi">
	    <input type="submit" name="view_polizzeDiCarico" value="Visualizza Polizze di Carico">
	    <input type="submit" name="view_cliente" value="Visualizza Cliente">
	    <input type="submit" name="view_fornitore" value="Visualizza Fornitore">
    </form>

   

<?php
    if (isset($_POST['view_merce'])) {
        $result = $conn->query("SELECT * FROM merce");
        echo "<h2>Merce</h2><table border='1'><tr><th>ID_Merce</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Merce'] . "</td>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_navi'])) {
        $result = $conn->query("SELECT * FROM navi");
        echo "<h2>Navi</h2><table border='1'><tr><th>Bandiera</th><th>Nome_Capitano</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Bandiera'] . "</td><td>" . $row['Nome_Capitano'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_porti'])) {
        $result = $conn->query("SELECT * FROM porti");
        echo "<h2>Porti</h2><table border='1'><tr><th>ID Porti</th><th>Porto Partenza</th><th>Porto Arrivo</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Porti'] . "</td><td>" . $row['Porto_Partenza'] . "</td><td>" . $row['Porto_Arrivo'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_viaggi'])) {
        $result = $conn->query("SELECT * FROM viaggi");
        echo "<h2>Viaggi</h2><table border='1'><tr><th>Sigla</th><th>Data Partenza</th><th>Data Arrivo</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Sigla'] . "</td><td>" . $row['Data_Partenza'] . "</td><td>" . $row['Data_Arrivo'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_polizzeDiCarico'])) {
        $result = $conn->query("SELECT * FROM polizze_di_carico");
        echo "<h2>Polizze Di Carico </h2><table border='1'><tr><th>Codice Alfa Numerico</th><th>Città</th><th>Sala</th><th>Data</th><th>Ora</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['Codice_Alfanumerico'] . "</td><td>" . $row['Tipo_Merce'] . "</td><td>" . $row['Tipo_Colli'] . "</td><td>" . $row['Numero_Colli'] . "</td><td>" . $row['Peso_Totale'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_cliente'])) {
        $result = $conn->query("SELECT * FROM cliente");
        echo "<h2>Cliente</h2><table border='1'><tr><th>ID Cliente</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Cliente'] . "</td></tr>";
        }
        echo "</table>";
    } elseif (isset($_POST['view_fornitore'])) {
        $result = $conn->query("SELECT * FROM fornitore");
        echo "<h2>Fornitore</h2><table border='1'><tr><th>ID_Fornitore</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['ID_Fornitore'] . "</td></tr>";
        }
        echo "</table>";
    } 
    //$conn->close();
    ?>

<p>Clicca sul link qui sotto per andare alla pagina di inserimento dati:</p>
<a href="insert_data.php">Pagina di inserimento dati</a>
<p>Clicca sul link qui sotto per andare alla home page:</p>
<a href="../index.php">Torna all'indice</a>
</body>
</html>
