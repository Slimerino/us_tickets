<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){

}
?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();}?>
<style>
    .main {
        background-color: white;
        padding: 100px;
    }
</style>

<div class="main">
    <h1>Ticket Section</h1>
    <a href="submit-ticket.php" class="btn btn-success">Submit a Ticket</a> <a href="view-ticket.php" class="btn btn-success">View Tickets</a>
</div>

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
