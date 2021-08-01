<?php include 'mysql_queries.php'; ?>
<?php
$person_id = $_GET["person_id"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: vaccine_detail.php?person_id=" . $person_id);
    die();
}

# TODO: Get vaccine data from mysql
$vaccine = 
[
    "vaccine_id" => 1,
    "brand" => "moderna",
    "current_status" => "APPROVED",
    "description" => "moderna description"
];

# TODO: Get history received from mysql
$histories = 
[
    ["status" => "TESTING", "approved_date" => "2021-01-01", "end_date" => "2021-03-01"],
    ["status" => "APPROVED", "approved_date" => "2021-03-01", "end_date" => "null"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Vaccine Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>

<?php include 'head.php'; ?>
<h3>Details</h3>
<form class="inForm" action="/vaccine_edit.php?person=<?php print($person_id); ?>"  method="post">
    <input type="hidden" id="person_id" name="person_id" value="<?php print($person_id); ?>">
    <p class="inForm">
        <label class="inForm" for="brand">Brand: </label>
        <input class="inForm" name="brand" id="brand" type="brand" value="<?php print($vaccine["brand"]); ?>">
    </p>
    <p class="inForm">
        <label class="inForm" for="description">Description: </label>
        <input class="inForm" name="description" id="description" type="text" value="<?php print($vaccine["description"]); ?>">
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<h3>History</h3>
<table class="default">
    <tr class="default">
        <th class="default">Status</th>
        <th class="default">Approved Date</th>
        <th class="default">End Date</th>
    </tr>
<?php
foreach($histories as $history)
{
?>
    <tr class="default">
        <td class="default"><?php print($history["status"]); ?></td>
        <td class="default"><?php print($history["approved_date"]); ?></td>
        <td class="default"><?php print($history["end_date"]); ?></td>
    </tr>
<?php   
}
?>
</table>
<a href="add_vaccine_history.php?vaccine_id=<?php print($person_id); ?>">Add History</a>

<?php include 'tail.php'; ?>










