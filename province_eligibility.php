<?php include 'mysql_queries.php'; ?>
<?php

$provinces = [
    ["province" => "AB", "ageGroupNumber" => "4"],
    ["province" => "BC", "ageGroupNumber" => "5"],
    ["province" => "MB", "ageGroupNumber" => "7"],
    ["province" => "NB", "ageGroupNumber" => "4"],
    ["province" => "NL", "ageGroupNumber" => "6"],
    ["province" => "NS", "ageGroupNumber" => "9"],
    ["province" => "NT", "ageGroupNumber" => "2"],
    ["province" => "NU", "ageGroupNumber" => "4"],
    ["province" => "ON", "ageGroupNumber" => "7"],
    ["province" => "PE", "ageGroupNumber" => "5"],
    ["province" => "QC", "ageGroupNumber" => "6"],
    ["province" => "SK", "ageGroupNumber" => "8"],
    ["province" => "YT", "ageGroupNumber" => "9"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Province Eligibility</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p><a href="province_eligibility_edit.php">Edit</a></p>
<h3>Province Eligibility</h3>
<table class="default">
    <tr class="default">
        <th class="default">Province</th>
        <th class="default">Age Group Number</th>
    </tr>

<?php

foreach($provinces as $p)
{
?>  <tr class="default">
        <td class="default"><?php print($p["province"]); ?></td>
        <td class="default"><?php print($p["ageGroupNumber"]); ?></td>
    </tr>
<?php
}

?>
</table>

<?php include 'tail.php'; ?>











