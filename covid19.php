
<?php
require_once 'php/google-api-php-client/vendor/autoload.php';
//require_once 'vendor/autoload.php';
session_start();
$userID = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>COVID19 Condition</title>
    <meta charset='UTF-8'>

    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' type='text/css' href='/css/style.css'>

</head>
<body>

<div id='header'>
    COVID19 Condition
</div>

<div class='content'>

    <?php
    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->addScope(Google_Service_Bigquery::BIGQUERY);
    $bigquery = new Google_Service_Bigquery($client);
    $projectId = 'task2-272810';

    $country =$_POST["country"];
    $date = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];

    $request = new Google_Service_Bigquery_QueryRequest();
    $str = '';

    $request->setQuery("SELECT countries_and_territories,date,confirmed_cases,deaths FROM [bigquery-public-data.covid19_ecdc.covid_19_geographic_distribution_worldwide] where countries_and_territories= '$country' and year= $year and day= $date and month=$month  ");


    $response = $bigquery->jobs->query($projectId, $request);
    $rows = $response->getRows();

    $str = "<table>".
        "<tr>" .
        "<th>Country</th>" .
        "<th>Date</th>" .
        "<th>Confirmed Cases</th>" .
        "<th>Deaths</th>" .
        "</tr>";

    foreach ($rows as $row)
    {
        $str .= "<tr>";

        foreach ($row['f'] as $field)
        {
            $str .= "<td>" . $field['v'] . "</td>";
        }
        $str .= "</tr>";
    }

    $str .= '</table></div>';

    echo $str;

    $handle = fopen('gs://userhistory-storage/searches'.date("Y-m-d h:i:sa").'.txt','w');

    fwrite($handle, $userID." searched at ".date("Y-m-d h:i:sa")." - "."Country : ".$country.", Day : ".$date.", Month: ".$month.", Year : ".$year);

    fclose($handle);

    ?>
</div>
</body>
</html>