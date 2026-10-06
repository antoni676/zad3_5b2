<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje pliki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>MOJE PLIKI</h1>

    <p>Aktualny katalog:<br>
    <strong><?php echo getcwd(); ?></strong></p>

    <h2>ZAWARTOŚĆ KATALOGU</h2>

    <?php
    $sciezka = "dokumenty";

    if (file_exists($sciezka)) {
        $zawartosc = scandir($sciezka);
        echo "<table>";
        echo "<tr>
                <th>Nazwa</th>
                <th>Typ</th>
                <th>Rozmiar</th>
              </tr>";
        foreach ($zawartosc as $element) {
            if ($element != "." && $element != "..") {
                
                $pelna_sciezka = $sciezka . "/" . $element;

                if (is_file($pelna_sciezka)) {
                    $typ = "PLIK";
                    $rozmiar = filesize($pelna_sciezka) . " B";
                } elseif (is_dir($pelna_sciezka)) {
                    $typ = "KATALOG";
                    $rozmiar = "-";
                }
                echo "<tr>";
                echo "<td>" . $element . "</td>";
                echo "<td>" . $typ . "</td>";
                echo "<td>" . $rozmiar . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    } else {
        echo "<p>Katalog $sciezka nie istnieje.</p>";
    }
    ?>

    <br><hr><br>

    <form action="index.php" method="POST">
        <label for="nazwa">Nazwa nowego elementu:</label><br>
        <input type="text" id="nazwa" name="nazwa" required>
        <button type="submit">Utwórz</button>
    </form>

</body>
</html>