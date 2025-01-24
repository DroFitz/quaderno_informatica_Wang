<html>
<body>
    <h1>Inserimento dati Film e Proiezioni</h1>

    <?php
    // Connessione al database (modifica con i tuoi dati di accesso)
    $servername = "localhost"; // Nome del server del database
    $username = "Admin"; // Nome utente per accedere al database
    $password = "Admin123!"; // Password per accedere al database
    $dbname = "agenzia_marittima"; // Nome del database

    // Creazione della connessione al database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la connessione: se fallisce, termina lo script e mostra un messaggio di errore
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Variabili per gestire l'inserimento dei dati
    $id_merce = "";

    // Controlla se il modulo è stato inviato tramite il metodo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera i dati inviati tramite il campo "ID_Merce" del modulo
        $id_merce = $_POST['ID_Merce'];

        // Query SQL per inserire i dati nella tabella "merce"
        $sql = "INSERT INTO merce (ID_Merce)
                VALUES ('$id_merce')";

        // Esegui la query SQL e controlla se l'inserimento è andato a buon fine
        if ($conn->query($sql) === TRUE) {
            echo "Nuovo merce inserito con successo!"; // Messaggio di conferma
        } else {
            // Mostra un messaggio di errore in caso di fallimento
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserisci Merce</title>
    </head>
    <body>
        <h2>Inserisci una nuova Merce</h2>
        <!-- Modulo HTML per l'inserimento dei dati -->
        <form method="POST" action="">
            <label for="ID_Merce">ID Merce:</label> <!-- Etichetta per il campo ID_Merce -->
            <input type="text" id="ID_Merce" name="ID_Merce" required> <!-- Campo di input per ID_Merce -->
            <br><br>

            <input type="submit" value="Inserisci Merce"> <!-- Pulsante per inviare il modulo -->
        </form>

        <!-- Link per navigare verso altre pagine del sito -->
        <p>Clicca sul link qui sotto per andare alla pagina DB Agenzia Marittima.</p>
        <a href="agenzia_marittima.php">DB Agenzia Marittima</a>
        <p>Clicca sul link qui sotto per andare alla home page.</p>
        <a href="../index.php">Home</a>

    </body>
    </html>