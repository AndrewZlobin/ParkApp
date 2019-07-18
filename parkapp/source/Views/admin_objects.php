<!--<div class="alert alert-success alert-dismissible fade show" role="alert">-->
<!--    <h6 id="info"></h6>-->
<!--    <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--        <span aria-hidden="true">&times;</span>-->
<!--    </button>-->
<!--</div>-->
<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#adminAddObject" role="tab" aria-controls="home" aria-selected="true">Создать объект и арендатора</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false" href="#adminShowObjects">Посмотреть все объекты</a>
    </li>
</ul>
<div class="tab-content" id="TabObjects">
    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab" id="adminAddObject">
        <div class="margin-50 offset-3 col-6">
            <?php require_once strtolower($_SESSION['role']) . "_add_object.php"; ?>
        </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" aria-labelledby="profile-tab" id="adminShowObjects">
        <div class="col-12">
            <?php require_once strtolower($_SESSION['role']) . "_show_objects.php"; ?>
        </div>
    </div>
</div>

<?php if (isset($validation)): ?>
    <script src="/js/<?php echo $validation; ?>"></script>
<?php endif; ?>