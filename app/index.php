<?php
require "../vendor/autoload.php";

//$store = new \App\Store();
//var_dump($store);
//$db = new \App\DbConnector();
//$store->getData($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include_once "header.php"?>

<?php
$db = new \App\DbConnector();
$store = new \App\Store($db);
$books = $store->getAllBooks();
var_dump($books);
?>

<?php include_once "footer.php"?>
</body>
</html>

