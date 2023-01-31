<?php // http://127.0.0.1:8080/5-about-those-results/ 
?>

<?php
require 'db/DatabaseHelper.php';

// ❓❓ What's going on here? I though requires were just a "copy/paste"!
$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

$query = <<<QUERY
    SELECT ch.name AS cheese
    FROM cheese AS ch
QUERY;

$results = $db_helper->run($query);

$db_helper->close_connection();

?>

<?php // ⚠️ take 1 
?>
<ul>
    <?php foreach ($results as $result) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endforeach ?>
</ul>

<?php // ⚠️ gotcha: why doesn' this work?
?>
<ul>
    <?php foreach ($results as $result) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endforeach ?>
</ul>