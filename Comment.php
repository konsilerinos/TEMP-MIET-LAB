<?php
include 'vendor/autoload.php';
include 'User.php'

class Comment {
	private string $message;
	private User $user;
	
	public function __construct(string $msg, User $user) {
        $this->message = $message;
        $this->user = $user;
    }
}

$user1 = new User(1, "Nikki Konsilerin", "konsilerin@mail.ru", "qwerty");
$user2 = new User(2, "Nikki Teressa", "teressa@mail.ru", "asdfgh");
$user3 = new User(3, "Nikki Ananas", "ananas@mail.ru", "zxcvbn");

$message1 = "Message from user 1";
$message1 = "Message from user 2";
$message1 = "Message from user 3";

$comment1 = new Comment($user1, $message1);
$comment2 = new Comment($user2, $message2);
$comment3 = new Comment($user3, $message3);

$comments = [$com1, $com2, $com3];
?>

<?php
if ($_GET) {
    $checked_time = strtotime($_GET["date_box"]);
    $checked_time = date('d.m.Y H.i.s', $checked_time);
	
    foreach ($comments as $comment) {
        if (date('d.m.Y H.i.s', $comment->user->getTime()) > $checked_time) {
            echo $comment->message.'<br>';
        }
    }
}
?>

<form action="" method="get">
    <input type="datetime-local" name="date_box"/><br/>
    <input type="submit" name="done" value="Send"/><br/>
</form>
