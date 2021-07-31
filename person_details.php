<?php include 'mysql_queries.php'; ?>
<?php

$person_id = $_GET["person"];

# TODO: Get person data from mysql
$person = 
[
    "ssn" => "666999888",
    "fname" => "Johnny",
    "lname" => "Smithy",
    "date_of_birth" => "1980-07-31",
    "age" => 41,
    "medicare_card_number" => "SMIY 8007 3132",
    "telephone" => "987-765-6543",
    "email" => "johnny.smithy@gmail.com",
    "address" => "123 mapple street",
    "city" => "Montreal",
    "province" => "QC",
    "postal_code" => "1q2w3e",
    "citizenship" => "Canadian"
];

# TODO: Get Vaccines received from mysql
$vaccines = 
[
["vaccination_id" => "1", "dose_number" => 1, "vaccination_date" => "2021-02-01", "vaccine_id" => "1", "brand" => "moderna"],
["vaccination_id" => "2", "dose_number" => 2, "vaccination_date" => "2021-03-01", "vaccine_id" => "1", "brand" => "moderna"] 
];

# TODO: Get infections from mysql
$infections = 
[
["infection_id" => "1", "type" => "delta", "date_of_infection" => "2021-01-01"],
["infection_id" => "2", "type" => "omega", "date_of_infection" => "2021-01-02"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Person Detail</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>


<h3>Vaccinations</h3>
<table class="default">
    <tr class="default">
        <th class="default">Dose Number</th>
        <th class="default">Vaccination Date</th>
        <th class="default">Brand</th>
    </tr>
<?php
foreach($vaccines as $vaccine)
{
?>
    <tr class="default">
        <td class="default"><?php print($vaccine["dose_number"]); ?></td>
        <td class="default"><?php print($vaccine["vaccination_date"]); ?></td>
        <td class="default"><a href="vaccine_detail.php?vaccine_id=<?php print($vaccine["vaccine_id"]); ?>"><?php print($vaccine["brand"]); ?></a></td>
    </tr>
<?php   
}
?>
</table>

<h3>Infections</h3>

<table class="default">
    <tr class="default">
        <th class="default">Type</th>
        <th class="default">Date of Infection</th>
    </tr>
<?php
foreach($infections as $infection)
{
?>
    <tr class="default">
        <td class="default"><?php print($infection["type"]); ?></td>
        <td class="default"><?php print($infection["date_of_infection"]); ?></td>
    </tr>
<?php   
}
?>
</table>


<?php include 'tail.php'; ?>










