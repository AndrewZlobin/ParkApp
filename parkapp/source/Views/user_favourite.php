<?php if (isset($addResult)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $addResult; ?>
    </div>
<?php endif; ?>

<?php if(empty($parkings)): ?>
<div class="alert alert-dark alert-dismissible" role="alert">
    <strong>Не выбрано не одной избранной парковки.<br>Добавить парковку в избранное можно в разделе<br>"Выбрать парковку на карте"</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php else: ?>
<div class="row">
    <?php foreach ($parkings as $parking): ?>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $parking['parkingName']?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $parking['parkingDescription']?></h6>
                <p class="card-text"><?php echo $parking['parkingNews']?></p>
                <p class="card-text"><?php echo $parking['parkingPromotions']?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
