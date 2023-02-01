<?php // http://127.0.0.1:8080/6-outside-data-dangerously/ 
?>

<?php

require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);


// ❓❓ what does the null coalescing op do here?
$ch_type_id = $_GET['type'] ?? 1;
$query = <<<QUERY
    SELECT ch.name as cheese, cl.name as type
    FROM cheese ch inner join classification cl 
    ON ch.classification_id = cl.id
    WHERE cl.id = $ch_type_id 
QUERY;

// try http://127.0.0.1:8080/6-outside-data-dangerously
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=1
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=2 
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=5 
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=6 ⚠️
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=blorp 💀
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=1%20or%201=1 💀
// try http://127.0.0.1:8080/6-outside-data-dangerously/?type=1;drop+table+cheese 💀💀💀 


die(var_dump($query));

$results = $db_helper->run($query);

$db_helper->close_connection();

require 'views/index.view.php';
