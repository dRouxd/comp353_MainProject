<!DOCTYPE html>
<html lang="en">
<head>
<title>Person Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<?php include 'mysql_queries.php'; ?>

<?php

$person_id = $_GET["person"];

$person = 
[
    "person_id" => 2,
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



?>

<form class="inForm">
    <p class="inForm">
        <label class="inForm" for="">SSN: </label>
        <input class="inForm" id="" type="text" value="test">
    </p>
    <p class="inForm">
        <label class="inForm" for="">Date of Birth: </label>
        <input class="inForm" id="" type="text" value="test">
    </p>
</form>

<?php include 'tail.php'; ?>










