<?php
include "lidhja.php";

/* ===== 01 - Fatura e librarise ===== */
$cmimiLibri = 12.50;  $sasiaLibra = 3;
$cmimiFletore = 1.80; $sasiaFletore = 4;
$kostoLibra   = $cmimiLibri * $sasiaLibra;
$kostoFletore = $cmimiFletore * $sasiaFletore;
$totali1 = $kostoLibra + $kostoFletore;
$totali1 += 2.50; // transporti

/* ===== 02 - Rezultati i vleresimit ===== */
$aktiviteti = 18; $projekti = 24; $provimi = 43;
$totaliPikeve = $aktiviteti + $projekti + $provimi; // maksimumi = 100, pra edhe perqindja
$provimi = 48; // korrigjimi i provimit
$totaliRi = $aktiviteti + $projekti + $provimi;

/* ===== 03 - Buxheti i udhetimit ===== */
$akomodimi = 96; $transporti = 42; $ushqimi = 57;
$totali3 = $akomodimi + $transporti + $ushqimi;
$persekush = $totali3 / 3;
$mbetja3 = 80 - $persekush;

/* ===== 04 - Porosia online me zbritje ===== */
$paraZbritjes = (2 * 35) + (1 * 24);
$zbritja = $paraZbritjes * 0.15;
$pasZbritjes = $paraZbritjes - $zbritja;
$finale4 = $pasZbritjes + 4; // transporti

/* ===== 05 - Konvertimi i te dhenave ===== */
$a = "25"; $b = "17"; $c = "8";
// Ne PHP + mbledh gjithmone si numra, prandaj per "bashkimin" si tekst perdorim piken (.)
$siTekst = $a . $b . $c;                 // "25178"
$shuma5 = (int)$a + (int)$b + (int)$c;   // 50
$mesatarja5 = $shuma5 / 3;
$tipi5 = gettype($shuma5);               // integer

/* ===== 06 - Analiza e kohes se studimit ===== */
$min = 95 + 80 + 115;
$ore = $min / 60;
$mbetjaMin = $min % 60;

/* ===== 07 - Inventari i dyqanit ===== */
$stoku = 120;
$stoku -= 18;
$stoku -= 27;
$stoku += 35;
$vleraStokut = $stoku * 6.75;

/* ===== 08 - Shperndarja e materialeve ===== */
$flete = 157;
$grupet = intval($flete / 6);
$mbetja8 = $flete % 6;
$kontrolli = ($grupet * 6) + $mbetja8;

/* ===== 09 - Fatura me te dhena tekstuale ===== */
$cmimi1 = (float)"19.90"; $cmimi2 = (float)"8.50";
$art1 = $cmimi1 * 2;
$art2 = $cmimi2 * 3;
$shuma9 = $art1 + $art2;
$meTarife = $shuma9 * 1.10; // +10%
$finale9 = number_format($meTarife, 2, '.', ''); // "71.83" -> tekst
$tipi9 = gettype($finale9); // string

/* ===== 10 - Raporti financiar ===== */
$teArdhurat = 45 * 12;
$shpenzimet = 180 + 95 + 60;
$diferenca = $teArdhurat - $shpenzimet;
$shpenzimet += 25; // te paparashikuara
$diferencaRe = $teArdhurat - $shpenzimet;

