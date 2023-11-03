<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script>
        function walidujFormularz() {
            var nrZawodnika = document.getElementById("nrZawodnika").value;
            var lPkt = document.getElementById("lPkt").value;
            var przyciskRadio = document.querySelector('input[name="czy"]:checked');
            var przyciskRadio2 = document.querySelector('input[name="d"]:checked');

            if (nrZawodnika === "" || lPkt === "" || przyciskRadio === null || przyciskRadio2 === null) {
                alert("Proszę wypełnić wszystkie pola i zaznaczyć przycisk radio!");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <?php
   include "polaczenie.php";

    ?>

    <form action="dodaj.php" method="get" onsubmit="return walidujFormularz()">
        <label>Nr zawodnika:</label><input id="nrZawodnika" name="nr" type="text"><br>
        <label>l_pkt</label> <input id="lPkt" name="l_pkt" type="number">

        <Table>
            <tr>
                <td colspan="2"> <label>Czy trafil?</label> </td>
            </tr>
            <tr>
                <td><input type="radio" name="czy" value="tak"><label>tak</label></td>
                <td><input type="radio" name="czy" value="nie"><label>nie</label></td>
            </tr>
            <tr>
                <td colspan="2"> <label>Która drużyna?</label> </td>
            </tr>
            <tr>
                <td><input type="radio" name="d" value="A"><label>A</label></td>
                <td><input type="radio" name="d" value="B"><label>B</label></td>
            </tr>
        </Table>
        <button type="submit">Wyślij</button>
    </form>

    <?php
    function druzynaa($druzyna,$polaczenie){
   
    $sql = "SELECT * FROM $druzyna";
    $wynik = $polaczenie->query($sql);

    echo "<table>";
    echo "<th><td colspan='11'>".$druzyna."</td></th>";

    echo "<tr>";
    echo "<td>NR</td>";
    echo "<td>Imie Nazwisko</td>";
    echo " <td>Liczba pkt</td>";
    echo "<td>liczba trafionych za 1</td>";
    echo "<td>liczba nie trafionych za 1</td>";
    echo "<td>liczba trafionych za 2</td>";
    echo "<td>liczba nie trafionych za 2 </td>";
    echo "<td>liczba trafionych za 3 </td>";
    echo "<td>liczba nie trafionych za 3</td>";
    echo "<td>% trafionych za 2 i 3</td>";
    echo "<td>% trafionych za 1</td>";
    echo "</tr>";

    if ($wynik->num_rows > 0) {
        
        while ($wiersz = $wynik->fetch_assoc()) {echo "<tr>";
            echo "<td>" . $wiersz["NR"]. " </td><td>" . $wiersz["Imie_nazwisko"]. " </td><td>" . $wiersz["Liczba zdobytych punktow"]. " </td><td>" . $wiersz["liczba trafionych za 1"]. " </td><td>" . $wiersz["liczba nie trafionych za 1"]. " </td><td>" . $wiersz["liczba trafionych za 2"]. " </td><td>" . $wiersz["liczba nie trafionych za 2"]. " </td><td>" . $wiersz["liczba trafionych za 3"]. " </td><td>" . $wiersz["liczba nie trafionych za 3"]. " </td><td>" . $wiersz["% trafionych za 2 i 3"]."</td><td>".$wiersz["% trafionych za 1"]."</td>";
         echo "</tr>"; }
      
    } 
    echo "</table><br>"; 
    
    }
    function wys_p($polaczenie){
        $druzyna="przebieg_gry";
        $sql = "SELECT * FROM $druzyna";
    $wynik = $polaczenie->query($sql);

    echo "<table>";
    echo "<th><td colspan='11'>".$druzyna."</td></th>";

    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>NR</td>";
    echo "<td>L pkt</td>";
    echo " <td>Czy trafił?</td>";
    echo "<td>Druzyna</td>";
    echo "<td>Czas</td>";
    echo "</tr>";

    if ($wynik->num_rows > 0) {
        
        while ($wiersz = $wynik->fetch_assoc()) {echo "<tr>";
            echo "<td>" . $wiersz["ID"]. " </td><td>" . $wiersz["NR"]. " </td><td>" . $wiersz["l_pkt"]. " </td><td>" . $wiersz["czy_trafil"]. " </td><td>" . $wiersz["druzyna"]. " </td><td>" . $wiersz["godzina_wpisania"]. " </td>";
         echo "</tr>"; }
      
    } 
    echo "</table><br>";  
    } 
    wys_p($polaczenie);
    druzynaa("A",$polaczenie);
    druzynaa("B",$polaczenie);
   
    ?>

</body>

</html>