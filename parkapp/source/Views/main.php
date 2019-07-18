<div class="main-content">
    <h2>Сферы применения парковочных систем:</h2>
    <div class="slider">
        <div class="slider__wrapper">
            <div class="slider__item">
                <div>Торговые<br>комплексы</div>
            </div>
            <div class="slider__item">
                <div>Бизнес-центры</div>
            </div>
            <div class="slider__item">
                <div>Гипермаркеты</div>
            </div>
            <div class="slider__item">
                <div>Гостиницы,<br>отели</div>
            </div>
            <div class="slider__item">
                <div>Аэропорты,<br>вокзалы</div>
            </div>
            <div class="slider__item">
                <div>Рестораны</div>
            </div>
            <div class="slider__item">
                <div>Спортивные<br>комплексы</div>
            </div>
            <div class="slider__item">
                <div>Театры и ДК</div>
            </div>
        </div>
        <a class="slider__control slider__control_left" href="#" role="button"></a>
        <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
    </div>


</div>
<?php
$mask['type'] = 'FeatureCollection';
foreach ($json as $value){
    $parkingX = floatval($value['parkingCoordinatesX']);
    $parkingY = floatval($value['parkingCoordinatesY']);
    $mask['features'][] =  array(
        "type"=>"Feature",
        "id"=>$value['idParking'],
        "geometry"=>array(
            "type"=>"Point",
            "parkingCoordinates"=>[$parkingX, $parkingY]
        ),
        "properties"=> array(
//                    "balloonContentHeader"=>$value['idParking'],
            "balloonContentHeader"=>$value['parkingName'],
            "balloonContentBody"=>$value['parkingDescription'],
            "balloonContentFooter"=>$value['parkingTariff'],
            "hintContent"=>$value['parkingName']

        ),
        "options"=>array(
            "preset"=> "islands#orangeAutoIcon"
        )
    );
}
echo json_encode($mask, JSON_UNESCAPED_UNICODE);
?>
<!--<div class="left-map">Парковка-->
<!--    <ul>Выберите парковку-->
<!--        <li>1</li>-->
<!--        <li>2</li>-->
<!--        <li>3</li>-->
<!--    </ul>-->
<!--    <div id="parkingsContainer">-->
<!--        <label for="cities">Город</label>:-->
<!--        <select name="cities" id="cities"></select>-->
<!--        <ul id="parkings"></ul>-->
<!--    </div>-->
<!---->
<!--    <div id="map"></div>-->
<!--</div>-->
<!--<div class="center-faq">FAQ</div>-->
<!--<div class="form-right">Форма</div>-->

