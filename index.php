<?php
// Det här är en Array för tågstationer
$line19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
    'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

// Det här kontrollerar att formuläret skickas med post metod
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hämtar dom stationer som jag har valt
    [$fromStation, $toStation] = [$_POST['fromStation'], $_POST['toStation']];

    // Det här delen beräknar hur lång tid det kommer att ta + stationer
    $stationsCount = abs(array_search($fromStation, $line19) - array_search($toStation, $line19));
    $estimatedTravelTime = $stationsCount * 3;

    // Det här kommer att räkna förväntad tid som är bestämt på 3 minuter
    $expectedArrivalTime = date('H:i', time() + ($stationsCount * 180));

    // Visa resultatet
    echo "Stationer: $stationsCount, Tid tagen: $estimatedTravelTime minuter, Ankomsttid: $expectedArrivalTime";
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tågtider</title>
</head>
<body>

<h1>Tågstationer</h1>

<!-- Här är grejen där man väljer från och till vilken station-->
<form method="post" action="">
    <label for="fromStation">Från:</label>
    <select name="fromStation" id="fromStation">
        <?php foreach ($line19 as $station): ?>
            <option><?= $station ?></option>
        <?php endforeach; ?>
    </select>

    <label for="toStation">Till:</label>
    <select name="toStation" id="toStation">
        <?php foreach ($line19 as $station): ?>
            <option><?= $station ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Kolla tider</button>
</form>

</body>
</html>
