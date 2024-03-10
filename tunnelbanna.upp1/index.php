<?php
$line19 = ['Hagsätra', 'Rågsved',  'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan',
'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$fromStation, $toStation] = [$_POST['fromStation'], $_POST['toStation']];
    $stationsCount = abs(array_search($fromStation, $line19) - array_search($toStation, $line19));
    $estimatedTravelTime = $stationsCount * 3;
    $expectedArrivalTime = date('H:i', time() + ($stationsCount * 180));
    echo "Stations: $stationsCount, Time taken: $estimatedTravelTime minutes, Time arriving: $expectedArrivalTime";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css">
    <title>Train Times</title>
</head>
<body>

<h1>Tågstationer</h1>

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

    <button type="submit">Check Times</button>
</form>

</body>
</html>