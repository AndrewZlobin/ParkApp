<form action="/account/userchange" method="post">
    <div class="form-group col-sm-5 offset-3">
        <input type="hidden" value="<?php echo $user['idUser'];?>" name="ID">
    </div>
    <div class="form-group col-sm-5 offset-3">
        <label for="email<?php echo $user['idUser'];?>">Изменить почту пользователя <?php echo $_SESSION['name']; ?></label>
        <input type="email" class="form-control" id="email" name="email" required value="<?php echo $user['userEmail'];?>">
    </div>
    <div class="form-group col-sm-5 offset-3">
        <label for="phone<?php echo $user['idUser'];?>">Изменить телефон пользователя <?php echo $_SESSION['name']; ?></label>
        <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo $user['userPhone'];?>">
    </div>
    <button type="submit" class="btn btn-group-sm bg-warning offset-5 btn-lg">Изменить</button>
</form>
