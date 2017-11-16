<?php
session_start();
require "../vendor/autoload.php";
$connection = new \App\DbConnector();
$db = $connection->getDb();
$bookIds = $_SESSION['cart']['bookIds'];
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='css/lib/bootstrap.min.css' type='text/css' media='all'/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Shopping Cart</title>
</head>
<body>

<div class="stickyFooterExcluder">

    <?php include 'includes/header.php'; ?>

    <div class="container text-center">
        <h1>
            Shopping Cart
        </h1>
    </div>
    <div class="container">
        <div class="row">
            <table class="table col-xs-6">
                <tr>
                    <th>
                        Book Title
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Remove from cart
                    </th>
                </tr>
                <!-- takes the array of book IDs stored in the session and passes them into the Book class to then output title and price into html-->
                <?php
                sort($bookIds);
                foreach ($bookIds as $bookId) {
                    $book = new \App\Book($db, $bookId); ?>
                    <tr>
                        <td>
                            <a href='individualBookPage.php?id=<?php echo $book->id; ?>'> <?php echo $book->title; ?></a>
                        </td>
                        <td>
                            <?php echo $book->displayPrice(); ?>
                        </td>
                        <td>
                            <button class='btn btn-info glyphicon-minus'></button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="container">
        <!--    container-->
        <div>
            <p><b>
        <span class="col-xs-2">
            Books in cart
        </span>
                    <span class="col-xs-1">
            1
        </span>
        </div>
        <div>
            <p>
        <span class="col-xs-2">
            Total price
        </span>
                <span class="col-xs-1">
            £375.00
        </span>
                </b>
            </p>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>