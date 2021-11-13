-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql.ct8.pl
-- Czas generowania: 13 Lis 2021, 11:56
-- Wersja serwera: 5.7.35-log
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m24206_pracownicy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `id_administratora` int(11) NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `login_a` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo_a` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `administratorzy`
--

INSERT INTO `administratorzy` (`id_administratora`, `imie`, `nazwisko`, `login_a`, `haslo_a`) VALUES
(1, 'Jakub', 'Łuka', 'jakulu145', 'Sklep123!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa_kategorii` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa_kategorii`) VALUES
(1, 'wędki'),
(2, 'kołowrotki'),
(3, 'żyłki'),
(4, 'plecionki'),
(5, 'przypony'),
(6, 'woblery');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_tel` varchar(9) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `kod_pocztowy` int(5) NOT NULL,
  `miasto` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ulica` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_domu` varchar(4) NOT NULL,
  `nr_lokalu` varchar(4) NOT NULL,
  `login` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `nr_tel`, `e_mail`, `kod_pocztowy`, `miasto`, `ulica`, `nr_domu`, `nr_lokalu`, `login`, `haslo`) VALUES
(1, 'Tomasz', 'Mazur', '555333222', 'tomasz.mazur@gmail.com', 8110, 'Siedlce', 'Krótka', '9', '', 'tomasz352', 'haslo352'),
(2, 'Agnieszka', 'Strzelecka', '665525126', 'agnieszka.strzelecka@gmail.com', 80000, 'Gdańsk', 'Morska', '5', '32', 'Aga_144', 'A1ga44'),
(3, 'Jan', 'Nowak', '662663664', 'jan.nowak@gmail.com', 15000, 'Białystok', 'Leśna', '8', '', 'noja552', 'elfi2!00'),
(4, 'Iza', 'Mielecka', '590529999', 'iza.mielecka5@gmail.com', 70445, 'Łódź', 'Piłsudskiego', '2', '12', 'izi13', 'pilqu388'),
(5, 'Adam', 'Trecki', '558374521', 'adam.trecki@gmail.com', 85000, 'Bydgoszcz', 'Kopalniana', '16', '2', 'adi288', 'Aqu@wty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_produktu` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_zamowienia` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc_zamowionego` int(11) NOT NULL,
  `cena_zamowionego` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `login_p` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo_p` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `imie`, `nazwisko`, `login_p`, `haslo_p`) VALUES
(1, 'Paweł', 'Błaszczyk', 'pawl!o17', 'KLMNa4'),
(2, 'Katarzyna', 'Kot', 'katt@i2', 'kUtti255');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa_produktu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `producent` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `kategoria` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa_produktu`, `cena`, `producent`, `ilosc`, `kategoria`) VALUES
(1, 'WĘDKA DAIWA NINJA X JIGGER 2.70M 7-28G', 219, 'Daiwa', 30, 'wędki'),
(2, 'Wędka SAVAGE GEAR SG2 Medium Game 251cm 12-35g', 278, 'SAVAGE GEAR', 7, 'wędki'),
(3, 'Wędka Spin Jaxon Grey Stream 2,65m 10-40g', 120, 'Jaxon', 35, 'wędki'),
(4, 'Wędka spinning Dragon Black Rock II 275cm 10-35g', 289, 'Dragon', 17, 'wędki'),
(5, 'Wędka SHIMANO TECHNIUM AX Spinning 2,33m 7-21g ', 479, 'Shimano', 15, 'wędki'),
(6, 'KOŁOWROTEK DAIWA NINJA LT 5000-C SPINNINGOWY', 239, 'Daiwa', 11, 'kołowrotki'),
(7, 'Kołowrotek spinningowy Dragon Black Rock FD5 3000', 111, 'Dragon', 11, 'kołowrotki'),
(8, 'Kołowrotek Jaxon Element QX300', 215, 'Jaxon', 33, 'kołowrotki'),
(9, 'KOŁOWROTEK SAVAGE GEAR SG8 4000FD', 615, 'Savage Gear', 19, 'kołowrotki'),
(10, 'Kołowrotek Vanford C3000 HG Shimano', 888, 'Shimano', 22, 'kołowrotki'),
(11, 'ŻYŁKA DRAGON MILLENIUM SZCZUPAK 200m 0.22mm 5,98kg', 16.9, 'Dragon', 52, 'żyłki'),
(12, 'ŻYŁKA TRABUCCO T-FORCE SPINNING PIKE 0,25MM / 150M  8,36 kg', 24, 'Trabucco', 34, 'żyłki'),
(13, 'Żyłka Gamakatsu Super G-Line 0.30mm 150m 7,96kg', 37.9, 'Gamakatsu', 15, 'żyłki'),
(14, 'Żyłka Mistrall Admunson Spin 0,20mm 150m 5,90kg', 12.5, 'Mistrall', 16, 'żyłki'),
(15, 'ŻYŁKA SPINNINGOWA DRAGON HM80 0,22mm/6,37kg/150m', 28.9, 'Dragon', 44, 'żyłki'),
(16, 'Plecionki SHIMANO Kairiki 150m Steel Green 0,19MM / 12,0KG', 75, 'Shimano', 25, 'plecionki'),
(17, 'Plecionka Daiwa J-Braid Grand X8 135m, Chartreuse 0,10MM / 7,0KG ', 64, 'Daiwa', 18, 'plecionki'),
(18, 'Plecionka Savage Gear HD8 Silencer 0,15mm/300m 9kg', 154, 'Savage Gear', 8, 'plecionki'),
(19, 'Plecionka Konger Braider X8 0,18mm/150m 21,40 kg, Black', 48, 'Konger', 31, 'plecionki'),
(20, 'Plecionka Cormoran 0,25mm/135m 14,3 kg Corastrong Zielona', 24, 'Cormoran', 35, 'plecionki'),
(21, 'Przypony wolframowe KONGER 25CM/12KG OP.2SZT', 4, 'Konger', 60, 'przypony'),
(22, 'Przypon wolframowy Lithanium Mikado 25cm 10kg', 4.5, 'Mikado', 52, 'przypony'),
(23, 'PRZYPONY WOLFRAMOWE Jaxon 2 szt 35 cm/10 kg', 5, 'Jaxon', 43, 'przypony'),
(24, 'Przypony Wolframowe Konger 2 szt 20 cm / 10 kg', 5, 'Konger', 38, 'przypony'),
(25, 'Przypon wolframowy Lithanium Mikado 25cm 10kg', 4.2, 'Mikado', 27, 'przypony'),
(26, 'WOBLER KARAŚ JAXON NA SZCZUPAKA 9cm 17g', 17, 'Jaxon', 8, 'woblery'),
(27, 'WOBLER VALADER JAXON SZCZUPAK 9cm 20g', 21.5, 'Jaxon', 18, 'woblery'),
(28, 'WOBLER PIKE X ŁAMANY JAXON NA SZCZUPAKA 12,5cm 19g', 23.5, 'Jaxon', 12, 'woblery'),
(29, 'Wobler Rapala Countdown GFR 11cm 16 g', 35.5, 'Rapala', 22, 'woblery'),
(30, 'Wobler Rapala BX Minnow HH 10cm 12 g', 4.5, 'Rapala', 25, 'woblery');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `data_zamowienia` date NOT NULL,
  `realizacja` text COLLATE utf8_polish_ci NOT NULL,
  `do_zaplaty` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`id_administratora`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `id_administratora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
