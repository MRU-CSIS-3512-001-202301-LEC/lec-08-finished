<?php // http://127.0.0.1:8080/5-about-those-results-2/ 
?>

<?php
require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

// ❓❓ What if we only get ONE thing back? How do things change?
$query = <<<QUERY
    SELECT ch.name AS cheese
    FROM cheese AS ch
    WHERE id = 1
QUERY;

$results = $db_helper->run($query);

// ❓❓ What will be the difference between fetch() and fetchALl() now?
// die(var_dump($results->fetchAll()));

$db_helper->close_connection();

?>

<?php // ⚠️ take 1: just fetch the one thing and use it 
?>
<h3>Fetching one result</h3>
<h4><?= $results->fetch()['cheese'] ?></h4>


<?php // ⚠️ take 2: keep using a loop! 
?>
<!-- <h3>A loop will always work on a PDOStatement...</h3>
<h4>...even if there's only one result</h4>
<ul>
    <?php foreach ($results as $result) : ?>
        <h4><?= $result['cheese'] ?> </h4>
    <?php endforeach ?>
</ul> -->