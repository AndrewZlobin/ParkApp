<div class="col-md-12">
<?php foreach ($offices as $office): ?>
<!--<div class="card-columns">-->
    <div class="card-body">
        <form action="/about/update" method="post" id="changeOfficeInfo<?php echo $office['idOffice']?>" name="changeOfficeInfo<?php echo $office['idOffice']?>">
            <div class="form-group row">
                <input type="hidden" value="<?php echo $office['idOffice']?>" id="idOffice<?php echo $office['idOffice']?>" name="idOffice">
            </div>
            <div class="form-group row">
                <label for="officeAddress<?php echo $office['idOffice']?>" class="col-sm-2 col-form-label">Адрес</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="officeAddress<?php echo $office['idOffice']?>" placeholder="Адрес" value="<?php echo $office['officeAddress']?>" name="officeAddress">
                </div>
            </div>
            <div class="form-group row">
                <label for="officeEmail<?php echo $office['idOffice']?>" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="officeEmail<?php echo $office['idOffice']?>" placeholder="Email" value="<?php echo $office['officeEmail']?>" name="officeEmail">
                </div>
            </div>
            <div class="form-group row">
                <label for="officePhone<?php echo $office['idOffice']?>" class="col-sm-2 col-form-label">Телефон</label>
                <div class="col-sm-8">
                    <input type="tel" class="form-control" id="officePhone<?php echo $office['idOffice']?>" placeholder="Телефон" value="<?php echo $office['officePhone']?>" name="officePhone">
                </div>
            </div>
            <div class="form-group row">
                <label for="officeTechSupport<?php echo $office['idOffice']?>" class="col-sm-2 col-form-label">Телефон техн. поддержки</label>
                <div class="col-sm-8">
                    <input type="tel" class="form-control" id="officeTechSupport<?php echo $office['idOffice']?>" placeholder="Телефон техн. поддержки" value="<?php echo $office['officeTechSupport']?>" name="officeTechSupport">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-10">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Обновить</button>
                </div>
            </div>
        </form>
    </div>
<!--</div>-->
<?php endforeach; ?>
</div>
