<?php include 'mysql_queries.php'; ?>
<?php
    if($_POST["run"] == "Run")
    {
        $mysql = $_POST["sql"];
        $result = test_query($mysql); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Test Query</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Test Query</h3>

<form action="test_query.php" method="post">
    <input type="submit" name="run" value="Run"/>
    <input type="text" name="sql" value="<?php if($mysql) print($mysql);?>"/>
</form>

<?php
    
if($result)
{
    print_r($result);
    die();
?>
<table class="default">
    <tr class="default">
<?php
    foreach($k in array_keys())
    {
?>
        <td class="default"><?php print($k); ?></td>
<?
    }
?>
    </tr>
<?php
?>
</table>
<?php
}
 
?>


<?php include 'tail.php'; ?>