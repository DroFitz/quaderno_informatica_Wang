<html>
<body>
    <h1>Gestione Campionato Atletica</h1>

    <?php
        // Configurazione per la connessione al database
        $host = "localhost";
        $username = "Admin";
        $password = "Admin123!";
        $dbname = "atletica";
    
        // Creazione della connessione al database
        $conn = new mysqli($host, $username, $password, $dbname);
    
        // Controllo della connessione
        if ($conn->connect_error) {
            echo "<p style='color: red;'>Connessione fallita: " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>Connessione al database avvenuta con successo!</p>";
        }
    ?>

    <!-- Form per inviare richieste di visualizzazione delle tabelle -->
    <form action="atletica.php" method="post">
        <input type="submit" name="view_atleti" value="Visualizza Atleti">
        <input type="submit" name="view_gare" value="Visualizza Gare">
        <input type="submit" name="view_squadre" value="Visualizza Squadre">
        <input type="submit" name="view_categorie" value="Visualizza Categorie">
        <input type="submit" name="view_ammonizioni" value="Visualizza Ammonizioni">
        <input type="submit" name="view_squalificati" value="Visualizza Squalificati">
    </form>

<?php
    // Controlla quale pulsante è stato premuto e visualizza i dati corrispondenti

    // Visualizza la tabella 'atleti'
    if (isset($_POST['view_atleti'])) {
        $result = $conn->query("SELECT a.*, s.descrizione as squadra, c.descrizione as categoria FROM atleti a JOIN squadre s ON a.ID_squadra = s.ID_squadra JOIN categorie c ON a.ID_categoria = c.ID_categoria");
        echo "<h2>Atleti</h2><table border='1'><tr><th>Pettorale</th><th>Cognome</th><th>Nome</th><th>Squadra</th><th>Categoria</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['numero_pettorale'] . "</td><td>" . $row['cognome'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['squadra'] . "</td><td>" . $row['categoria'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'gare'
    elseif (isset($_POST['view_gare'])) {
        $result = $conn->query("SELECT * FROM gare");
        echo "<h2>Gare</h2><table border='1'><tr><th>Nome</th><th>Città</th><th>Data</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['nome'] . "</td><td>" . $row['citta'] . "</td><td>" . $row['data'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'squadre'
    elseif (isset($_POST['view_squadre'])) {
        $result = $conn->query("SELECT * FROM squadre");
        echo "<h2>Squadre</h2><table border='1'><tr><th>Descrizione</th><th>Città</th><th>Nazione</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['descrizione'] . "</td><td>" . $row['citta'] . "</td><td>" . $row['nazione'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'categorie'
    elseif (isset($_POST['view_categorie'])) {
        $result = $conn->query("SELECT * FROM categorie");
        echo "<h2>Categorie</h2><table border='1'><tr><th>Descrizione</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['descrizione'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'ammonizioni'
    elseif (isset($_POST['view_ammonizioni'])) {
        $result = $conn->query("SELECT a.cognome, a.nome, g.nome as gara, am.motivo 
        FROM ammonizioni am 
        JOIN atleti a ON am.id_atleta = a.ID_atleta 
        JOIN gare g ON am.id_gara = g.ID_gara");
        echo "<h2>Ammonizioni</h2><table border='1'><tr><th>Atleta</th><th>Gara</th><th>Motivo</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['cognome'] . " " . $row['nome'] . "</td><td>" . $row['gara'] . "</td><td>" . $row['motivo'] . "</td></tr>";
        }
        echo "</table>";
    }
    // Visualizza la tabella 'squalificati'
    elseif (isset($_POST['view_squalificati'])) {
        $result = $conn->query("SELECT a.cognome, a.nome, g.nome as gara, COUNT(*) as ammonizioni 
        FROM ammonizioni am 
        JOIN atleti a ON am.id_atleta = a.ID_atleta 
        JOIN gare g ON am.id_gara = g.ID_gara 
        GROUP BY am.id_atleta, am.id_gara 
        HAVING ammonizioni >= 3");
        echo "<h2>Atleti Squalificati</h2><table border='1'><tr><th>Atleta</th><th>Gara</th><th>Ammonizioni</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['cognome'] . " " . $row['nome'] . "</td><td>" . $row['gara'] . "</td><td>" . $row['ammonizioni'] . "</td></tr>";
        }
        echo "</table>";
    }
?>

<!-- Collegamenti ad altre pagine -->
<p>Clicca sul link qui sotto per tornare alla home page:</p>
<a href="../index.php">Torna all'indice</a>
<?php include '../footer.php'; ?>
</body>
</html>