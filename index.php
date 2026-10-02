<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>imie nazwisko <input type="text" name="imie_nazwisko"></label><br> 
        <label>przedmiot <input type="text" name="przedmiot"></label><br>
        <label>ocena
        <select name="ocena">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select></label><br>
 
        <input type="submit" value="zapisz">
    </form>
 
    <?php
    if (!file_exists("oceny.txt"))
    {
        $plik = fopen("oceny.txt", "w");
        fclose($plik);
    }

    if (isset($_POST["imie_nazwisko"]))
    {
        $imie_nazwisko = $_POST["imie_nazwisko"];
        $ocena = $_POST["ocena"];
        $przedmiot = $_POST["przedmiot"];
  
        $plik = fopen("oceny.txt", "a");
 
        $text = $imie_nazwisko . " | " . $przedmiot . " | ocena: " . $ocena . "\n";
 
        fwrite($plik, $text);
 
        fclose($plik);

        header("Location:index.php");
    }
 
    if (file_exists("oceny.txt"))
    {
        echo "<h1>Zapisane oceny</h1>";
        $plik = fopen("oceny.txt", "r");
 
        while (!feof($plik))
        {
            $odczyt = fgets($plik);
 
            if ($odczyt != "")
                echo $odczyt . "<br>";
        }
 
        fclose($plik);
    }
 
    ?>
</body>
</html>