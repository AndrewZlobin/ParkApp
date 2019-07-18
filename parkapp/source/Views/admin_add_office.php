<form method="post" action="/about/offices">
    <div class="form-group row">
        <label for="officeAddress" class="col-sm-3 col-form-label">Адрес</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="officeAddress" name="officeAddress" placeholder="Адрес" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label for="officeEmail" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-12">
            <input type="email" class="form-control" id="officeEmail" name="officeEmail" placeholder="Почта" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="officePhone" class="col-sm-3 col-form-label">Телефонный номер</label>
        <div class="col-sm-12">
            <input type="tel" class="form-control" id="officePhone" name="officePhone" placeholder="Телефон" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="officeTechSupport" class="col-sm-3 col-form-label">Телефон тех. поддержки</label>
        <div class="col-sm-12">
            <input type="tel" class="form-control" id="officeTechSupport" name="officeTechSupport" placeholder="Техническая поддержка">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Добавить</button>
        </div>
    </div>
</form>