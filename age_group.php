<?php include 'mysql_queries.php'; ?>
<?php

$ageGroups = [
    ["ageGroupNumber" => "1", "lowerBound" => "80", "upperBound" => "200"],
    ["ageGroupNumber" => "2", "lowerBound" => "70", "upperBound" => "79"],
    ["ageGroupNumber" => "3", "lowerBound" => "60", "upperBound" => "69"],
    ["ageGroupNumber" => "4", "lowerBound" => "50", "upperBound" => "59"],
    ["ageGroupNumber" => "5", "lowerBound" => "40", "upperBound" => "49"],
    ["ageGroupNumber" => "6", "lowerBound" => "30", "upperBound" => "39"],
    ["ageGroupNumber" => "7", "lowerBound" => "18", "upperBound" => "29"],
    ["ageGroupNumber" => "8", "lowerBound" => "12", "upperBound" => "17"],
    ["ageGroupNumber" => "9", "lowerBound" => "5", "upperBound" => "11"],
    ["ageGroupNumber" => "10", "lowerBound" => "0", "upperBound" => "4"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Age Group</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p><a href="age_group_edit.php">Edit</a></p>
<h3>Age Group</h3>
<table class="default">
    <tr class="default">
        <th class="default">Age Group</th>
        <th class="default">Age Lower Bound</th>
        <th class="default">Age Upper Bound</th>
    </tr>

<?php

foreach($ageGroups as $age)
{
?>  <tr class="default">
        <td class="default"><?php print($age["ageGroupNumber"]); ?></td>
        <td class="default"><?php print($age["lowerBound"]); ?></td>
        <td class="default"><?php print($age["upperBound"]); ?></td>
    </tr>
<?php
}

?>
</table>

<?php include 'tail.php'; ?>











