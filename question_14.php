<?php include 'mysql_queries.php'; ?>
<?php

    $result = question_14();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Question 14</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<body>
<?php include 'head.php'; ?>
<h3>Question 14</h3>
<table class="default">
    <tr class="default">
        <th class="default">Header 1</th>
    </tr>

<?php

foreach($result as $r)
{
?>  <tr class="default">
        <td class="default"><?php print($r["attribute"]); ?></td>
    </tr>
<?php
}

?>
</table>

<?php include 'tail.php'; ?>