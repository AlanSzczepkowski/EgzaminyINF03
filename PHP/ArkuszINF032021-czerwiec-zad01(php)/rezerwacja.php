<?php

$polaczenie=mysqli_connect("localhost","root","","baza");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja Wszystkie Smaki</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Witamy w restauracji „Wszystkie Smaki"</h1>
    </header>
    <section id="LEWY">
        <img src="menu.jpg" alt="Nasze danie">
    </section>
    <section id="PRAWY">
        <h4>U nas dobrze zjesz!</h4>
        <ol>
            <li>Obiady od 40 zł</li>
            <li>Przekąski od 10 zł</li>
            <li>Kolacje od 20 zł</li>
        </ol>
    </section>
    <section id="DOLNY">
        <h2> Zarezerwuj stolik on-line</h2>
        <form action="rezerwacja.php" method="POST">
            <label>Data (format rrrr-mm-dd):<br>
            <input type="text" name="data"></label><br>
            <label>Ile osób?<br> 
            <input type="number" name="ile"></label><br>
            <label>Twój numer telefonu: <br>
            <input type="text" name="telefon"></label><br>
            <input type="checkbox">Zgadzam się na przetwarzanie moich danych osobowych<br>
            <input id="p" type="submit" value="WYCZYŚĆ">
            <input id="p"type="submit" value="REZERWUJ" name="rezerwuj">
            
          </form>
          <?php
            session_start();
            if(isset($_POST['rezerwuj']))
            { 
                
                $data=$_POST['data'];
                $ile=$_POST['ile'];
                $telefon=$_POST['telefon'];
                $zapytanie="INSERT INTO rezerwacje(data_rez,liczba_osob,telefon) VALUES('$data','$ile','$telefon')";
                mysqli_query($polaczenie,$zapytanie);  
                $_SESSION['komunikat'] = "Dodano rezerwację do bazy!";
                header("location: rezerwacja.php");
                exit();
                
            }
            if (isset($_SESSION['komunikat'])) {
            echo $_SESSION['komunikat'];
            unset($_SESSION['komunikat']);
            }
           
          ?>
    </section>
    <footer>Stronę internetową opracował:AS</footer>
</body>
</html>
<?php
    mysqli_close($polaczenie);
?>