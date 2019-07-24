<!DOCTYPE html>

<html lang="ru">
<head>
    <title><?php echo $title; ?></title>
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="description" content="Онлайн-оплата парковок">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/general.css">
<!--    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>-->
<!--    <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php if(isset($social)): ?>
        <link rel="stylesheet" href="<?php echo $social; ?>">
    <?php endif; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!--    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>-->
    <?php if(isset($style_general)): ?>
        <link rel="stylesheet" href="/css/<?php echo $style_general; ?>">
    <?php endif; ?>
    <?php if(isset($style_page)): ?>
        <link rel="stylesheet" href="/css/<?php echo $style_page; ?>">
    <?php endif; ?>

    <?php if(isset($style_about)): ?>
        <link rel="stylesheet" href="/css/<?php echo $style_about; ?>">
    <?php endif; ?>

    <?php if($_SERVER['REQUEST_URI'] == '/payment'): ?>
        <link rel="stylesheet" href="/css/<?php echo $style_payment; ?>">
        <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru-RU&amp;apikey=e8b39d29-fdaf-486b-8029-d6d1130f46b0" type="text/javascript"></script>
        <script src="/js/geolocation.js" type="text/javascript"></script>

    <?php elseif ($_SERVER['REQUEST_URI'] == '/account' && $_SESSION['role'] == 'ADMIN'): ?>
        <link rel="stylesheet" href="/css/<?php echo $style_show_parkings; ?>">
    <?php endif; ?>


</head>
<body>

<nav class='header'>
    <nav class="header-left">
        <a class="payment-button" href="/payment">Онлайн оплата</a>
    </nav>
    <nav class="header-right">
        <div>
            <img src="/img/logo.png" alt="MENU" class="button-menu">
            <div>
                <div class="contacts-appro">
                    <h5>Санкт-Петербург:</h5>
                    <h6>8 (812) 339-00-17</h6>
                    <h5>Москва:</h5>
                    <h6>8 (495) 108-74-26</h6>
                </div>
                <ul class="social-list">
                    <li><a class="fa fa-youtube" href="https://www.youtube.com/channel/UCvPpEddIAOynkiensj5chKg"></a></li>
                    <li><a class="fa fa-vk" href="https://vk.com/parkomatpro"></a></li>
                    <li><a class="fa fa-instagram" href="https://www.instagram.com/parkingsystem_appro/"></a></li>
                    <li><a class="fa fa-odnoklassniki-square" href="https://ok.ru/group/53255311196238"></a></li>
                </ul>
            </div>
        </div>
        <ul class="header-list">
            <li><a href="/">Главная</a></li>
            <li><a href="/news">Новости и Акции</a></li>
            <li><a href="/about">О Нас</a></li>
            <?php if ($auth): ?>
            <li><a href="/account">Личный кабинет</a></li>
            <li><a href="/account/logout">Выйти</a></li>
            <?php else: ?>
            <li><a href="/account/sign">Личный кабинет</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</nav>



<div class="main-content" id="main-content">
    <?php include_once $content; ?>
</div>

<?php if ($_SERVER['REQUEST_URI'] == '/account/sign'): ?>
<script src="/js/pa.js"></script>
<?php endif; ?>
<?php if (isset($js_script)): ?>
<script src="/js/<?php echo $js_script; ?>"></script>
<?php endif; ?>
</body>
</html>
