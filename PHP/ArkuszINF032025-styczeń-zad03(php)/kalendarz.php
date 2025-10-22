<?php
$polaczenie=mysqli_connect("localhost","root","","kalendarz");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="naglowek">
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section id="napis">
        <p>Dzisiaj jest 
        <?php
        $zmienna="SELECT DATE_FORMAT(CURRENT_DATE(),'%m-%d')as data";
        $zmienna2=mysqli_query($polaczenie,$zmienna);
        $zmienna3=mysqli_fetch_assoc($zmienna2);
        $zmienna4=$zmienna3['data'];
        
        $zapytanie="SELECT imiona FROM imieniny WHERE data='$zmienna4'";
        $wynik=mysqli_query($polaczenie,$zapytanie);
        $ile=mysqli_num_rows($wynik);
        if($ile>0){
            $tab=mysqli_fetch_assoc($wynik);
            for($i=0;$i<$ile;$i++)
            {
                echo $tab["imiona"];
            }
        }
        else{
            echo"brak";
        }
        
        ?>
        </p>
    </section>
     <section id="blokL">
        <table>
            <tr>
                <th>liczba dni22</th>
                <th>miesiąc</th>
            </tr>
            <tr >
                <td rowspan="7">31</td>
                <td>Styczeń</td>
            </tr>
            <tr>
                <td>Marzec</td>
            </tr>
            <tr>
            </tr>
                <td>Maj</td>
            <tr>
                <td>Lipiec</td>
            </tr>
            <tr>
                <td>Sierpień</td>
            </tr>
            <tr>
                <td>Październik</td>
            </tr>
            
            <tr >
                <td rowspan="4">30</td>
                <td>Kwiecień</td>
            </tr>
            <tr>
                <td>Czerwiec</td>
            </tr>
            <tr>
                <td>Wrzesień</td>
            </tr>
            <tr>
                <td>Lstopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>Luty</td>
            </tr>
        </table>
        
    </section>
     <section id="blokS">
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="POST">
            <input type="date" name="" id="">
            <input type="submit" value="Wyślij" name="" id="">
        </form>
    </section>
     <section id="blokP">
       <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów"><img src="" alt="Kalendarz Majów"> </a> 
       <h2>Rodzaje kalendarzy</h2>
       <ol>
        <li>słoneczny</li>
            <ul>
                <li>Kalendarz Majów</li>
                <li>juliański</li>
                <li>gregorjański</li>
            </ul>
            <li>księżycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babiloński</li>
            </ul>
       </ol>
    </section>
    <footer id="stopka">
        <p>Stronę opracował: XYZ</p>
    </footer>
</body>
</html>
<?php
mysqli_close($polaczenie);

?>