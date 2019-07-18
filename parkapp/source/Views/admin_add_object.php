<?php if (isset($addResult)):?>
    <h4><?php echo $addResult; ?></h4>
<?php endif; ?>

<form method="post" id="addObject" name="addObject" action="/parkings/addobject">
    <div class="row center-menu">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="parkingName">Название парковки</label>
                <input type="text" class="form-control" id="parkingName" name="parkingName" placeholder="название" required>
            </div>
            <div class="form-group">
                <label for="parkingCoordinates">Координаты парковки (из Яндекс.Карт)</label>
                <!--        <textarea class="form-control" id="parkingCoordinates" name="parkingCoordinates" placeholder="адрес(координаты)" required></textarea>-->
                <input type="text" class="form-control" id="parkingCoordinates" name="parkingCoordinates" placeholder="Например: 59.917876, 30.348122" required>
            </div>
            <div class="form-group">
                <label for="parkingAddress">Адрес парковки</label>
                <!--        <textarea class="form-control" id="parkingCoordinates" name="parkingCoordinates" placeholder="адрес(координаты)" required></textarea>-->
                <input type="text" class="form-control" id="parkingAddress" name="parkingAddress" placeholder="Например: Московский проспект, 100" required>
            </div>
            <div class="form-group">
                <label for="parkingURL">Интернет-адрес парковки</label>
                <input type="text" class="form-control" id="parkingURL" name="parkingURL" placeholder="интернет-адрес" required>
            </div>
            <div class="form-group">
                <label for="parkingDescription">Подробное описание парковки</label>
                <textarea class="form-control" id="parkingDescription" name="parkingDescription" placeholder="подробное описание" required></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="userLogin">Логин арендатора</label>
                <input type="text" class="form-control" id="userLogin" name="userLogin" placeholder="логин" required>
            </div>
            <div class="form-group">
                <label for="userHash">Пароль арендатора</label>
                <input type="password" class="form-control" id="userHash" name="userHash" required>
            </div>
            <div class="form-group">
                <label for="userEmail">Электронная почта арендатора</label>
                <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="почта" required>
            </div>
            <div class="form-group">
                <label for="userPhone">Мобильный телефон арендатора</label>
                <input type="text" class="form-control" id="userPhone" name="userPhone" placeholder="+7(ХХХ)ХХХ-ХХ-ХХ" required>
            </div>
            <div class="form-group">
                <label for="cityName">Город, где расположена парковка</label>
                <select class="custom-select" id="cityName" name="cityName">
                    <?php foreach ($cities as $city):?>
                    <option value="<?php echo $city['cityName']?>"><?php echo $city['cityName']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="parkingSystem">Парковочная система</label>
                <select id="parkingSystem" name="parkingSystem">
                    <option value="Нет">Нет</option>
                    <option value="AP-PRO">AP-PRO</option>
                    <option value="TicketPark">TicketPark</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Добавить</button>
        </div>
    </div>
</form>