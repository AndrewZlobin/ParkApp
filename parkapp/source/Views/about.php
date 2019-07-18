<div class="about-page">
    <p id="first-text">
        Уже почти 10 лет коллектив компании «АП-ПРО» благополучно взаимодействует на рынке систем безопасности
        Санкт-Петербурга и России как производитель и инсталлятор оборудования для автоматизации
        парковок под брендом АП-ПРО.
    </p>
    <p id="second-text">
        За это время мы помогли не одной сотне предприятий увеличить эффективность использования
        их активов и заслуженно обрели многих из них в качестве надежных партнеров.
    </p>
    <p id="third-text">
        Мы гордимся тем, что полученный опыт позволяет нам не только совершенствовать существующую систему,
        но и придумывать новые сервисы для парковки, делая работу с оборудованием удобнее и комфортнее.
    </p>
</div>
<div class="offices-list">
<?php foreach ($offices as $office): ?>
<!--    --><?php //var_dump($office['officeTechSupport']); ?>
    <div class="office-card">
        <p>Карточка офиса</p>
        <h1 class="office-address">Адрес: <?php echo $office['officeAddress']; ?></h1>
        <h2 class="office-email">Электронная почта: <?php echo $office['officeEmail']; ?></h2>
        <h3 class="office-phone"> Телефон: <?php echo $office['officePhone']; ?></h3>
        <?php if (!empty($office['officeTechSupport'])): ?>
            <h4 class="office-techsupport">Техническая поддержка: <?php echo $office['officeTechSupport']; ?></h4>
        <?php else: ?>
            <h4 class="office-techsupport">Техническая поддержка: 8 (800) 777-56-17</h4>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>