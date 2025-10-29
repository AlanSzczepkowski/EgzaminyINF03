<?php
    $polaczenie=mysqli_connect("localhost","root","","wedkowanie");

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header id="baner">
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
         <?php
            
            $zapytanie1="SELECT ryby.nazwa,lowisko.akwen,lowisko.wojewodztwo FROM ryby JOIN lowisko ON ryby.id=lowisko.Ryby_id WHERE rodzaj=3;";
            $wynik=mysqli_query($polaczenie,$zapytanie1);
            $ile=mysqli_num_rows($wynik);
            if($ile>0)
            {
                echo "<ol>";
                $i=0;
                while($i<$ile)
                {
                    $tab=mysqli_fetch_array($wynik);  
                    echo "<li>".$tab[0] ." pływa w rzece ". $tab[1].", ".$tab[2]."</li>";
                    $i++;
                }
                echo "</ol>";
            }
            else
            {
                echo"brak danych";
            }
            
        ?>
        
    </section>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
         <?php
            $zapytanie2="SELECT id,nazwa,wystepowanie FROM ryby WHERE styl_zycia=1;";
            $wynik2=mysqli_query($polaczenie,$zapytanie2);
            $ile2=mysqli_num_rows($wynik2);
            $i2=0;
            if($ile2>0)
            {
                echo "<table>";
                echo"<tr>";
                echo "<th>L.p</th>";
                echo "<th>Gatunek</th>";
                echo "<th>Występowanie</th>";
                echo"</tr>";

                while($i2<$ile2)
                {
                $tab2=mysqli_fetch_array($wynik2);
                
                echo"<tr>";
                echo "<td>".$tab2[0]."</td>";
                echo "<td>".$tab2[1]."</td>";
                echo "<td>".$tab2[2]."</td>";
                echo"</tr>";

                $i2++;
                }
                
                echo"</table>";
            }
            else
            {
                echo "Nie ma danych";
            }    
        ?>
    </section>
    
    <footer id="stopka">
        <p>Stronę wykonał: AS</p>
    </footer>

</body>
</html>
<?php
    mysqli_close($polaczenie);
?>