-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql.ct8.pl
-- Czas generowania: 20 Lis 2021, 17:36
-- Wersja serwera: 8.0.26
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
  `id_administratora` int NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `id_konta` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `administratorzy`
--

INSERT INTO `administratorzy` (`id_administratora`, `imie`, `nazwisko`, `id_konta`) VALUES
(1, 'Jakub', 'Łuka', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int NOT NULL,
  `nazwa_kategorii` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id_klienta` int NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_tel` varchar(9) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `kod_pocztowy` int NOT NULL,
  `miasto` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ulica` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_domu` varchar(4) NOT NULL,
  `nr_lokalu` varchar(4) NOT NULL,
  `id_konta` int DEFAULT NULL,
  `czy_zweryfikowany` tinyint(1) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `nr_tel`, `e_mail`, `kod_pocztowy`, `miasto`, `ulica`, `nr_domu`, `nr_lokalu`, `id_konta`, `czy_zweryfikowany`, `token`) VALUES
(9, 'test', 'test', '111111111', 'luka.jakub@interia.pl', 8, 'test', 'texs', '1', '1', 7, 0, '8d19ae603b9bfc9f3e8097cfce9faddc61bf80b0'),
(11, 'aaa', 'aaa', '553333333', 'jakub.luka16@gmail.com', 8, 'fdhdfh', 'dfhdfh', '3', '3', 9, 0, 'e10537f0b8fb43340db0d5fab59de2dccd91e0b0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id_konta` int NOT NULL,
  `id_uprawnienia` int NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`id_konta`, `id_uprawnienia`, `login`, `haslo`) VALUES
(7, 3, 'test', '$2y$10$B9YA1PS3UGZC1lBraCwewum'),
(9, 3, 'aaa', '$2y$10$8cUN8ds764FzZueJ//H1TuBpAWe0KX8WdPByWNe/CeWcwaL8DdluG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_koszyk` int NOT NULL,
  `id_produktu` int NOT NULL,
  `id_klienta` int NOT NULL,
  `ilosc_zamowionego` int NOT NULL,
  `cena_zamowionego` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `id_konta` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `imie`, `nazwisko`, `id_konta`) VALUES
(1, 'Paweł', 'Błaszczyk', NULL),
(2, 'Katarzyna', 'Kot', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int NOT NULL,
  `id_kategorii` int DEFAULT NULL,
  `nazwa_produktu` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `producent` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int NOT NULL,
  `zdjecie_p` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `id_kategorii`, `nazwa_produktu`, `cena`, `producent`, `ilosc`, `zdjecie_p`) VALUES
