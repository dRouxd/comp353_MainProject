<?php include 'mysql_queries.php'; ?>
<?php
$eid = $_GET["eid"];

if(array_key_exists("save", $_POST))
{
    #TODO: Send the updated data to the mysql
    
    header("Location: health_worker_detail.php?eid=" . $eid);
    die();
}

# TODO: Get health worker data from mysql
$healthWorker = [
    "person_id" => "1",
    "name" => "Matilda Grouch",
    "isManager" => true
];

$histories = [
["facility_id" => "1", "name" => "CHUM", "start_date" => "2021-01-02", "end_date" => "2021-01-05"],
["facility_id" => "2", "name" => "CHUM2", "start_date" => "2021-01-02", "end_date" => "null"]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Health Worker Edit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<p>
<a href="person_edit.php?person_id=<?php print($healthWorker["person_id"]); ?>">Person Edit</a> <a href="health_worker_delete.php?eid=<?php print($eid); ?>">Delete</a>
</p>
<h3>Edit</h3>
<form class="inForm" action="/person_edit.php?person_id=<?php print($person_id); ?>"  method="post">
    <p class="inForm">
        <label class="inForm" for="isManager">Is Manager: </label>
        <input class="inForm" name="isManager" id="isManager" type="checkbox" <?php if($healthWorker["isManager"]) print("checked"); ?>>
    </p>
</form>


<h3>History</h3>
<table class="default">
    <tr class="default">
        <th class="default">Facility</th>
        <th class="default">Start Date</th>
        <th class="default">End Date</th>
    </tr>
<?php
foreach($histories as $history)
{
?>
    <tr class="default">
        <td class="default"><a href="hso_detail.php?facility_id=<?php print($history["facility_id"]); ?>"><?php print($history["name"]); ?></a></td>
        <td class="default"><?php print($history["start_date"]); ?></td>
        <td class="default"><?php print($history["end_date"]); ?></td>
    </tr>
<?php   
}
?>
</table>

<?php include 'tail.php'; ?>










