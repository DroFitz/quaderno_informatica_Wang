<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Normalizzazione</title>
</head>
<body>
<?php
    // Descrizione del funzionamento del codice:
    // Il codice visualizza un'introduzione alla normalizzazione dei dati in un database, descrivendo le tre principali forme normali:
    // - Prima Forma Normale (1NF): Ogni cella deve contenere un solo valore e non devono esserci colonne con valori multipli.
    // - Seconda Forma Normale (2NF): La tabella deve essere in 1NF e ogni attributo non chiave deve dipendere interamente dalla chiave primaria.
    // - Terza Forma Normale (3NF): La tabella deve essere in 2NF e non deve esserci dipendenza transitiva tra attributi non chiave.

    // Il codice mostra quindi un esempio pratico di normalizzazione dei dati, partendo da una tabella non normalizzata che contiene dati relativi a ordini, clienti e prodotti.
    // La tabella iniziale viene visualizzata e poi viene normalizzata passo dopo passo, mostrando come i dati vengono separati in diverse tabelle per eliminare la ridondanza e migliorare l'integrità dei dati.

    // Inizialmente viene mostrata una tabella non normalizzata che contiene le informazioni su ordini, clienti e prodotti.
    // Successivamente, la tabella viene trasformata in 1NF, dove non ci sono colonne con valori multipli, e poi separata in tabelle 2NF e 3NF, dove:
    // - I dati sui clienti vengono separati in una tabella "Clienti".
    // - I dati sugli ordini vengono separati in una tabella "Ordini".
    // - I dettagli degli ordini (prodotti, prezzi e quantità) vengono separati in una tabella "Dettagli Ordini".
    // Infine, viene mostrata una tabella "Prodotti" con i dettagli sui prodotti separati.

    // Il codice termina con un pulsante che permette all'utente di tornare alla pagina principale, tramite un'azione di redirezione.
?>

<?php
    // Visualizza l'introduzione alla normalizzazione dei dati in un database
    echo "<h1>Introduzione alla Normalizzazione</h1>";
    echo "<p>La normalizzazione è il processo di organizzazione dei dati in un database per ridurre la ridondanza e migliorare l'integrità dei dati. Le forme normali sono regole utilizzate per verificare che una tabella sia progettata in modo ottimale. Le principali forme normali sono:</p>";
    echo "<ul>
            <li><strong>Prima Forma Normale (1NF):</strong> Nessuna colonna deve contenere valori multipli; ogni cella deve contenere un solo valore.</li>
            <li><strong>Seconda Forma Normale (2NF):</strong> La tabella deve essere in 1NF e ogni attributo non chiave deve dipendere interamente dalla chiave primaria.</li>
            <li><strong>Terza Forma Normale (3NF):</strong> La tabella deve essere in 2NF e non deve esserci dipendenza transitiva tra attributi non chiave.</li>
          </ul>";
    echo "<p>In questo esercizio, vedremo come normalizzare una tabella che gestisce ordini, clienti e prodotti. Partiremo da una tabella non normalizzata e passeremo attraverso le fasi della Prima Forma Normale (1NF), della Seconda Forma Normale (2NF), fino alla Terza Forma Normale (3NF).</p>";
?>

<?php
    // Tabella non normalizzata che include dati di ordini, clienti e prodotti
    echo "<h2>Tabella iniziale (non normalizzata)</h2>";
?>

<!-- Tabella non normalizzata -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Ordine_ID</th>
        <th>Cliente</th>
        <th>Prodotto</th>
        <th>Prezzo_Prodotto</th>
        <th>Quantità</th>
        <th>Telefono_Cliente</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Mario Rossi</td>
        <td>Penna</td>
        <td>1.50</td>
        <td>2</td>
        <td>1234567890</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Mario Rossi</td>
        <td>Quaderno</td>
        <td>3.00</td>
        <td>1</td>
        <td>1234567890</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Lucia Verdi</td>
        <td>Matita</td>
        <td>0.50</td>
        <td>3</td>
        <td>0987654321</td>
    </tr>
</table>

