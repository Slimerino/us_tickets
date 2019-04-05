<?php
require_once '../../../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
$user_id = $user->data()->id;

?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();}?>
<style>

    table{
        width:100%;
        table-layout: fixed;
    }
    .tbl-header{
        background-color: rgba(255,255,255,0.3);
    }
    .tbl-content{
        height:300px;
        overflow-x:auto;
        margin-top: 0px;
        border: 1px solid rgba(255,255,255,0.3);
    }
    th{
        padding: 20px 15px;
        text-align: left;
        font-weight: 500;
        font-size: 12px;
        color: #fff;
        text-transform: uppercase;
    }
    td{
        padding: 15px;
        text-align: left;
        vertical-align:middle;
        font-weight: 300;
        font-size: 20px;
        color: #fff;
        border-bottom: solid 1px rgba(255,255,255,0.1);
    }



    /* demo styles */

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
    body{
        background: -webkit-linear-gradient(left, #25c481, #25b7c4);
        background: linear-gradient(to right, #25c481, #25b7c4);
        font-family: 'Roboto', sans-serif;
    }
</style>
<div class="main">
<table>
    <tr>
        <th>Ticket Subject</th>
        <th>User-ID</th>
        <th>Ticket-ID</th>
        <th>Username</th>
        <th>Status</th>
    </tr>
    <?php
    $stmt = $pdo->prepare('SELECT * FROM `tickets` ');
    $stmt->bindParam(1, $user_id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if ($stmt->rowCount() != 0) {
        foreach ($result as $row) {
            echo "<tr><td> <a  href=\"view-tickets.php?id=" . $row["id"] . "\">" . $row["ticket_title"] . "</a></td><td>" . $row["user_id"] . "</td><td>"
                . $row["id"] . "</td><td>" . $row["user_name"] . "</td><td>" . $row["status"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</table>
</div>

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
