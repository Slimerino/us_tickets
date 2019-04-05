<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

<?php
$random = substr(md5(mt_rand()), 0, 7);

$user_id = $user->data()->id;
$user = $user->data()->fname;
$title = $_POST['subject'];
$message = $_POST['message'];
$status = "Open";

$stmt = $pdo->prepare('INSERT INTO `tickets` (`id`, `user_id`, `message`, `ticket_title`, `user_name`, `status`, `ticket_id`) VALUES (?, ?, ?, ?, ?, ?,?);');
$stmt->bindParam(1, $random, PDO::PARAM_STR);
$stmt->bindParam(2, $user_id, PDO::PARAM_STR);
$stmt->bindParam(3, $message, PDO::PARAM_STR);
$stmt->bindParam(4, $title, PDO::PARAM_STR);
$stmt->bindParam(5, $user, PDO::PARAM_STR);
$stmt->bindParam(6, $status, PDO::PARAM_STR);
$stmt->bindParam(7, $random, PDO::PARAM_STR);
$stmt->execute();
?>

<?php
header("location: view-ticket.php")
?>
    <!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

    <!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>