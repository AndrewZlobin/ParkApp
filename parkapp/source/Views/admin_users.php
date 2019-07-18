<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#adminShowUsers" role="tab" aria-controls="home" aria-selected="true">Посмотреть арендаторов системы AP-PRO</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false" href="#adminShowObjects">Посмотреть арендаторов системы TicketPark</a>
    </li>
</ul>
<div class="tab-content" id="TabObjects">
    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab" id="adminShowUsers">
        <div class="margin-50 offset-3 col-6">
            <?php require_once strtolower($_SESSION['role']) . "_show_users_AP.php"; ?>
        </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" aria-labelledby="profile-tab" id="adminShowObjects">
        <div class="margin-50 offset-3 col-6">
            <?php require_once strtolower($_SESSION['role']) . "_show_users_TP.php"; ?>
        </div>
    </div>
</div>