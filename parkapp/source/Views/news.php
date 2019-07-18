<?php //var_dump($news); ?>
<?php foreach ($news as $one_news): ?>
<div class="news-column">
    <div class="parking-description">
        <h2><?php echo $one_news['parkingName']; ?></h2>
        <?php if(!empty($one_news['parkingAddress'])): ?>
            <h3><?php echo $one_news['parkingAddress']; ?></h3>
        <?php else: ?>
            <h3>Адрес не указан</h3>
        <?php endif; ?>

        <?php if(!empty($one_news['parkingDescription'])): ?>
            <h4><?php echo $one_news['parkingDescription']; ?></h4>
        <?php else: ?>
            <h4>Описание отсутсвует</h4>
        <?php endif; ?>
    </div>
    <div class="news-row">
        <div class="split left">
            <div class="centered">
                <?php if(!empty($one_news['parkingNews'])): ?>
                    <p><?php echo $one_news['parkingNews']; ?></p>
                <?php else: ?>
                    <p>Новых новостей нет</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="split right">
            <div class="centered">
                <?php if(!empty($one_news['parkingPromotions'])): ?>
                    <p><?php echo $one_news['parkingPromotions']; ?></p>
                <?php else: ?>
                    <p>Новых акций нет</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>
