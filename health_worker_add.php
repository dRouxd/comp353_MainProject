<?php include 'mysql_queries.php'; ?>
<?php

if(array_key_exists("save", $_POST))
{
    #TODO: Send the new health worker to the database and get the eid back
    
    $eid = 1;
    
    header("Location: health_worker_edit.php?eid=" . $eid);
    die();
}

# TODO: Get list of non health workers from mysql
$listPeople = [[
    "person_id" => 1,
    "name" => "John Smith"
],
[
    "person_id" => 2,
    "name" => "Johnny Smithy"
]];


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Health Worker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>

<h3>Health Worker Details</h3>
<form class="inForm" action="/health_worker_add.php"  method="post">
    <p class="inForm">
        <label class="inForm" for="person">Person: </label>
        <select class="inForm" name="person" id="person">
<?php
foreach($listPeople as $p)
{
?>           <option value="<?php print($p["person_id"]); ?>"><?php print($p["name"]); ?></option>
<?php
}
?>
        </select>
    </p>
    <input type="submit" name="save" value="Save"/>
</form>

<?php include 'tail.php'; ?>










