
<?php
$polaczenie=mysqli_connect("localhost","root","","smoki");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="naglowek">
        <h2>Poznaj smoki!</h2>
    </header>
    <nav id="nawigacja">
        <section id="blok1" onclick="Funkcja1()">
            Baza
        </section>
         <section id="blok2"onclick="Funkcja2()">
            Opisy
        </section>
         <section id="blok3"onclick="Funkcja3()">
            Galeria
        </section>
        <script>
                
            function Funkcja1(){
                
                document.getElementById("sekcja1").style.display="block";
                document.getElementById("blok1").style.backgroundColor="mistyrose";
                document.getElementById("sekcja2").style.display="none";
                document.getElementById("blok2").style.backgroundColor="#FFAEA5";
                document.getElementById("sekcja3").style.display="none";
                document.getElementById("blok3").style.backgroundColor="#FFAEA5";
               
            }
              function Funkcja2(){
                document.getElementById("sekcja2").style.display="block";
                document.getElementById("blok2").style.backgroundColor="mistyrose";
                document.getElementById("sekcja1").style.display="none";
                document.getElementById("blok1").style.backgroundColor="#FFAEA5";
                document.getElementById("sekcja3").style.display="none";
                document.getElementById("blok3").style.backgroundColor="#FFAEA5";
                
            }
              function Funkcja3(){
                document.getElementById("sekcja3").style.display="block";            
                document.getElementById("blok3").style.backgroundColor="mistyrose";
                document.getElementById("sekcja1").style.display="none";
                document.getElementById("blok1").style.backgroundColor="#FFAEA5";
                document.getElementById("sekcja2").style.display="none";
                document.getElementById("blok2").style.backgroundColor="#FFAEA5";
                
            }
        </script>
    </nav>
    <main id="glowny">
        <section id="sekcja1">
            <h3>Baza Smoków</h3>
            <?php
            $zapytanie="SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            $ile=mysqli_num_rows($wynik);
            if($ile>0)
            {
                echo "<form action='smoki.php'method='POST'>";
                echo"<select name='opcja'>";
                $i=0;
                while($i<$ile)
                {
                    $tab=mysqli_fetch_assoc($wynik);
                    echo"<option>".$tab['pochodzenie']."</option>";
                    $i++;
                }
                echo"</select>";
                echo "<input type='submit' value='Szukaj' name='szukaj'>";
                echo "</form>";
            }
            else
            {
                echo "brak danych";
            }
            ?>
            <?php
            if(isset($_POST['szukaj'])){
                if(isset($_POST['opcja']))
                {
                    $pochodzenie=$_POST['opcja'];
                    $zapytanie2="SELECT nazwa,dlugosc,szerokosc FROM smok WHERE pochodzenie='$pochodzenie'";
                    $wynik2=mysqli_query($polaczenie,$zapytanie2);
                    $ile=mysqli_num_rows($wynik2);
                    if($ile>0)
                    {
                        echo"<table>";
                        $i=0;
                        while($i<$ile){
                            $tab2=mysqli_fetch_assoc($wynik2);
                            echo "<tr>";
                            echo"<td>".$tab2['nazwa']."</td>";
                            echo"<td>".$tab2['dlugosc']."</td>";
                            echo"<td>".$tab2['szerokosc']."</td>";
                            echo "</tr>";

                            $i++;
                        }

                        echo"</table>";
                    }
                    else
                    {
                        echo"brak danych";
                    }
                   
                }
                else{
                echo"brak";
            }
            }
            else{
                echo"brak";
            }
            
            
            ?>

        </section>
         <section id="sekcja2">
            <h3>Opisy smoków</h3>
            <dl>       
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                <dt>Smok niebieski </dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>
        </section>
         <section id="sekcja3">
            <h3>Galeria</h3>

            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Smok łaciaty">
        </section>
    </main>
    <footer id="stopka">
        <p>Stronę opracował: AS</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);
?>