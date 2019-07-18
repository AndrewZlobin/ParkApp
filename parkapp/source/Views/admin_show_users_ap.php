<div class="row">
    <?php foreach ($users_AP as $user): ?>
        <div class="col-md-4">

            <div class="card text-center">
                <div class="card-header">
                    <?php echo $user['userLogin']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $user['userParkSystem']; ?></h5>
                    <h6 class="card-title"><?php echo $user['userEmail']; ?></h6>
                    <h6 class="card-title"><?php echo $user['userPhone']; ?></h6>
                    <p class="card-text"><?php echo $user['parkingName']; ?></p>
                    <p class="card-text"><?php echo $user['parkingAddress']; ?></p>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $user['parkingDescription']; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>