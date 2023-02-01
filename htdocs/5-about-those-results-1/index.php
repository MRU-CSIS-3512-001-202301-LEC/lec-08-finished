<?php // http://127.0.0.1:8080/5-about-those-results-1/ 
?>

<?php
require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

$query = <<<QUERY
    SELECT ch.name AS cheese
    FROM cheese AS ch
QUERY;

// ❓❓ What do you suppose $results IS? Take a guess.
$results = $db_helper->run($query);

// let's confirm whether your guess is on-target or not.... 
// die(var_dump($results)); // ⚠️ this readout is a bit misleading

// ❓❓ If we fetch one of these results, what do we see? LOOK CAREFULLY!
// ❓❓ What seems odd here? 
// ❓❓ Do you feel this is confusing? How do we grab something more reasonable?
// ❓❓ What will happen if we change our table aliases?
die(var_dump($results->fetch()));

$db_helper->close_connection();

?>

<?php // ⚠️ take 1: using a while (JP's not a big fan, but...) 
?>
<h3>Take 1: using a while</h3>
<ul>
    <?php while ($result = $results->fetch()) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endwhile ?>
</ul>



<?php // ⚠️ take 2: use a foreach
?>
<?php // 💀 try working with $results twice in a row! Ruh-roh! 
?>

<!-- <h3>Take 2: using a foreach</h3>
<ul>
    <?php foreach ($results as $result) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endforeach ?>
</ul> -->


<?php // ⚠️ gotcha: why doesn' this work?
?>
<!-- <h3>Take 3: using a fetchAll()</h3>
<?php $results_as_array = $results->fetchAll() ?>
<ul>
    <?php foreach ($results as $result) : ?>
        <li><?= $result['cheese'] ?> </li>
    <?php endforeach ?>
</ul> -->