/* ===== Te gjitha ushtrimet ne nje varg ===== */
$ushtrimet = [
  ["01 - Fatura e librarise", [
      "Libra: $sasiaLibra x 12.50 € = ".number_format($kostoLibra,2)." €",
      "Fletore: $sasiaFletore x 1.80 € = ".number_format($kostoFletore,2)." €",
      "Transporti: +2.50 €",
      "TOTALI: ".number_format($totali1,2)." €"
  ], number_format($totali1,2)." €"],

  ["02 - Rezultati i vleresimit", [
      "Totali fillestar: $totaliPikeve pike ($totaliPikeve%)",
      "Pas korrigjimit (provimi 48): $totaliRi pike ($totaliRi%)"
  ], "$totaliRi pike"],

  ["03 - Buxheti i udhetimit", [
      "Kostoja totale: ".number_format($totali3,2)." €",
      "Secili paguan: ".number_format($persekush,2)." €",
      "Secilit i mbeten: ".number_format($mbetja3,2)." € nga buxheti 80 €"
  ], number_format($persekush,2)." €/person"],

  ["04 - Porosia online me zbritje", [
      "Para zbritjes: ".number_format($paraZbritjes,2)." €",
      "Zbritja 15%: ".number_format($zbritja,2)." €",
      "Pas zbritjes: ".number_format($pasZbritjes,2)." €",
      "Me transport (+4 €): ".number_format($finale4,2)." €"
  ], number_format($finale4,2)." €"],

  ["05 - Konvertimi i te dhenave", [
      "Pa konvertim (si tekst me .): $siTekst",
      "Me Number/(int): shuma = $shuma5",
      "Mesatarja: ".number_format($mesatarja5,2),
      "Tipi i shumes: $tipi5"
  ], "Shuma $shuma5 ($tipi5)"],

  ["06 - Analiza e kohes se studimit", [
      "Gjithsej: $min minuta",
      "Ne ore: ".round($ore,2)." ore",
      "Mbetja (min % 60): $mbetjaMin minuta"
  ], "$min min / ".round($ore,2)." ore"],

  ["07 - Inventari i dyqanit", [
      "Fillimi: 120 njesi",
      "Pas shitjes 1 (-18): 102 njesi",
      "Pas shitjes 2 (-27): 75 njesi",
      "Pas furnizimit (+35): $stoku njesi",
      "Vlera e stokut: ".number_format($vleraStokut,2)." €"
  ], "$stoku njesi = ".number_format($vleraStokut,2)." €"],

  ["08 - Shperndarja e materialeve", [
      "Grupe te plota prej 6: $grupet",
      "Flete te mbetura: $mbetja8",
      "Kontrolli (grupet*6 + mbetja): $kontrolli"
  ], "$grupet grupe, mbetja $mbetja8"],

  ["09 - Fatura me te dhena tekstuale", [
      "Artikulli 1 (19.90 x2): ".number_format($art1,2)." €",
      "Artikulli 2 (8.50 x3): ".number_format($art2,2)." €",
      "Shuma e porosise: ".number_format($shuma9,2)." €",
      "Me tarife 10% (toFixed): $finale9 €",
      "Tipi i vleres finale: $tipi9"
  ], "$finale9 € ($tipi9)"],

  ["10 - Raporti financiar", [
      "Te ardhurat: ".number_format($teArdhurat,2)." €",
      "Diferenca fillestare: ".number_format($diferenca,2)." €",
      "Pas shpenzimeve +25 €: diferenca = ".number_format($diferencaRe,2)." €"
  ], "Diferenca ".number_format($diferencaRe,2)." €"],
];

/* ===== Ruajtja ne databaze ===== */
foreach ($ushtrimet as $u) {
    $titull = $conn->real_escape_string($u[0]);
    $vlera  = $conn->real_escape_string($u[2]);
    $conn->query("INSERT INTO rezultatet (ushtrimi, rezultati)
                  VALUES ('$titull', '$vlera')
                  ON DUPLICATE KEY UPDATE rezultati = '$vlera'");
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ushtrimet - PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Ushtrimet - Zgjidhjet ne PHP</h1>
    <p>Dizajni dhe Zhvillimi i Uebit</p>
</header>

<main>
    <?php foreach ($ushtrimet as $u): ?>
        <section class="karta">
            <h2><?php echo $u[0]; ?></h2>
            <?php foreach ($u[1] as $rresht): ?>
                <p><?php echo $rresht; ?></p>
            <?php endforeach; ?>
        </section>
    <?php endforeach; ?>
</main>

</body>
</html>
<?php $conn->close(); ?>