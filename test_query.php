<?php include 'mysql_queries.php'; ?>
<?php
    if (array_key_exists("sql", $_POST)) 
    {
        $mysql = $_POST["sql"];
    }
    else
    {
	$mysql = "";
    }
    if (array_key_exists("run", $_POST) && ($_POST["run"] == "Run") ) 
    {
        $result = test_query($mysql); 
    }
    else
    {
	$result = "";
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
<p>
    <form action="test_query.php" method="post">
        <input type="submit" name="run" value="Run"/>
        <input type="text" name="sql" value="<?php if($mysql) print($mysql);?>" size="150"/>
    </form>
</p>
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
<?php
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
