<html lang="it">
<head>
    <title>Tabella Quadrati e Cubi</title>
    <style>
        /* Applica le impostazioni alla tabella */
        table {
            border-collapse: collapse; /* Combina i bordi delle celle in un solo bordo */
            width: 50%; /* Imposta la larghezza della tabella al 50% del contenitore */
            margin: 20px auto; /* Centra la tabella orizzontalmente e aggiunge un margine di 20px sopra e sotto */
        }

        /* Applica un bordo di 1px alle celle della tabella e all'intera tabella */
        table, th, td {
            border: 1px solid black; /* Bordi neri di 1px per la tabella e le celle */
        }

        /* Imposta l'allineamento del testo al centro e aggiunge uno spazio interno alle celle */
        th, td {
            text-align: center; /* Centra il testo nelle celle */
            padding: 8px; /* Aggiunge uno spazio di 8px intorno al contenuto delle celle */
        }

        /* Imposta lo sfondo delle intestazioni della tabella */
        th {
            background-color: #f2f2f2; /* Colore di sfondo grigio chiaro per le intestazioni */
        }
    </style>
</head>
<body>
    <?php
    // Descrizione del funzionamento del codice
    // Funzionamento del codice:
    // - La variabile $n contiene il numero selezionato dall'utente tramite il form.
    // - Viene verificato che il numero sia compreso tra 1 e 10.
    // - Se il numero è valido, viene generata una tabella con tre colonne:
    //   1. Numero: i numeri da 1 fino a n.
    //   2. Quadrato: il quadrato del numero.
    //   3. Cubo: il cubo del numero.
    // - Viene mostrato un messaggio di errore se il numero non è valido.
    // - Dopo la generazione della tabella, un pulsante consente di tornare alla pagina principale index.php.

    // Verifica se il form è stato inviato tramite il metodo POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera il numero N dal form. Se non è stato selezionato un numero, assegna 0.
        $n = isset($_POST['numero']) ? intval($_POST['numero']) : 0;

        // Controlla che il numero selezionato sia valido (compreso tra 1 e 10)
        if ($n >= 1 && $n <= 10) {
            // Se il numero è valido, crea una tabella
            echo "<h2 style='text-align: center;'>Tabella di quadrati e cubi fino a $n</h2>";
            echo "<table style='width: 50%; margin: 20px auto; border-collapse: collapse;'>";
            echo "<tr><th>Numero</th><th>Quadrato</th><th>Cubo</th></tr>";

            // Ciclo per generare la tabella con i numeri da 1 a N
            for ($i = 1; $i <= $n; $i++) {
                // Calcola il quadrato e il cubo del numero corrente
                $quadrato = $i ** 2; // Quadrato del numero
                $cubo = $i ** 3;     // Cubo del numero

                // Crea una riga nella tabella con il numero, il quadrato e il cubo
                echo "<tr><td>$i</td><td>$quadrato</td><td>$cubo</td></tr>";
            }
            echo "</table>";
        } else {
            // Se il numero non è valido (fuori dall'intervallo 1-10), mostra un messaggio di errore
            echo "<p style='color: red; text-align: center;'>Il numero inserito non è valido.</p>";
        }
    } else {
        // Se il form non è stato inviato, mostra il form per selezionare un numero
    ?>
        <h2 style="text-align: center;">Inserisci un numero tra 1 e 10</h2>
        <form method="post" action="" style="text-align: center;">
            <label for="numero">Numero:</label>
            <!-- Menu a tendina con numeri da 1 a 10 -->
            <select name="numero" id="numero">
                <?php
                // Ciclo per creare le opzioni del menu a tendina
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value=\"$i\">$i</option>"; // Aggiunge un'opzione per ogni numero da 1 a 10
                }
                ?>
            </select>
            <button type="submit">Crea tabella</button>
        </form>
    <?php
    }
    ?>
    <p><button onclick="window.location.href='index.php';">Torna all'indice</button></p>
    <?php include 'footer.php'; ?>
</body>
</html>
