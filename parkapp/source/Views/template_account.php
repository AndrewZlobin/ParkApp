<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title_account; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--    --><?php //if(isset($style_account)): ?>
<!--        <link rel="stylesheet" href="/bootstrap/css/--><?php //echo $style_account; ?><!--">-->
<!--    --><?php //endif; ?>
<!--    --><?php //if(isset($style_page)): ?>
<!--        <link rel="stylesheet" href="/bootstrap/css/--><?php //echo $style_page; ?><!--">-->
<!--    --><?php //endif; ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if(isset($_SESSION['role'])): ?>
        <a class="navbar-brand" href="/account"><?php echo $_SESSION['role']; ?></a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/account/objects">Объекты<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/account/users">Пользователи</a>
            <a class="nav-item nav-link" href="/account/web">Структура сайта</a>
            <?php if ($auth): ?>
            <a class="nav-item nav-link" href="/account/logout">Выйти и вернуться на главную страницу</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<?php include_once $content; ?>


<!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->
<!--<script src="/js/ajax-test.js"></script>-->

</body>
</html>