<?php
$polaczenie=mysqli_connect("localhost","root","","motory");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl">
    <header id="baner">
    <h1>Motocykle-moja pasja</h1>
    </header>
    <section id="lewy">
    <h2>Gdzie Pojechać?</h2>
    <dl>
       
        <dt></dt>
         <?php
         
    $zapytanie="SELECT wycieczki.nazwa,wycieczki.opis,wycieczki.poczatek,zdjecia.zrodlo FROM wycieczki JOIN zdjecia ON wycieczki.zdjecia_id=zdjecia.id";
        $wynik=mysqli_query($polaczenie,$zapytanie);
    $ile=mysqli_num_rows($wynik);
    if($ile>0)
        {
            $i=0;
            while($i<$ile)
                {
                    $tab=mysqli_fetch_assoc($wynik);
                    $zrodlo=$tab['zrodlo'];
                    echo "<dt>".$tab['nazwa']." rozpoczyna się w ".$tab['poczatek']."<a href='$zrodlo.jpg'> zobacz zdjęcie</a></dt>";
                    echo"<dd>".$tab['opis']."</dd>";

                    $i++;
                }
        }
    ?>
        <dd></dd>
        
    </dl>
    </section>
    <section id="prawy1">
    <h2>Co kupić?</h2>
    <ol>
        <li>Honda CBR125R</li>
        <li>Yamaha YBR125</li>
        <li>Honda VFR800i</li>
        <li>Honda CBR1100XX</li>
        <li>BMW R1200GS LC</li>
    </ol>
    </section>
     <section id="prawy2">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek
        <?php
        $zapytanie2="SELECT COUNT(id) as id FROM wycieczki";
        $wynik2=mysqli_query($polaczenie,$zapytanie2);
        $ilosc=mysqli_fetch_assoc($wynik2);
        echo $ilosc['id'];
        ?>
        </p>
        <p>Użytkowników forum:200</p>
        <p>Przesłanych zdjęć:1300</p>
    </section>
    <footer id="stopka">
        <p>Stronę wykonał:AS</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);
?>