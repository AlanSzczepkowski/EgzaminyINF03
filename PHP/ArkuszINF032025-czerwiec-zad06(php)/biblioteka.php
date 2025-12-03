<?php
    $polaczenie=mysqli_connect("localhost","root","","biblioteka");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="naglowek">
        <?php
            $i=0;
            while($i<20)
            {
                echo"<img src='obraz.png'>";
                $i++;
            }
        ?>
    </header>
    <section class="sekcja" id="sekcja1">
        <h2>Liryka</h2>
        <form action="biblioteka.php" method="POST">
            <select name="lista1" id="">
                <?php
                //skrypt2
                $zapytanie="SELECT id, tytul FROM ksiazka WHERE gatunek='liryka'";
                $wynik=mysqli_query($polaczenie,$zapytanie);
                $ile=mysqli_num_rows($wynik);
                $i=0;
                while($i<$ile)
                {
                    $tab=mysqli_fetch_assoc($wynik);
                    $id[$i]=$tab['id'];
                    echo"<option value='$id[$i]'>".$tab['tytul']."</option>";
                    $i++;
                }
               
                ?>
            </select>
            <input type="submit" value="Rezerwuj" name="rezerwuj1" id="">
        </form>
        <?php
        //skrypt3
        if(isset($_POST['rezerwuj1']))
        {
            if(isset($_POST['lista1']))
            {
                $tytul=$_POST['lista1'];
                $zapytanie2="SELECT tytul FROM ksiazka WHERE id='$tytul'";
                $wynik2=mysqli_query($polaczenie,$zapytanie2);
                $tab2=mysqli_fetch_assoc($wynik2);
                echo "<p>Książka ".$tab2['tytul']." została zarezerwowana</p>";
            }
        }
      
        ?>
    </section>
     <section class="sekcja" id="sekcja2">
        <h2>Epika</h2>
        <form action="biblioteka.php" method="POST">
            <select name="lista2" id="">
                <?php
                //skrypt2
                $zapytanie="SELECT id, tytul FROM ksiazka WHERE gatunek='epika'";
                $wynik=mysqli_query($polaczenie,$zapytanie);
                $ile=mysqli_num_rows($wynik);
                $i=0;
                while($i<$ile)
                {
                    $tab=mysqli_fetch_assoc($wynik);
                    $id[$i]=$tab['id'];
                    echo"<option value='$id[$i]'>".$tab['tytul']."</option>";
                    $i++;
                }
               
                ?>
            </select>
            <input type="submit" value="Rezerwuj" name="rezerwuj2" id="">
        </form>
        <?php
        //skrypt3
        if(isset($_POST['rezerwuj2']))
        {
            if(isset($_POST['lista2']))
            {
                $tytul=$_POST['lista2'];
                $zapytanie2="SELECT tytul FROM ksiazka WHERE id='$tytul'";
                $wynik2=mysqli_query($polaczenie,$zapytanie2);
                $tab2=mysqli_fetch_assoc($wynik2);
                echo "<p>Książka ".$tab2['tytul']." została zarezerwowana</p>";
            }
        }
       
        ?>
    </section>
     <section class="sekcja" id="sekcja3">
        <h2>Dramat</h2>
        <form action="biblioteka.php" method="POST">
            <select name="lista3" id="">
                <?php
                //skrypt2
                $zapytanie="SELECT id, tytul FROM ksiazka WHERE gatunek='dramat'";
                $wynik=mysqli_query($polaczenie,$zapytanie);
                $ile=mysqli_num_rows($wynik);
                $i=0;
                while($i<$ile)
                {
                    $tab=mysqli_fetch_assoc($wynik);
                    $id[$i]=$tab['id'];
                    echo"<option value='$id[$i]'>".$tab['tytul']."</option>";
                    $i++;
                }
               
                ?>
            </select>
            <input type="submit" value="Rezerwuj" name="rezerwuj3" id="">
        </form>
        <?php
        //skrypt3
        if(isset($_POST['rezerwuj3']))
        {
            if(isset($_POST['lista3']))
            {
                $tytul=$_POST['lista3'];
                $zapytanie2="SELECT tytul FROM ksiazka WHERE id='$tytul'";
                $wynik2=mysqli_query($polaczenie,$zapytanie2);
                $tab2=mysqli_fetch_assoc($wynik2);
                echo "<p>Książka ".$tab2['tytul']." została zarezerwowana</p>";
            }
        }
       
        ?>
    </section>
     <section class="sekcja" id="sekcja4">
        <h2>Zaległe książki</h2>
        <ul>
        <?php
        $zapytanie3="SELECT ksiazka.tytul, wypozyczenia.id_wyp, wypozyczenia.data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id=wypozyczenia.id_ks ORDER BY data_odd ASC";
        $wynik3=mysqli_query($polaczenie,$zapytanie3);
        $ile=mysqli_num_rows($wynik3);
        if($ile>0){
            $i=0;
            while($i<$ile)
            {
                $tab3=mysqli_fetch_assoc($wynik3);
                echo"<li>";
                echo $tab3['tytul']." ".$tab3['id_wyp']." ".$tab3['data_odd'];
                echo"</li>";
                $i++;
            }
        }
        //skrypt4
        ?>
        </ul>
    </section>
    <footer id="stopka">
            <p><strong>Stronę wykonał:AS</strong></p>
    </footer>
  
</body>
</html>
<?php
mysqli_close($polaczenie);
?>