<?php // http://127.0.0.1:8080/6-outside-data-dangerously/ 
?>

<?php

require 'db/DatabaseHelper.php';

$config = require 'db/config.php';

$db_helper = new DatabaseHelper($config);


// ⚠️ hint: try your queries out FIRST in CLI or in your GUI tool
// ⚠️ hint: use heredoc strings
$ch_type_id = $_GET['type'];
$query = <<<QUERY
    SELECT ch.name as cheese, cl.name as type
    FROM cheese ch inner join classification cl 
    ON ch.classification_id = cl.id
    WHERE cl.id = $ch_type_id
QUERY;


// die(var_dump($query));

$results = $db_helper->run($query);

$db_helper->close_connection();

require 'views/index.view.php';
