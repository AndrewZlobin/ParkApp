<?php if (isset($addResult)):?>
    <h4><?php echo $addResult; ?></h4>
<?php endif; ?>

<form method="post" action="/users/add">
    <div class="form-group">
        <label for="userLogin">Логин арендатора</label>
        <input type="text" class="form-control" id="userLogin" name="userLogin" placeholder="логин" required>
    </div>
    <div class="form-group">
        <label for="userHash">Пароль арендатора</label>
        <input type="text" class="form-control" id="userHash" name="userHash" required>
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
        <label for="userSystem">Парковочная система на объекте арендатора</label>
        <select id="parkingCity" name="parkingCity">
            <option value="AP-PRO">AP-PRO</option>
            <option value="TicketPark">TicketPark</option>
        </select>
    </div>
    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>
