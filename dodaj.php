<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
include "polaczenie.php";
    echo "Połączono pomyślnie";
    $druzyna = $_GET["d"];
    $NR_zawodnika = $_GET["nr"];

    $czy_trafil = $_GET["czy"];
    $za_ile = $_GET["l_pkt"];

    echo $NR_zawodnika;
    echo $za_ile;
    echo  $czy_trafil;

    $sql = "SELECT * FROM $druzyna";

    $wynik = $polaczenie->query($sql);
    $wiersz = $wynik->fetch_assoc();
    $r = 0;
    while ($wiersz = $wynik->fetch_assoc()) {
        if ($wiersz["NR"] == $NR_zawodnika) {
            $r = 1;
            break;
        }
        
    }
    if ($r == 0) {
        $sql = "INSERT INTO  $druzyna ( `NR`, `Liczba zdobytych punktow`, `liczba trafionych za 1`, `liczba nie trafionych za 1`, `liczba trafionych za 2`, `liczba nie trafionych za 2`, `liczba trafionych za 3`, `liczba nie trafionych za 3`, `% trafionych za 2 i 3`, `% trafionych za 1`) VALUES ( $NR_zawodnika, 0, 0, 0, 0, 0, 0, 0,0, 0);";

        $wynik = $polaczenie->query($sql);
    }

    $sql = "SELECT * FROM $druzyna WHERE NR=$NR_zawodnika";
    
    $wynik = $polaczenie->query($sql);
    $wiersz = $wynik->fetch_assoc();
    $liczba_nowa_punktow = $wiersz['Liczba zdobytych punktow'];
    $t1 =  $wiersz['liczba trafionych za 1'];
    $t2 =  $wiersz['liczba trafionych za 2'];
    $t3 =  $wiersz['liczba trafionych za 3'];
    $t1n = $wiersz['liczba nie trafionych za 1'];
    $t2n = $wiersz['liczba nie trafionych za 2'];
    $t3n = $wiersz['liczba nie trafionych za 3'];

    if($czy_trafil=="tak"){
         switch ($za_ile) {
        case 1:
            $liczba_nowa_punktow++;
            $t1++;
            break;
        case 2:
            $liczba_nowa_punktow += 2;
            $t2++;
            break;
        case 3:
            $liczba_nowa_punktow += 3;
            $t3++;            break;
        default:
            $liczba_nowa_punktow += 0;
            break;
    }}
    else{
        switch ($za_ile) {
            case 1:
            
                $t1n++;
                break;
            case 2:
          
                $t2n++;
                break;
            case 3:
          
                $t3n++;            break;
            default:
                break;
        }
    }
//$t23= round((($t2+$t3+$t2n+$t3n)/($t2+$t3)),2);
   // $t23

   // $t13=round((($t1+$t1n)/($t1)),2);   
 $sql = "UPDATE $druzyna SET  `Liczba zdobytych punktow` = $liczba_nowa_punktow, `liczba trafionych za 1` = $t1, `liczba nie trafionych za 1` = $t1n, `liczba trafionych za 2` = $t2, `liczba nie trafionych za 2` = $t2n, `liczba trafionych za 3` = $t3, `liczba nie trafionych za 3` = $t3n  WHERE `NR` =  $NR_zawodnika;";
 $wynik = $polaczenie->query($sql);
           
 switch($czy_trafil){       
    case "tak":
        $czy_trafil=1;
        break;
        default:
        $czy_trafil=0;
     }
     switch($druzyna){       
        case "A":
            $druzyna=1;
            break;
            default:
            $druzyna=0;
         }
  
           
    $sql = "INSERT INTO `przebieg_gry`( `ID`,`NR`, `l_pkt`, `czy_trafil`, `druzyna`, `godzina_wpisania`) VALUES (NULL, $NR_zawodnika, $za_ile, $czy_trafil,$druzyna, CURTIME());";
    $wynik = $polaczenie->query($sql);
    $sql = "SELECT SUM(`Liczba zdobytych punktow`)as 'Liczba zdobytych punktow'  FROM `a`;";
    $wynik = $polaczenie->query($sql);
    $wiersz = $wynik->fetch_assoc();
    $g= $wiersz['Liczba zdobytych punktow'];
    $sql ="UPDATE druzyny SET `Wynik A`=$g WHERE `Nazwa A`='Druzyna_A'";
    $wynik = $polaczenie->query($sql);

    $sql = "SELECT SUM(`Liczba zdobytych punktow`)as 'Liczba zdobytych punktow'  FROM `b`;";
    $wynik = $polaczenie->query($sql);
    $wiersz = $wynik->fetch_assoc();
    $g= $wiersz['Liczba zdobytych punktow'];
    $sql ="UPDATE druzyny SET `Wynik B`=$g WHERE `Nazwa B`='Druzyna_B'";
    $wynik = $polaczenie->query($sql);
    header("Location: index.php");
exit; 
    ?>
</body>

</html>