<?php
    // Passaggio alla Prima Forma Normale (1NF)
    echo "<h2>Tabella in 1NF</h2>";
?>

<!-- Tabella in 1NF (già la stessa della non normalizzata, dato che è in 1NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Ordine_ID</th>
        <th>Cliente</th>
        <th>Prodotto</th>
        <th>Prezzo_Prodotto</th>
        <th>Quantità</th>
        <th>Telefono_Cliente</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Mario Rossi</td>
        <td>Penna</td>
        <td>1.50</td>
        <td>2</td>
        <td>1234567890</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Mario Rossi</td>
        <td>Quaderno</td>
        <td>3.00</td>
        <td>1</td>
        <td>1234567890</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Lucia Verdi</td>
        <td>Matita</td>
        <td>0.50</td>
        <td>3</td>
        <td>0987654321</td>
    </tr>
</table>

<?php
    // Passaggio alla Seconda Forma Normale (2NF)
    echo "<h2>Tabella Clienti (2NF)</h2>";
?>

<!-- Tabella Clienti (2NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Cliente</th>
        <th>Telefono_Cliente</th>
    </tr>
    <tr>
        <td>Mario Rossi</td>
        <td>1234567890</td>
    </tr>
    <tr>
        <td>Lucia Verdi</td>
        <td>0987654321</td>
    </tr>
</table>

<?php
    echo "<h2>Tabella Ordini (2NF)</h2>";
?>

<!-- Tabella Ordini (2NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Ordine_ID</th>
        <th>Cliente</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Mario Rossi</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Lucia Verdi</td>
    </tr>
</table>

<?php
    echo "<h2>Tabella Dettagli Ordini (2NF)</h2>";
?>

<!-- Tabella Dettagli Ordini (2NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Ordine_ID</th>
        <th>Prodotto</th>
        <th>Prezzo_Prodotto</th>
        <th>Quantità</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Penna</td>
        <td>1.50</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Quaderno</td>
        <td>3.00</td>
        <td>1</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Matita</td>
        <td>0.50</td>
        <td>3</td>
    </tr>
</table>

<?php
    // Passaggio alla Terza Forma Normale (3NF)
    echo "<h2>Tabella Prodotti (3NF)</h2>";
?>

<!-- Tabella Prodotti (3NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Prodotto</th>
        <th>Prezzo_Prodotto</th>
    </tr>
    <tr>
        <td>Penna</td>
        <td>1.50</td>
    </tr>
    <tr>
        <td>Quaderno</td>
        <td>3.00</td>
    </tr>
    <tr>
        <td>Matita</td>
        <td>0.50</td>
    </tr>
</table>

<?php
    echo "<h2>Tabella Clienti (3NF)</h2>";
?>

<!-- Tabella Clienti (3NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Cliente</th>
        <th>Telefono_Cliente</th>
    </tr>
    <tr>
        <td>Mario Rossi</td>
        <td>1234567890</td>
    </tr>
    <tr>
        <td>Lucia Verdi</td>
        <td>0987654321</td>
    </tr>
</table>

<?php
    echo "<h2>Tabella Ordini (3NF)</h2>";
?>

<!-- Tabella Ordini (3NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Ordine_ID</th>
        <th>Cliente</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Mario Rossi</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Lucia Verdi</td>
    </tr>
</table>

<?php
    echo "<h2>Tabella Dettagli Ordini (3NF)</h2>";
?>

<!-- Tabella Dettagli Ordini (3NF) -->
<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>Ordine_ID</th>
        <th>Prodotto</th>
        <th>Prezzo_Prodotto</th>
        <th>Quantità</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Penna</td>
        <td>1.50</td>
        <td>2</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Quaderno</td>
        <td>3.00</td>
        <td>1</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Matita</td>
        <td>0.50</td>
        <td>3</td>
    </tr>
</table>

<!-- Bottone per tornare all'indice -->
<p><button onclick="window.location.href='index.php';">Torna all'indice</button></p>

<?php include 'footer.php'; ?> <!-- Include il footer con informazioni aggiuntive -->

</body>
</html>
