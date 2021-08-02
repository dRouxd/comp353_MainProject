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
    <input type="text" name="sql" value="<?php if($mysql) print($mysql);?>" width="600px"/>
</form>

<?php
    
if($result)
{
    if(count($result) == 0)
    {
        print("No Results.");
    }
    else
    {
?>
<table class="default">
    <tr class="default">
<?php
        $keys = array_keys($result[0]);
        foreach($keys as $k)
        {
?>
        <td class="default"><?php print($k); ?></td>
<?
        }
?>
    </tr>
<?php
        foreach($result as $row)
        {
?>
    <tr class="default">
<?php
            foreach($keys as $k)
            {
?>
                <td class="default"><?php print($row[$k]); ?></td>
<?php
            }
?>
    </tr>
<?php
        }
?>
</table>
<?php
    }
}
 
?>


<?php include 'tail.php'; ?>