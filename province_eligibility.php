<?php include 'mysql_queries.php'; ?>
<?php

$provinces = [
    ["province" => "AB", "age_group_number" => "4"],
    ["province" => "BC", "age_group_number" => "5"],
    ["province" => "MB", "age_group_number" => "7"],
    ["province" => "NB", "age_group_number" => "4"],
    ["province" => "NL", "age_group_number" => "6"],
    ["province" => "NS", "age_group_number" => "9"],
    ["province" => "NT", "age_group_number" => "2"],
    ["province" => "NU", "age_group_number" => "4"],
    ["province" => "ON", "age_group_number" => "7"],
    ["province" => "PE", "age_group_number" => "5"],
    ["province" => "QC", "age_group_number" => "6"],
    ["province" => "SK", "age_group_number" => "8"],
    ["province" => "YT", "age_group_number" => "9"]
];

$provinces = getListProvince();

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
        <td class="default"><?php print($p["age_group_number"]); ?></td>
    </tr>
<?php
}

?>
</table>

<?php include 'tail.php'; ?>











