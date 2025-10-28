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
    <nav id="baner">
        <h1>Portal dla wędkarzy</h1>
    </nav>
    <section id="lewy1">
        <h3>Ryby zamieszkujące rzeki</h3>
         <?php
            
            $zapytanie1="SELECT ryby.nazwa,lowisko.akwen,lowisko.wojewodztwo FROM ryby JOIN lowisko ON ryby.id=lowisko.Ryby_id WHERE rodzaj=3;";
            $wynik=mysqli_query($polaczenie,$zapytanie1);
            $ile=mysqli_num_rows($wynik);
            if($ile>0)
            {
                $tab=mysqli_fetch_array($wynik);
                var_dump($tab);
                echo "<ol>";
                for($i=0;$i<$ile;$i++)
                    {
                     echo "<li>".$tab[0] ." pływa w rzece ". $tab[1].", ".$tab[2]."</li>";
                      echo "<li>".$tab[1] ." pływa w rzece ". $tab[2].", ".$tab[2]."</li>";
                    }
                     echo "</ol>";
            }
            else
            {
                echo"brak danych";
            }
            
        ?>
        <ol>
            <li>Szczupak pływa w rzecze Warta-Olbrzycka, Wielkopolskie</li>
            <li>Leszcz pływa w rzecze Przemsza k. Okradzinowa, Śląskie</li>
        </ol>
    </section>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
         <?php
            
                
            
            
        ?>
        <table id="tabela">
           
            <tr id="j">
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>           
            <tr>
                <td>1</td>
                <td>Szczupak</td>
                <td>stawy,rzeki</td><br>
            </tr>
            <tr>
                <td>2</td>
                <td>Sandacz</td>
                <td>stawy,jeziora,rzeki</td><br>
            </tr>
            <tr>
                <td>3</td>
                <td>Okon</td>
                <td>rzeki</td><br>
            </tr>
            <tr>
                <td>4</td>
                <td>Sum</td>
                <td>jeziora,rzeki</td><br>
            </tr>
            <tr>
                <td>5</td>
                <td>Dorsz</td>
                <td>morze,oceany</td><br>
            </tr>
        </table>
    </section>
    
    <footer id="stopka">
        <p>Stronę wykonał XYZ</p>
    </footer>

</body>
</html>
<?php
    mysqli_close($polaczenie);
?>