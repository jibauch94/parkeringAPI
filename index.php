<?php
/**
 * Created by PhpStorm.
 * User: jibba_000
 * Date: 31-10-2017
 * Time: 09:17
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3600">
    <title>Parkering API</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h1>Ledige p-pladser i Århus</h1>

<?php


function pApi()
{

    // Start cURL
    $ch = curl_init();
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, 'http://www.odaa.dk/api/action/datastore_search?resource_id=2a82a145-0195-4081-a13c-b0e587e9b89c');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'min pApi');
    // Parse result
    $result = curl_exec($ch);
    // Close connection when done
    curl_close($ch);
    // Return our decoded result
    return json_decode($result, 1);
}
// Test CVRAPI
//print_r( parkeringapi('records') );
//print_r("Her ses ledige p-pladser i Århus parkeringshuse: ");

//opretter tabel


echo "<div>
    <br>
    <table>
        <thead>
        <tr>
            <th>Parkeringssted</th>
            <th>totalspaces</th>
            <th>vehicleCount</th>
            <th>date</th>
            </tr>
        </thead>
        <tr>";

for($i=0; $i<11; $i++) {

echo "<td>" . (pApi()["result"]["records"][$i]["garageCode"] . "</td>");
echo "<td>" . (pApi()["result"]["records"][$i]["totalSpaces"] . "</td>");
echo "<td>" . (pApi()["result"]["records"][$i]["vehicleCount"] . "</td>");
echo "<td>" . (pApi()["result"]["records"][$i]["date"] . "</td>");
echo "<tr>";
}
echo"
        </tr>
    </table>
</div>";

?>

</body>
</html>
