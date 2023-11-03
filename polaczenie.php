<?php
$serwer = "localhost";
    $uzytkownik = "root";
    $haslo = "";
    $baza_danych = "koszykowka";

    // Tworzenie połączenia
    $polaczenie = new mysqli($serwer, $uzytkownik, $haslo, $baza_danych);

    // Sprawdzenie połączenia
    if ($polaczenie->connect_error) {
        die("Błąd połączenia: " . $polaczenie->connect_error);
    }
    ?>