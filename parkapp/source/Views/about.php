<div class="about-page">
    <div class="about-text">
        <p id="first-text">
            О компании
        </p>
        <p id="second-text">
            Уже почти 10 лет коллектив компании «АП-ПРО» благополучно взаимодействует на рынке систем безопасности
            Санкт-Петербурга и России как производитель и инсталлятор оборудования для автоматизации
            парковок под брендом АП-ПРО.<br>За это время мы помогли не одной сотне предприятий увеличить эффективность использования
            их активов и заслуженно обрели многих из них в качестве надежных партнеров.<br>Мы гордимся тем, что полученный опыт позволяет нам не только совершенствовать существующую систему,
            но и придумывать новые сервисы для парковки, делая работу с оборудованием удобнее и комфортнее.
        </p>

        <div class="offices-list">
            <?php foreach ($offices as $office): ?>
            <div class="office-card">
                <img src="/img/about/company.png">
                <p class="office-address">Адрес:<br><?php echo $office['officeAddress']; ?></p>
                <p class="office-email">Электронная почта:<br><?php echo $office['officeEmail']; ?></p>
                <p class="office-phone"> Телефон:<br><?php echo $office['officePhone']; ?></p>
                <?php if (!empty($office['officeTechSupport'])): ?>
                    <p class="office-techsupport">Техническая поддержка:<br><?php echo $office['officeTechSupport']; ?></p>
                <?php else: ?>
                    <p class="office-techsupport">Техническая поддержка:<br>8 (800) 777-56-17</p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

<!--    <p id="second-text">-->
<!---->
<!--    </p>-->
<!--    <p id="third-text">-->
<!---->
<!--    </p>-->
</div>
<!--<div class="offices-list">-->

<!--<?php ////var_dump($office['officeTechSupport']); ?>
<!--    <div class="office-card">-->
<!--        <p>Карточка офиса</p>-->


<!--    </div>-->
<?php //endforeach; ?>
<!--</div>-->