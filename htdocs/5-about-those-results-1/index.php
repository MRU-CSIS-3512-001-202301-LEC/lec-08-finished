<?php // http://127.0.0.1:8080/5-about-those-results-1/ 
?>

<?php
require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);

$query = <<<QUERY
    SELECT name AS cheese
    FROM cheese 
QUERY;

// ❓❓ What do you suppose $results IS? Take a guess.
$results = $db_helper->run($query);

// let's confirm whether your guess is on-target or not.... 
// (var_dump($results->fetch())); // ⚠️ this readout is a bit misleading
// (var_dump($results->fetchAll(PDO::FETCH_ASSOC)));
// (var_dump($results->fetch()));
// (var_dump($results->fetch()));
// (var_dump($results->fetch()));
// (var_dump($results->fetch()));
// (var_dump($results->fetch()));
// (var_dump($results->fetch()));

// $results_as_array = $results->fetchAll();
// var_dump($results_as_array);

$results_as_array = $results->fetchAll();


?>
<ul>
  <?php foreach ($results_as_array as $result) : ?>
    <li><?= $result['cheese'] ?> </li>
  <?php endforeach ?>
</ul>
<?php // // ❗❗❗ Don't let JP go to the next bit until he talks about htop 
?>