<?php
$polaczenie=mysqli_connect("localhost","root","","wedkarstwo");

if(isset($_POST['dodaj']))
{
    if(isset($_POST['lowisko'])&&isset($_POST['data'])&&isset($_POST['sedzia']))
    {
        $lowisko=$_POST['lowisko'];
        $data=$_POST['data'];
        $sedzia=$_POST['sedzia'];
        $zapytanie1="INSERT INTO zawody_wedkarskie(Karty_wedkarskie_id,Lowisko_id,data_zawodow,sedzia) VALUES (0,$lowisko,'$data','$sedzia');";
        mysqli_query($polaczenie,$zapytanie1);
        header("Location:zawody.html");
        exit();

    }
}





mysqli_close($polaczenie);
?>