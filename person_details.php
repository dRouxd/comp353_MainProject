<!DOCTYPE html>
<html lang="en">
<head>
<title>Person Detail</title>
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

<p><a href="person_edit.php?person=<?php print($person_id); ?>">Edit</a></p>

<div class="inForm">
    <form>
        <label>SSN</label>
        <input type="" name=""></input></br>
        <label>First Name</label>
        <input type="" name=""></input></br>
        <label>Last Name</label>
        <input type="" name=""></input></br>
        <label>Date of Birth</label>
        <input type="" name=""></input></br>
        <label>Age</label>
        <input type="" name=""></input></br>
        <label>Medicare Card Number</label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        <label></label>
        <input type="" name=""></input></br>
        
    </form>
</div>

<?php include 'tail.php'; ?>










