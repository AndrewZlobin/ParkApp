ymaps.ready()
    .done(function (ym) {
        var geolocation = ymaps.geolocation,
            myMap = new ym.Map('userMap', {
                center: [59.908800, 30.316926],
                zoom: 13,
                controls: ['smallMapDefaultSet']
            }, {
                searchControlProvider: 'yandex#search'
            });

        geolocation.get({
            provider: 'yandex',
            mapStateAutoApply: true
        }).then(function (result) {
            // Красным цветом пометим положение, вычисленное через ip.
            result.geoObjects.options.set('preset', 'islands#blackCircleIcon');
            // result.geoObjects.get(0).properties.set({
            //     balloonContentBody: 'Мое местоположение'
            // });
            myMap.geoObjects.add(result.geoObjects);
        });

        geolocation.get({
            provider: 'browser',
            mapStateAutoApply: true
        }).then(function (result) {
            // Синим цветом пометим положение, полученное через браузер.
            // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
            result.geoObjects.options.set('preset', 'islands#redCircleIcon');
            myMap.geoObjects.add(result.geoObjects);
        });

        $.ajax({
            url:"/account/hiddenmap",
            success: function(json){
                let a = JSON.parse(json);
                // console.log(a);
                for (let i = 0; i < a.length; i++) {
                    let myPlacemark = new ymaps.Placemark([a[i]["coordinatesX"], a[i]["coordinatesY"]], {
                        // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
                        balloonContentHeader: '<form action="/account/parktofavourite/'+a[i]["id"]+'" id="choosedParking'+a[i]["id"]+'" method="post">' + '<h6>'+a[i]["name"]+'</h6>',
                        balloonContent: '<input type="hidden" name="idParking" value="'+a[i]["id"]+'">'+a[i]["description"]
                            +'<br>'+
                            a[i]["tariff"]
                            +'<br>'+
                            a[i]["free"]
                            +'<br>'+
                            a[i]["news"]
                            +'<br>'+
                            a[i]["promotions"],
                        balloonContentFooter: '<input type="submit" value="В избранное">' + '</form>',
                        hintContent: a[i]["name"]
                    },{
                        preset: "islands#orangeAutoIcon"
                    });
                    var geoObjects = ym.geoQuery(myPlacemark)
                        .addToMap(myMap)
                    // .applyBoundsToMap(myMap, {
                    //     checkZoomRange: true
                    // });
                    // console.log(myPlacemark);
                }

                // var json = JSON.parse(json);
                // for (let i = 0; i < json.features.length; i++) {
                //     let balloonContentBody = json.features[0]["properties"]["balloonContent"];
                //     console.log(typeof balloonContentBody);
                //     // for (let j = 0; j < json.features[i]["properties"].length; j++) {
                //     //
                //     // }
                //
                // }
                // var json = JSON.stringify(json);

            }
        });

        // features: Array(8)
        // 0:
        // geometry: {type: "Point", coordinates: Array(2)}
        // id: "1"
        // options: {preset: "islands#orangeAutoIcon"}
        // properties:
        //     balloonContentBody:


        // jQuery.getJSON('/index/hidden', function (json) {
        //     /** Сохраним ссылку на геообъекты на случай, если понадобится какая-либо постобработка.
        //      * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/GeoQueryResult.xml
        //      */
        //     var geoObjects = ym.geoQuery(json)
        //         .addToMap(myMap)
        //         .applyBoundsToMap(myMap, {
        //             checkZoomRange: true
        //         });
        // for (let i = 0; i < json.features.length; i++){
        //     console.log(json.features[i]["properties"]["hintContent"]);
        //     console.log(json.features[i]["id"]);

        // }
        // let a = json.features[0]["id"];
        // let b = json.features[0]["properties"]["hintContent"];
        // document.cookie = a + " = " + b;
        // console.log(json.features[0]["properties"]["hintContent"]);
        // console.table(json.features.length);
        // });
    });

// console.warn(document.cookie[2]);