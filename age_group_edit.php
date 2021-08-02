<?php include 'mysql_queries.php'; ?>
<?php
$facility_id = $_GET["facility_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccination_facility_detail.php?facility_id=" . $facility_id);
    die();
}

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
<title>Age Group Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Age Group Edit</h3>
<form class="inForm" action="/age_group_edit.php"  method="post">
    
<?php
foreach($ageGroups as $age)
{
?>
    <p class="inForm">
        <label class="inForm">Age Group <?php print($age["ageGroupNumber"]); ?>: </label>
        <input class="inForm" name="lowerbound<?php print($age["ageGroupNumber"]); ?>" type="number" value="<?php print($age["lowerBound"]); ?>">
        <input class="inForm" name="upperbound<?php print($age["ageGroupNumber"]); ?>" type="number" value="<?php print($age["upperBound"]); ?>">
    </p>
<?php
}
?>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










