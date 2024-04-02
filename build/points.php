
<?php
require __DIR__ . '../../vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets and PHP');
$client->setDeveloperKey('AIzaSyBy2cvZL1mVzYnd0Mr-PJyIw8dMNEg90Mo'); // Replace with your API key

$service = new Google_Service_Sheets($client);
$spreadsheetId = '1r_wzSk9ryctTmNOxmkH7Mm_PWZysAy_3gm2fEXH95gM'; // Replace with your Spreadsheet ID
$range = 'Sheet1'; // Replace with your Range

try {
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();

    if (empty($values)) {
        print "No data found.\n";
    } else {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Score</th></tr>"; // Modify headers based on your sheet's columns
        foreach ($values as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "\n";
}
?>