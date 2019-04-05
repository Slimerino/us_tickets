<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

<?php
$ticket_id = $_POST["ticket-id"];
$comment = $_POST["reply"];
$user = $user->data()->fname;
$status = "Customer-Reply";
?>

<?php
echo $ticket_id;
echo $meme;
echo $comment;
?>

<?php
$stmt = $pdo->prepare('INSERT INTO `comments` (`id`, `ticket_id`, `user`, `comment`) VALUES (NULL, ?, ?, ?);');
$stmt->bindParam(1, $ticket_id, PDO::PARAM_STR);
$stmt->bindParam(2, $user, PDO::PARAM_STR);
$stmt->bindParam(3, $comment, PDO::PARAM_STR);
$stmt->execute();

$data = [
    'reply' => $status,
    'id' => $ticket_id,
];
$sql = "UPDATE tickets SET status=:reply WHERE id=:id";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

header("location: view-ticket.php");

?>


<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->


<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
