<!DOCTYPE html>
<html lang="en">
<head>
<title>Person</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<?php include 'mysql_queries.php'; ?>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Medicare Number</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>

<?php

$listPeople = [[
    "person_id" => 1,
    "fname" => "John",
    "lname" => "Smith",
    "date_of_birth" => "1990-07-31",
    "age" => 31,
    "medicare_card_number" => "SMIJ 9007 3132",
    "telephone" => "123-345-4567",
    "email" => "john.smith@gmail.com"
],
[
    "person_id" => 2,
    "fname" => "Johnny",
    "lname" => "Smithy",
    "date_of_birth" => "1980-07-31",
    "age" => 41,
    "medicare_card_number" => "SMIY 8007 3132",
    "telephone" => "987-765-6543",
    "email" => "johnny.smithy@gmail.com"
]];

foreach($listPeople as $person)
{
?>  <tr>
        <td><?php print($person["fname"]); ?></td>
        <td><?php print($person["lname"]); ?></td>
        <td><?php print($person["date_of_birth"]); ?></td>
        <td><?php print($person["age"]); ?></td>
        <td><?php print($person["medicare_card_number"]); ?></td>
        <td><?php print($person["telephone"]); ?></td>
        <td><?php print($person["email"]); ?></td>
        
<?php
    $detailsLink = "person_details.php?person=" . $person["person_id"];
    $editLink = "person_edit.php?person=" . $person["person_id"];
?>      <td><a href="<?php print($detailsLink); ?>">Details</a> <a href="<?php print($editLink); ?>">Edit</a></td>
    </tr>
<?php
}

?>

</table>

<?php test(); ?>


<?php include 'tail.php'; ?>