<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){

}
?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();}?>
<?php
$stmt = $pdo->prepare('SELECT * FROM `tickets` WHERE id=?;');
$stmt->bindParam(1, $_GET["id"], PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_OBJ);
if ($stmt->rowCount() != 0) {
    echo "
<br>
<form class=\"form-horizontal\" action=\"reply-step-2.php\" method=\"post\" style=\"background-color: white;text-align: center;\">
    <fieldset>

        <!-- Form Name -->
        <legend>Post a reply</legend>

        <!-- Text input-->
        <div class=\"form-group\">
            <label class=\"col-md-4 control-label\" for=\"textinput\">Reply</label>
            <div class=\"col-md-4\">
                <input name=\"reply\" type=\"text\" placeholder=\"Your reply\" class=\"form-control input-md\" required=\"\">
                <input type=\"hidden\" name=\"ticket-id\" value=\"".$result->id." \"><br>

            </div>
        </div>

        <!-- Button -->
        <div class=\"form-group\">
            <label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>
            <div class=\"col-md-4\">
                <button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-info\">Submit</button>
            </div>
        </div>

    </fieldset>
</form>
        ";
} else {
    echo "page not found!";
} ;
?>


<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
