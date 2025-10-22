<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
         <?php
        $serwer="localhost";
        $user="root";
        $password="";
        $baza="piekarnia";

        $polacz=mysqli_connect($serwer,$user,$password,$baza);
        ?>
   <img src="wypieki.png" alt="Produkty naszej piekarni" class="tlo">
    <nav id="nawigacja">
        <a href="">KWERENDA1</a>
        <a href="">KWERENDA2</a>
        <a href="">KWERENDA3</a>
        <a href="">KWERENDA4</a>
    </nav>
        <header id="naglowek">
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>
            Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. 
            Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych
            ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.
        </p>
    </header>
    <main id="glowny">
        <h4>Wybierz rodzaj wypieków</h4>
        <?php

        $zapytanie2="SELECT DISTINCT Rodzaj FROM wyroby GROUP BY Rodzaj DESC";
        $wynik=mysqli_query($polacz,$zapytanie2);
        echo'<form action="piekarnia.php" method="POST">';
        echo'<select name="wybor" id="">';
        
        if(mysqli_num_rows($wynik)>0)
        {
            while($wiersz=mysqli_fetch_assoc($wynik)){
            echo "<option>".$wiersz['Rodzaj']."</option>";
            }
      
      
        echo' </select>';
        echo'<input type="submit" value="Wybierz">';
          }
        echo' </form>';
        
        
       
        if (isset($_POST["wybor"])) {
            $wybor=$_POST["wybor"];
        
        
        $zapytanie1="SELECT Rodzaj,Nazwa,Gramatura,Cena FROM wyroby WHERE Rodzaj='$wybor'";
        $wynik2=mysqli_query($polacz,$zapytanie1);
        
        echo"<table>";
            echo"<tr>";
                echo"<th>Rodzaj</th>";
                echo"<th>Nazwa</th>";
                echo"<th>Gramatura</th>";
                echo"<th>Cena</th>";
            echo"</tr>";
          
            while($wiersz2=mysqli_fetch_assoc($wynik2))
            {
        
            echo"<tr>";
            echo "<td>".$wiersz2['Rodzaj']."</td>";
            echo "<td>".$wiersz2['Nazwa']."</td>";
            echo "<td>".$wiersz2['Gramatura']."</td>";
            echo "<td>".$wiersz2['Cena']."</td>";
            echo"</tr>";
            }
          
        }
        else{
            echo "nie wybrano";
        }
        
        echo"</table>";
        ?>
    </main>
    <footer id="stopka">
        <p>AUTOR XYZ</p>
        <p>Data 01.01.01</p>
    </footer>
   <?php

        mysqli_close($polacz);
    ?>
</body>
</html>