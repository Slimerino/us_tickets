<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>tickets</title>
    <style>
        .panel {
            width: 50%;
            text-align: left;
            margin: 50px;
          box-shadow: 10px 10px grey;
        }
        body {
            text-align: center;
        }
        .main {
            background-color: white;
        }
    </style>
</head>
<body>
<center>
<div class="main">

    <?php
    require_once '../../../users/init.php';
    require_once $abs_us_root.$us_url_root.'users/includes/header.php';
    require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
    if(isset($user) && $user->isLoggedIn()){
    }
    ?>
    <?php if (!securePage($_SERVER['PHP_SELF'])){die();}?>
    <?php
    $stmt = $pdo->prepare('SELECT * FROM `comments` WHERE ticket_id=? ORDER BY id DESC;');
    $stmt->bindParam(1, $_GET["id"], PDO::PARAM_STR);
    $stmt->execute();
$result = $stmt->fetchAll();
if ($stmt->rowCount() != 0) {
        foreach ($result as $row) {
        echo "
        <div class=\"panel panel-default\">
        <h5 class=\"panel-heading\">Ticket ID: ".$row["ticket_id"]." </h5>
        <h5 class=\"panel-heading\">".$row["user"]." </h5>
        <div class=\"panel-body\">
            <p class=\"card-text\">".$row["comment"]."</p>
            <hr>
<a class=\"btn btn-primary\" href=\"reply.php?id=" . $row["ticket_id"] . "\">Reply</a>
        </div>

    </div>
        ";
    }} else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
  There has been no response yet!
</div>";
    } ;
    ?>
    <?php
    $stmt = $pdo->prepare('SELECT * FROM `tickets` WHERE id=?;');
    $stmt->bindParam(1, $_GET["id"], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($stmt->rowCount() != 0) {
        echo "
        <div class=\"panel panel-default\">
        <h5 class=\"panel-heading\">Ticket ID: ".$result->id."</h5>
        <h5 class=\"panel-heading\">".$result->user_name."</h5>
        <div class=\"panel-body\">
            <p class=\"card-text\">".$result->message."</p>
            <hr>
            <a class=\"btn btn-primary\" href=\"reply.php?id=".$result->id."\">Reply</a>
        </div>

    </div>
        ";
    } else {
        echo "page not found!";
    } ;
    ?>
</div>
</center>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/js/mdb.min.js"></script>
</body>
</html>

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>