<!--<form action="PHPServer"-->
<!--      method="post"-->
<!--      enctype="multipart/form-data">-->
<!--    <fieldset>-->
<!--        <h1 align="center">Разовая оплата парковки:</h1>-->
<!--        <fieldset>-->
<!--            <h2>Данные клиента для разовой оплаты парковки</h2>-->
<!--            <div>-->
<!--                <label for="client_name">Введите своё имя:</label>-->
<!--                <br>-->
<!--                <input type="text"-->
<!--                       id="client_name"-->
<!--                       autofocus-->
<!--                       placeholder="Используйте русские буквы"-->
<!--                       size="25"-->
<!--                       required>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="client_surname">Введите свою фамилию:</label>-->
<!--                <br>-->
<!--                <input type="text"-->
<!--                       id="client_surname"-->
<!--                       placeholder="Используйте русские буквы"-->
<!--                       size="25"-->
<!--                       required>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="patronymic">Введите своё отчество:</label>-->
<!--                <br>-->
<!--                <input type="text"-->
<!--                       id="patronymic"-->
<!--                       placeholder="Необязательное поле"-->
<!--                       size="25">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="auto_number">Введите номер своего автомобиля-->
<!--                    (используйте латинские буквы и цифры):</label>-->
<!--                <br>-->
<!--                <input type="text"-->
<!--                       id="auto_number"-->
<!--                       maxlength="9"-->
<!--                       size="15"-->
<!--                       placeholder="Пример: Z999ZZ999"-->
<!--                       required>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <input type="submit" value="Отправить данные для расчета стоимости парковки">-->
<!--            </div>-->
<!--        </fieldset>-->
<!---->
<!--        <fieldset>-->
<!--            <h2>Выбор набора услуг</h2>-->
<!--            <div>-->
<!--                <h3>Выберите парковку и укажите срок пребывания на ней</h3>-->
<!--                <label><input type="radio" name="parking">Парковка у СК "Юбилейный"</label>-->
<!--                <label><input type="radio" name="parking" checked>Парковка у ЖК "Лофт на Среднем"</label>-->
<!--                <label><input type="radio" name="parking"-->
<!--                              disabled >Парковка у гостиницы "Санкт-Петербург"<em>(в данный момент на ремонте)</em></label>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="date1">Выберите дату начала парковки:</label>-->
<!--                <br>-->
<!--                <input id="date1"-->
<!--                       type="date" min="2019-03-10">-->
<!--                <br>-->
<!--                <label for="time1">Выберите время начала парковки</label>-->
<!--                <br>-->
<!--                <input id="time1"-->
<!--                       type="time"-->
<!--                       min="00:00">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="date2">Выберите дату окончания парковки:</label>-->
<!--                <br>-->
<!--                <input id="date2"-->
<!--                       type="date"-->
<!--                       max="2020-03-10">-->
<!--                <br>-->
<!--                <label for="time2">Выберите время окончания парковки</label>-->
<!--                <br>-->
<!--                <input id="time2"-->
<!--                       type="time"-->
<!--                       max="23:59">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <button value="one_pay">Рассчитать стоимость парковки</button>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="needpay">К оплате:</label>-->
<!--                <input type="text" id="needpay"-->
<!--                       readonly-->
<!--                       value="ххх рублей">-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <h3>Выберите предподчительный способ оплаты</h3>-->
<!--                <label><input type="radio" name="payment" checked>Оплата картой онлайн</label>-->
<!--                <label><input type="radio" name="payment" disabled>-->
<!--                    Оплата картой на парковке <em>(в разработке)</em></label>-->
<!--                <label><input type="radio" name="payment">-->
<!--                    Оплата наличными на парковке <strong>(рекомендуется позвонить на парковку)</strong></label>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <legend>Выберите платежную систему:</legend>-->
<!--                <select name="paysystem" size="5">-->
<!--                    <optgroup label="Популярные платежные системы">-->
<!--                        <option selected>Mastercard</option>-->
<!--                        <option>VISA</option>-->
<!--                        <option disabled>МИР</option>-->
<!--                    </optgroup>-->
<!--                    <optgroup label="Дополнительные платежные системы">-->
<!--                        <option>American Express</option>-->
<!--                        <option>PayPal</option>-->
<!--                        <option>Diners Club International</option>-->
<!--                        <option disabled>China UnionPay</option>-->
<!--                    </optgroup>-->
<!--                </select>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="cardid">Введите номер карты:</label>-->
<!--                <br>-->
<!--                <input type="text" id="cardid"-->
<!--                       size="1"-->
<!--                       value="XXXX"-->
<!--                       required>-->
<!--                <input type="text"-->
<!--                       size="1"-->
<!--                       value="XXXX"-->
<!--                       required>-->
<!--                <input type="text"-->
<!--                       size="1"-->
<!--                       value="XXXX"-->
<!--                       required>-->
<!--                <input type="text"-->
<!--                       size="1"-->
<!--                       value="XXXX"-->
<!--                       required>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="cardname">Введите имя владельца карты:</label>-->
<!--                <br>-->
<!--                <input type="text"-->
<!--                       id="cardname"-->
<!--                       size="25"-->
<!--                       placeholder="Используйте латинские буквы"-->
<!--                       required>-->
<!--                <br>-->
<!--                <label for="cardsurname">Введите фамилию владельца карты:</label>-->
<!--                <br>-->
<!--                <input type="text"-->
<!--                       id="cardsurname"-->
<!--                       size="25"-->
<!--                       placeholder="Используйте латинские буквы"-->
<!--                       required>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="cardusage">Выберите месяц и год окончания действия карты:</label>-->
<!--                <br>-->
<!--                <input type="month"-->
<!--                       id="cardusage"-->
<!--                       required>-->
<!--            </div>-->
<!--            <br>-->
<!--            <div>-->
<!--                <label for="cvs">Введите код CVS (на обратной стороне карты):</label>-->
<!--                <br>-->
<!--                <input type="password"-->
<!--                       maxlength="3"-->
<!--                       id="cvs"-->
<!--                       required>-->
<!--                <br>-->
<!--                <h4><input type="button"-->
<!--                           value="Проверить внесенные данные"></h4>-->
<!--            </div>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <div>-->
<!--                <h3>Выберите дополнительные услуги:</h3>-->
<!--                <label><input type="checkbox" checked>Дополнительные услуги не требуются</label>-->
<!--                <br>-->
<!--                <label><input type="checkbox">Мойка машины (+150 руб.)</label>-->
<!--                <br>-->
<!--                <label><input type="checkbox">Оформление абонементной карты на месяц (+200 руб.)</label>-->
<!--                <br>-->
<!--                <label><input type="checkbox">Оформление абонементной карты на полгода (+1000 руб.)</label>-->
<!--                <br>-->
<!--                <label><input type="checkbox">Оформление абонементной карты на год (+2000 руб.)</label>-->
<!--                <h4><input type="button"-->
<!--                           value="Добавить выбранные дополнительные услуги"></h4>-->
<!--            </div>-->
<!--        </fieldset>-->
<!--        <fieldset>-->
<!--            <div>-->
<!--                <h2>Внимание! Еще раз внимательно проверьте внесенные данные!</h2>-->
<!--                <label for="submit">Если данные верны, нажмите сюда, чтобы оплатить:</label>-->
<!--                <br>-->
<!--                <input type="submit"-->
<!--                       id="submit"-->
<!--                       value="Оплатить парковку">-->
<!--            </div>-->
<!--        </fieldset>-->
<!--    </fieldset>-->
<!---->
<!--    <fieldset>-->
<!--        <div>-->
<!--            <h2>Информация для владельцев абонементных карт:</h2>-->
<!--            <strong>Если у Вас уже имеется абонементная карта - перейдите на вкладку <a href="authorization.html">-->
<!--                    "Страница авторизации"</a>.</strong>-->
<!--            <br>-->
<!--            <strong>Если Вы хотите зарегистрировать новую карту - перейдите на вкладку <a href="registration.html">-->
<!--                    "Страница регистрации"</a>.</strong>-->
<!--        </div>-->
<!--    </fieldset>-->
<!--</form>-->