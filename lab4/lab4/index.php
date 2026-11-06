<?php

$name = $_GET['name'] ?? '';
$email = $_GET['email'] ?? '';
$source = $_GET['source'] ?? '';
?>
<?php include 'header.php'; ?>

<h2>Оставить обращение</h2>
<form action="home.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <label for="name">ФИО:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
    </div>

    <div class="form-row">
        <label for="email">Ваш e-mail:</label>
        <input type="email" id="email" name="email" placeholder="example@mail.ru" value="<?= htmlspecialchars($email) ?>" required>
    </div>

    <div class="form-row">
        <label for="category">Тема обращения:</label>
        <select id="category" name="category">
            <option value="propose">Предложение</option>
            <option value="complaint">Жалоба</option>
        </select>
    </div>

    <div class="form-row">
        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" required></textarea>
    </div>

    <div class="form-row">
        <label for="attachment">Выберите файл:</label>
        <input type="file" id="attachment" name="attachment">
    </div>

    <div class="form-row">
        <span class="field-label">Откуда узнали о нас:</span>
        <div class="radio-group">
            <label><input type="radio" name="source" value="Реклама из интернета" <?= $source === 'Реклама из интернета' ? 'checked' : '' ?> required> Реклама из интернета</label>
            <label><input type="radio" name="source" value="Рассказали друзья" <?= $source === 'Рассказали друзья' ? 'checked' : '' ?>> Рассказали друзья</label>
        </div>
    </div>

    <div class="consent">
        <label><input type="checkbox" name="consent" value="yes" required> Даю согласие на обработку данных</label>
    </div>

    <button type="submit">Отправить</button>
</form>

</main>
</body>
</html>
