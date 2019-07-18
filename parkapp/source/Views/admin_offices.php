<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#adminAddOffice" role="tab" aria-controls="home" aria-selected="true">Добавить офис компании в раздел "О нас"</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false" href="#adminShowOffices">Посмотреть/отредактировать офисы</a>
    </li>
</ul>
<div class="tab-content" id="TabObjects">
    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab" id="adminAddOffice">
        <div class="margin-50 offset-2 col-8">
            <?php require_once strtolower($_SESSION['role']) . "_add_office.php"; ?>
        </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" aria-labelledby="profile-tab" id="adminShowOffices">
        <div class="margin-50 offset-2 col-10">
            <?php require_once strtolower($_SESSION['role']) . "_show_offices.php"; ?>
        </div>
    </div>
</div>

