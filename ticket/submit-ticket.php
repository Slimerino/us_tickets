<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){

}
?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();}?>
<br>
<form class="form-horizontal" action="submit-ticket-step2.php" method="post" style="background-color: white;text-align: center;">
    <fieldset>

        <!-- Form Name -->
        <legend>Submit a ticket</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Ticket Subject</label>
            <div class="col-md-4">
                <input name="subject" type="text" placeholder="Your ticket title" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Ticket Message</label>
            <div class="col-md-4">
                <textarea class="form-control" name="message">Your issue</textarea>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-info">Submit</button>
            </div>
        </div>

    </fieldset>
</form>
    <!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

    <!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>