(1, NULL, 'WĘDKA DAIWA NINJA X JIGGER 2.70M 7-28G', 219, 'Daiwa', 30, ''),
(2, NULL, 'Wędka SAVAGE GEAR SG2 Medium Game 251cm 12-35g', 278, 'SAVAGE GEAR', 7, ''),
(3, NULL, 'Wędka Spin Jaxon Grey Stream 2,65m 10-40g', 120, 'Jaxon', 35, ''),
(4, NULL, 'Wędka spinning Dragon Black Rock II 275cm 10-35g', 289, 'Dragon', 17, ''),
(5, NULL, 'Wędka SHIMANO TECHNIUM AX Spinning 2,33m 7-21g ', 479, 'Shimano', 15, ''),
(6, NULL, 'KOŁOWROTEK DAIWA NINJA LT 5000-C SPINNINGOWY', 239, 'Daiwa', 11, ''),
(7, NULL, 'Kołowrotek spinningowy Dragon Black Rock FD5 3000', 111, 'Dragon', 11, ''),
(8, NULL, 'Kołowrotek Jaxon Element QX300', 215, 'Jaxon', 33, ''),
(9, NULL, 'KOŁOWROTEK SAVAGE GEAR SG8 4000FD', 615, 'Savage Gear', 19, ''),
(10, NULL, 'Kołowrotek Vanford C3000 HG Shimano', 888, 'Shimano', 22, ''),
(11, NULL, 'ŻYŁKA DRAGON MILLENIUM SZCZUPAK 200m 0.22mm 5,98kg', 16.9, 'Dragon', 52, ''),
(12, NULL, 'ŻYŁKA TRABUCCO T-FORCE SPINNING PIKE 0,25MM / 150M  8,36 kg', 24, 'Trabucco', 34, ''),
(13, NULL, 'Żyłka Gamakatsu Super G-Line 0.30mm 150m 7,96kg', 37.9, 'Gamakatsu', 15, ''),
(14, NULL, 'Żyłka Mistrall Admunson Spin 0,20mm 150m 5,90kg', 12.5, 'Mistrall', 16, ''),
(15, NULL, 'ŻYŁKA SPINNINGOWA DRAGON HM80 0,22mm/6,37kg/150m', 28.9, 'Dragon', 44, ''),
(16, NULL, 'Plecionki SHIMANO Kairiki 150m Steel Green 0,19MM / 12,0KG', 75, 'Shimano', 25, ''),
(17, NULL, 'Plecionka Daiwa J-Braid Grand X8 135m, Chartreuse 0,10MM / 7,0KG ', 64, 'Daiwa', 18, ''),
(18, NULL, 'Plecionka Savage Gear HD8 Silencer 0,15mm/300m 9kg', 154, 'Savage Gear', 8, ''),
(19, NULL, 'Plecionka Konger Braider X8 0,18mm/150m 21,40 kg, Black', 48, 'Konger', 31, ''),
(20, NULL, 'Plecionka Cormoran 0,25mm/135m 14,3 kg Corastrong Zielona', 24, 'Cormoran', 35, ''),
(21, NULL, 'Przypony wolframowe KONGER 25CM/12KG OP.2SZT', 4, 'Konger', 60, ''),
(22, NULL, 'Przypon wolframowy Lithanium Mikado 25cm 10kg', 4.5, 'Mikado', 52, ''),
(23, NULL, 'PRZYPONY WOLFRAMOWE Jaxon 2 szt 35 cm/10 kg', 5, 'Jaxon', 43, ''),
(24, NULL, 'Przypony Wolframowe Konger 2 szt 20 cm / 10 kg', 5, 'Konger', 38, ''),
(25, NULL, 'Przypon wolframowy Lithanium Mikado 25cm 10kg', 4.2, 'Mikado', 27, ''),
(26, NULL, 'WOBLER KARAŚ JAXON NA SZCZUPAKA 9cm 17g', 17, 'Jaxon', 8, ''),
(27, NULL, 'WOBLER VALADER JAXON SZCZUPAK 9cm 20g', 21.5, 'Jaxon', 18, ''),
(28, NULL, 'WOBLER PIKE X ŁAMANY JAXON NA SZCZUPAKA 12,5cm 19g', 23.5, 'Jaxon', 12, ''),
(29, NULL, 'Wobler Rapala Countdown GFR 11cm 16 g', 35.5, 'Rapala', 22, ''),
(30, NULL, 'Wobler Rapala BX Minnow HH 10cm 12 g', 4.5, 'Rapala', 25, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `id_uprawnienia` int NOT NULL,
  `nazwa_uprawnienia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `uprawnienia`
--

INSERT INTO `uprawnienia` (`id_uprawnienia`, `nazwa_uprawnienia`) VALUES
(1, 'administrator'),
(2, 'pracownik'),
(3, 'klient');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int NOT NULL,
  `id_klienta` int NOT NULL,
  `data_zamowienia` date NOT NULL,
  `realizacja` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `do_zaplaty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkt`
--

CREATE TABLE `zamowienia_produkt` (
  `id_zamowienia_produkt` int NOT NULL,
  `id_produktu` int NOT NULL,
  `id_zamowienia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`id_administratora`),
  ADD KEY `indeks_administratora` (`id_konta`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`),
  ADD UNIQUE KEY `unikalny_email` (`e_mail`),
  ADD KEY `indeks_konta` (`id_klienta`),
  ADD KEY `FK_KONTO_KLIENTA` (`id_konta`);

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id_konta`),
  ADD UNIQUE KEY `unikalny_login` (`login`),
  ADD KEY `id_uprawnienia` (`id_uprawnienia`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_koszyk`),
  ADD UNIQUE KEY `indeks_klienta` (`id_klienta`),
  ADD KEY `indeks_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`),
  ADD KEY `indeks_pracownicy` (`id_konta`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `indeks_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`id_uprawnienia`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `indeks_klienta` (`id_klienta`);

--
-- Indeksy dla tabeli `zamowienia_produkt`
--
ALTER TABLE `zamowienia_produkt`
  ADD PRIMARY KEY (`id_zamowienia_produkt`),
  ADD KEY `indeks_produktu` (`id_produktu`),
  ADD KEY `indeks_zamowienia` (`id_zamowienia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `id_administratora` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `id_konta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id_koszyk` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD CONSTRAINT `FK_KONTO_ADMINISTRATORA` FOREIGN KEY (`id_konta`) REFERENCES `konta` (`id_konta`);

--
-- Ograniczenia dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD CONSTRAINT `FK_KONTO_KLIENTA` FOREIGN KEY (`id_konta`) REFERENCES `konta` (`id_konta`);

--
-- Ograniczenia dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `FK_ROLE_KONTA` FOREIGN KEY (`id_uprawnienia`) REFERENCES `uprawnienia` (`id_uprawnienia`);

--
-- Ograniczenia dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `FK_KOSZYK_KLIENTA` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`),
  ADD CONSTRAINT `FK_KOSZYK_PRODUKT` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`);

--
-- Ograniczenia dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `FK_KONTO_PRACOWNIKA` FOREIGN KEY (`id_konta`) REFERENCES `konta` (`id_konta`);

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `FK_PRODUKT_KATEGORIA` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id_kategorii`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ograniczenia dla tabeli `zamowienia_produkt`
--
ALTER TABLE `zamowienia_produkt`
  ADD CONSTRAINT `FK_ZAOWIENIA_PRODUKT_PRODUKT` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`),
  ADD CONSTRAINT `FK_ZAOWIENIA_PRODUKT_ZAMOWIENIA` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id_zamowienia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
