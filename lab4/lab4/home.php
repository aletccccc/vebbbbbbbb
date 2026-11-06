<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$category = $_POST['category'] ?? '';
$source = $_POST['source'] ?? '';


$fileName = '';
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
    $fileName = basename($_FILES['attachment']['name']);
}

$nameSafe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$messageSafe = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
$fileSafe = htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8');

if ($category === 'propose') {
    $answer = 'Спасибо за ваше предложение!';
} else {
    $answer = 'Мы рассмотрим вашу жалобу.';
}

$againUrl = 'index.php?' . http_build_query([
    'name' => $name,
    'email' => $email,
    'source' => $source
]);
?>
<?php include 'header.php'; ?>

<h2>Ваше обращение принято</h2>
<p>Здравствуйте, <?= $nameSafe ?>!</p>
<p><?= htmlspecialchars($answer, ENT_QUOTES, 'UTF-8') ?></p>
<p><strong>Текст обращения:</strong></p>
<div class="message-box"><?= nl2br($messageSafe) ?></div>

<?php if ($fileName !== ''): ?>
    <p>Вы прикрепили файл: <?= $fileSafe ?></p>
<?php endif; ?>

<a class="button-link" href="<?= htmlspecialchars($againUrl, ENT_QUOTES, 'UTF-8') ?>">Заполнить снова</a>

</main>
</body>
</html>
