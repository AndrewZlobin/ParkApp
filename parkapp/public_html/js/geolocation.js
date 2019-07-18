/*
ymaps.ready()
    .done(function (ym) {
        var myMap = new ym.Map('map', {
            center: [55.751574, 37.573856],
            zoom: 10,
            controls: ['smallMapDefaultSet']
        }, {
            searchControlProvider: 'yandex#search'
        });

        $.ajax({
            url:"/index/hidden",
            success: function(json){
                var geoObjects = ym.geoQuery(json)
                    .addToMap(myMap)
                    // .applyBoundsToMap(myMap, {
                    //     checkZoomRange: true
                    // });
            }
        });

        // let json = JSON.parse(json);
        // console.log(json);

        jQuery.getJSON('/index/hidden', function (json) {
            /!** Сохраним ссылку на геообъекты на случай, если понадобится какая-либо постобработка.
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/GeoQueryResult.xml
             *!/
            var geoObjects = ym.geoQuery(json)
                .addToMap(myMap)
                // .applyBoundsToMap(myMap, {
                //     checkZoomRange: true
                // });
            // for (let i = 0; i < json.features.length; i++){
            //     console.log(json.features[i]["properties"]["hintContent"]);
            //     console.log(json.features[i]["id"]);

            // }
            // let a = json.features[0]["id"];
            // let b = json.features[0]["properties"]["hintContent"];
            // document.cookie = a + " = " + b;
            // console.log(json.features[0]["properties"]["hintContent"]);
            // console.table(json.features.length);
        });
    });

// console.warn(document.cookie[2]);*/

ymaps.ready()
    .done(function (ym) {
        var myMap = new ym.Map('map', {
            center: [55.751574, 37.573856],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        });

        jQuery.getJSON('/hidden', function (json) {
            /** Сохраним ссылку на геообъекты на случай, если понадобится какая-либо постобработка.
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/GeoQueryResult.xml
             */
            var geoObjects = ym.geoQuery(json)
                .addToMap(myMap)
                .applyBoundsToMap(myMap);/*, {
                    checkZoomRange: true
                });*/
        });
    });