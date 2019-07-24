<h5>Все парковки</h5>
    <table class="table table-responsive">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название парковки</th>
            <th scope="col">Координаты на Яндекс.Картах</th>
            <th scope="col">Адрес парковки</th>
            <th scope="col">URL</th>
            <th scope="col">Описание</th>
            <th scope="col">Парковочная система</th>
            <th scope="col">Город</th>
            <th scope="col">Изменить общую информацию</th>
            <th scope="col">Добавить/изменить техническую информацию</th>
            <th scope="col">Добавить/изменить клиентскую информацию</th>
        </tr>

        <?php foreach ($hyper_query as $object):?>
        <tr>
            <th scope="col"><?php echo $object['idParking']; ?></th>
            <th scope="col"><?php echo $object['parkingName']; ?></th>
            <th scope="col"><?php echo $object['parkingCoordinatesX'].", ".$object['parkingCoordinatesY']; ?></th>
            <th scope="col"><?php echo $object['parkingAddress']; ?></th>
            <th scope="col"><?php echo $object['parkingURL']; ?></th>
            <th scope="col"><?php echo $object['parkingDescription']; ?></th>
            <th scope="col"><?php echo $object['parkingSystem']; ?></th>
            <th scope="col"><?php echo $object['cityName']; ?></th>
            <th scope="col">
                <!-- Кнопка "Изменить данные о парковке" -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeParkingInfo<?php echo $object['idParking']; ?>">
                    Изменить данные о парковке
                </button>
            </th>

            <!-- Кнопка "Изменить тех.информацию о парковке" -->
            <th scope="col">
                <!-- Button trigger modal -->
                <?php if ($object['parkingTariff'] == null && $object['parkingFreePlaces'] == null): ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addParkingTechInfo<?php echo $object['idParking']; ?>">
                    Добавить тех.информацию о парковке
                </button>
                <?php else: ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateParkingTechInfo<?php echo $object['idParking']; ?>">
                    Изменить тех.информацию о парковке
                </button>
                    <?php endif; ?>
            </th>
            <!-- Кнопка "Изменить клиентскую информацию о парковке" -->
            <th scope="col">
                <!-- Button trigger modal -->
                <?php if ($object['parkingNews'] == null && $object['parkingPromotions'] == null): ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addParkingClientInfo<?php echo $object['idParking']; ?>">
                        Добавить информацию для клиента
                    </button>
                <?php else: ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateParkingClientInfo<?php echo $object['idParking']; ?>">
                        Изменить информацию для клиента
                    </button>
                <?php endif; ?>
            </th>
        </tr>
            <!-- Modal "Изменить данные о парковке" -->
            <div class="modal fade" id="changeParkingInfo<?php echo $object['idParking']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $object['parkingName']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/parkings/updateobj" id="changeParkingInfoForm<?php echo $object['idParking']; ?>">
