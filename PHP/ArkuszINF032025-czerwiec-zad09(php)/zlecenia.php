<?php
$polaczenie=mysqli_connect("localhost","root","","remonty");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remontyt</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="naglowek">
        <h1>Malowanie i gipsowanie</h1>
    </header>
    <main id="glowny">
        <nav id="nawigacja">
            <a href="kontakt.html">Kontakt</a>
            <a href="https://remonty.pl" target="_blank">Partnerzy</a>
        </nav>
        <aside id="boczny">
            <img src="tapeta_lewa.png" alt="usługi" class="obraz"><br>
            <img src="tapeta_prawa.png" alt="usługi"class="obraz"><br>
            <img src="tapeta_lewa.png" alt="usługi"class="obraz">
        </aside>
        <section id="lewa">
            <h2>Dla klientów</h2>
            <form action="zlecenia.php" method="POST">
                <label for="">Ilu co najmniej pracowników potrzebujesz?</label>
                <input type="number" name="ile" id="">
                <input type="submit" name="szukaj" value="Szukaj firm" id="">
            </form>
            <?php
            if(isset($_POST['ile']))
            {
                  $liczbaPracownikow=$_POST['ile'];
                  $zapytanie="SELECT nazwa_firmy,liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >=$liczbaPracownikow";
                  $wynik=mysqli_query($polaczenie,$zapytanie);
                  $ile=mysqli_num_rows($wynik);
                  $i=0;
                  while($i<$ile)
                  {
                    $tab=mysqli_fetch_assoc($wynik);
                    echo"<p>".$tab['nazwa_firmy'].", ".$tab['liczba_pracownikow']."pracowników</p>";
                    $i++;
                  }
            }
              
            ?>
        </section>
        <section id="srodkowa">
            <h2>Dla wykonawców</h2>
            <form action="zlecenia.php" method="POST">
                <select name="miasto" id="">
                   <?php
                   $zapytanie2="SELECT DISTINCT miasto FROM klienci ORDER BY miasto ASC";
                   $wynik2=mysqli_query($polaczenie,$zapytanie2);
                   $ile=mysqli_num_rows($wynik2);
                   $i=0;
                   while($i<$ile)
                   {
                    $tab=mysqli_fetch_assoc($wynik2);
                    echo"<option>".$tab['miasto']."</option>";
                    $i++;
                   }
                   ?>
                </select>
                <br>
                <input type="radio" name="opcja" value="malowanie" checked><label for="">malowanie</label><br>
                 <input type="radio" name="opcja" value="gipsowanie"><label for="">gipsowanie</label><br>
                 <input type="submit" value="Szukaj klientów" name="szukaj">
            </form>
            <ul>
                <?php
                    if(isset($_POST['szukaj'])){
                        if(isset($_POST['opcja'])&&isset($_POST['miasto']))
                        {
                            $miasto=$_POST['miasto'];
                            $rodzaj=$_POST['opcja'];
                            $zapytanie3="SELECT klienci.imie,zlecenia.cena FROM klienci JOIN zlecenia ON klienci.id_klienta=zlecenia.id_klienta WHERE klienci.miasto='$miasto' AND rodzaj='$rodzaj'";
                            $wynik3=mysqli_query($polaczenie,$zapytanie3); 
                            $ile=mysqli_num_rows($wynik3);
                            $i=0;
                            while($i<$ile)
                            {
                                $tab=mysqli_fetch_assoc($wynik3);
                                echo "<li>".$tab['imie']."-".$tab['cena']."</li>";
                                $i++;
                            } 
                        }
                        
                    }
                    
                ?>
            </ul>

        </section>
    </main>
    <footer id="stopka">
        <p><strong>Stronę wykonał:AS</strong></p>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);
?>