<!--                                Основная информация о парковке-->
                                <input class="form-control form-control-sm" type="hidden" id="techInfo<?php echo $object['idParking']; ?>" name="idParking" value="<?php echo $object['idParking']; ?>">
                                <label for="parkingName<?php echo $object['idParking']; ?>">Название</label>
                                <input class="form-control form-control-sm" type="text" required id="parkingName<?php echo $object['idParking']; ?>" name="parkingName" value="<?php echo $object['parkingName']; ?>">
                                <label for="parkingCoordinates<?php echo $object['idParking']; ?>">Координаты</label>
                                <input class="form-control form-control-sm" type="text" required id="parkingCoordinates<?php echo $object['idParking']; ?>" name="parkingCoordinates" value="<?php echo $object['parkingCoordinatesX'].", ".$object['parkingCoordinatesY']; ?>">
                                <label for="parkingAddress<?php echo $object['idParking']; ?>">Адрес парковки</label>
                                <input class="form-control form-control-sm" type="text" required id="parkingAddress<?php echo $object['idParking']; ?>" name="parkingAddress" value="<?php echo $object['parkingAddress']; ?>">
                                <label for="parkingURL<?php echo $object['idParking']; ?>">URL</label>
                                <input class="form-control form-control-sm" type="text" required id="parkingURL<?php echo $object['idParking']; ?>" name="parkingURL" value="<?php echo $object['parkingURL']; ?>">
                                <label for="parkingDescription<?php echo $object['idParking']; ?>">Описание</label>
                                <input class="form-control form-control-sm" type="text" required id="parkingDescription<?php echo $object['idParking']; ?>" name="parkingDescription" value="<?php echo $object['parkingDescription']; ?>">
                                <label for="parkingSystem<?php echo $object['idParking']; ?>">Парковочная система</label>
                                <input class="form-control form-control-sm" type="text" required id="parkingSystem<?php echo $object['idParking']; ?>" name="parkingSystem" value="<?php echo $object['parkingSystem']; ?>">
                                <label for="parkingCity">Город</label>

                                <select class="custom-select" id="parkingCity<?php echo $object['idParking']; ?>" name="parkingCity">
                                    <option value="<?php echo $object['idCity']?>"><?php echo $object['cityName']?></option>
                                </select>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal "Создать тех.информацию о парковке" -->
            <div class="modal fade" id="addParkingTechInfo<?php echo $object['idParking']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $object['parkingName']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/parkings/addtech" id="addParkingTechForm<?php echo $object['idParking']; ?>">
                                <!--                                Основная информация о парковке-->
                                <input class="form-control form-control-sm" type="hidden" id="idAddParkingTechInfo<?php echo $object['idParking']; ?>" name="idParking" value="<?php echo $object['idParking']; ?>">
                                <label for="parkingTariff<?php echo $object['idParking']; ?>">Тариф</label>
                                <input class="form-control form-control-sm" type="text" required id="addParkingTariff<?php echo $object['idParking']; ?>" name="parkingTariff" value="<?php echo $object['parkingTariff']; ?>">
                                <label for="parkingFreePlaces<?php echo $object['idParking']; ?>">Свободных мест</label>
                                <input class="form-control form-control-sm" type="text" required id="addParkingFreePlaces<?php echo $object['idParking']; ?>" name="parkingFreePlaces" value="<?php echo $object['parkingFreePlaces']; ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal "Изменить тех.информацию о парковке" -->
            <div class="modal fade" id="updateParkingTechInfo<?php echo $object['idParking']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $object['parkingName']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/parkings/updatetech" id="updateParkingTechForm<?php echo $object['idParking']; ?>">
                                <!--                                Основная информация о парковке-->
                                <input class="form-control form-control-sm" type="hidden" id="idUpdateParkingTechInfo<?php echo $object['idParking']; ?>" name="idParking" value="<?php echo $object['idParking']; ?>">
                                <label for="parkingTariff<?php echo $object['idParking']; ?>">Тариф</label>
                                <input class="form-control form-control-sm" type="text" required id="updateParkingTariff<?php echo $object['idParking']; ?>" name="parkingTariff" value="<?php echo $object['parkingTariff']; ?>">
                                <label for="parkingFreePlaces<?php echo $object['idParking']; ?>">Свободных мест</label>
                                <input class="form-control form-control-sm" type="text" required id="updateParkingFreePlaces<?php echo $object['idParking']; ?>" name="parkingFreePlaces" value="<?php echo $object['parkingFreePlaces']; ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal "Создать информацию для клиента" -->
            <div class="modal fade" id="addParkingClientInfo<?php echo $object['idParking']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $object['parkingName']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/parkings/addclient" id="addParkingClientForm<?php echo $object['idParking']; ?>">
                                <!--                                Основная информация о парковке-->
                                <input class="form-control form-control-sm" type="hidden" id="idAddParkingClientInfo<?php echo $object['idParking']; ?>" name="idParking" value="<?php echo $object['idParking']; ?>">
                                <label for="parkingNews<?php echo $object['idParking']; ?>">Новость</label>
                                <input class="form-control form-control-sm" type="text" required id="addParkingNews<?php echo $object['idParking']; ?>" name="parkingNews" value="<?php echo $object['parkingNews']; ?>">
                                <label for="parkingPromotions<?php echo $object['idParking']; ?>">Акция</label>
                                <input class="form-control form-control-sm" type="text" required id="appParkingPromotions<?php echo $object['idParking']; ?>" name="parkingPromotions" value="<?php echo $object['parkingPromotions']; ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<!--            TODO Отсюда брать вид модального окна-->
            <!-- Modal "Изменить информацию для клиента" -->
            <div class="modal fade" id="updateParkingClientInfo<?php echo $object['idParking']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Изменить информацию, которая будет отображаться в разделе "Новости и акции"</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6 class="modal-header" id="exampleModalLongTitle"><?php echo $object['parkingName']; ?></h6>
                            <form method="post" action="/parkings/updateclient" id="updateParkingClientForm<?php echo $object['idParking']; ?>">
                                <!--                                Основная информация о парковке-->
                                <input class="form-control form-control-sm" type="hidden" id="idUpdateParkingClientInfo<?php echo $object['idParking']; ?>" name="idParking" value="<?php echo $object['idParking']; ?>">
                                <label for="parkingNews<?php echo $object['idParking']; ?>">Новость</label>
                                <input class="form-control form-control-sm" type="text" required id="updateParkingNews<?php echo $object['idParking']; ?>" name="parkingNews" value="<?php echo $object['parkingNews']; ?>">
                                <label for="parkingPromotions<?php echo $object['idParking']; ?>">Акция</label>
                                <input class="form-control form-control-sm" type="text" required id="updateParkingPromotions<?php echo $object['idParking']; ?>" name="parkingPromotions" value="<?php echo $object['parkingPromotions']; ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </table>