(function (window, settings) {
    'use strict'; 

    var navigator = window.navigator;

    var google = window.google;

    var jQuery = window.jQuery;

    var mapObj;

    var infoObj;

    var currentPosition;

    var storeMarkerObj = [];
    function initializeMap(googleMaps) {

        var latlng = new google.maps.LatLng(currentPosition.latitude, currentPosition.longitude);
        var markerObj;
        mapObj = new google.maps.Map(jQuery('#' + googleMaps.mapDivId).get(0), {
            zoom: googleMaps.scale,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        markerObj = new google.maps.Marker({
            title: googleMaps.currentLocationTitle,
            position: latlng,
            map: mapObj,
            icon: googleMaps.currentLocationIcon
        });
    }

    var getMyLocation = function(){

    }

    function addStoreInfoWindow(gNavi, markerObj, store) {
        google.maps.event.addListener(markerObj, 'click', function () {
            if (infoObj) {
                infoObj.close();
            }
            infoObj = new google.maps.InfoWindow({
                content: gNavi.formatContent(store)
            });
            infoObj.open(mapObj, markerObj);
        });
    }

    function removeMarkers() {
        var i, length;
        for (i = 0, length = storeMarkerObj.length; i < length; ++i) {
            storeMarkerObj[i].setMap(null);
        }
        storeMarkerObj = [];
    }
    function addStoreMarkers(gNavi, stores) {
        var i, length, store, latlng;
        removeMarkers();
        for (i = 0, length = stores.length; i < length; ++i) {
            store = stores[i];
            latlng = new google.maps.LatLng(store.latitude, store.longitude);
            storeMarkerObj[i] = new google.maps.Marker({
                title: store.name,
                position: latlng,
                map: mapObj
            });
            addStoreInfoWindow(gNavi, storeMarkerObj[i], store);
        }
    }
    function getGnaviInfo(gNavi) {
        gNavi.data.latitude = currentPosition.latitude;
        gNavi.data.longitude = currentPosition.longitude;
        console.log(gNavi.data.latitude + ", " + gNavi.data.longitude);
        jQuery.ajax(gNavi.url, {
            method: gNavi.method,
            dataType: gNavi.dataType,
            data: gNavi.data,
            success: function (data, textStatus, jqXHR) {
                var i, length;
                var stores = [];
                for (i = 0, length = data.rest.length; i < length; ++i) {
                    stores[i] = gNavi.newStoreInfo(data.rest[i]);
                }
                addStoreMarkers(gNavi, stores);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                gNavi.onError({
                    jqXHR: jqXHR,
                    textStatus: textStatus,
                    errorThrown: errorThrown
                });
            }
        });
    }

    //位置情報を取得
    function getLocation(global, googleMaps, gNavi) {
        var setupApi = function (googleMaps, gNavi, pos) {
            currentPosition = {
                latitude: pos.latitude,
                longitude: pos.longitude
            };
            initializeMap(googleMaps);
            getGnaviInfo(gNavi);
        };
        var onSuccess = (function (googleMaps, gNavi) {
            return function (position) {
                setupApi(googleMaps, gNavi, position.coords);
            };
        }(googleMaps, gNavi));
        var onError = (function (position, googleMaps, gNavi) {
            return function () {
                setupApi(googleMaps, gNavi, position);
            };
        }(global.defaultPosition, googleMaps, gNavi));
        if (!navigator.geolocation) {
            onError();
            return;
        }
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }

    //検索条件の設定
    function setData(gNavi) {
        gNavi.data.range = $('[name="range"]:checked').val();
        gNavi.data.hit_per_page = $('[name="hit_per_page"]').val();
        gNavi.data.lunch = $('[name="lunch"]:checked').size();
        gNavi.data.no_smoking = $('[name="no_smoking"]:checked').size();
        gNavi.data.takeout = $('[name="takeout"]:checked').size();
        getGnaviInfo(gNavi);
    }

    jQuery(document).ready(function () {
        getLocation(settings.global, settings.googleMaps, settings.gNavi);
        jQuery("#dialog").dialog({
            autoOpen: false,
            position: {
                my: 'right',
                at: 'right',
                of: '#gmap'
            }
        });
        jQuery('#search').click(function () {
            jQuery('#dialog').dialog('open');
        });
        jQuery('#searchSubmit').click(function () {
            setData(settings.gNavi);
        });
    });

    console.log(currentPosition);

}(window, {
    global: {
        defaultPosition: {
            latitude: 35.658775,
            longitude: 139.705223
        }
    },
    googleMaps: {
        mapDivId: 'gmap',
        scale: 17,
        currentLocationTitle: '現在地',
        currentLocationIcon: 'img/current.png'
    },
    gNavi: {
        url: 'http://api.gnavi.co.jp/ver1/RestSearchAPI/?',
        method: 'GET',
        dataType: 'jsonp',
        defaultPosition: {
            latitude: 0,
            longitude: 0
        },
        data: {
            keyid: '4c5b3116560bcf2d516fc8b900d2c868',
            format: 'json',
            range: 2,
            hit_per_page: 30,
            lunch: 0,
            no_smoking: 0,
            takeout: 0
        },
        onError: function (info) {
            alert('ぐるなび情報を取得できませんでした。');
        },

        //オブジェクトが空の場合に指定した文字列で置き換えます。
         
        ensureNotEmpty: function (obj, defaultValue) {
            return 0 === Object.keys(Object(obj)).length ? defaultValue : obj;
        },
        trim: function (str, regexp) {
            return str.replace(regexp, '');
        },
        formatPrice: function (price) {
            var s = String(price);
            return !s.match(/^\d+$/) ? price : s.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
        },
        newStoreInfo: function (rest) {
            var pos = this.defaultPosition;
            var unknown = '不明';
            var defaultImage = 'img/noimg.jpg';
            return {
                name: this.ensureNotEmpty(rest.name, unknown),
                latitude: this.ensureNotEmpty(rest.latitude, pos.latitude),
                longitude: this.ensureNotEmpty(rest.longitude, pos.longitude),
                shopImage1: this.ensureNotEmpty(rest.image_url.shop_image1, defaultImage),
                url: this.ensureNotEmpty(rest.url, ''),
                address: this.ensureNotEmpty(rest.address, unknown),
                tel: this.ensureNotEmpty(rest.tel, unknown),
                opentime: this.ensureNotEmpty(this.trim(rest.opentime, /,$/), unknown),
                holiday: this.ensureNotEmpty(rest.holiday, unknown),
                prShort: this.ensureNotEmpty(rest.pr.pr_short, unknown),
                prLong: this.ensureNotEmpty(rest.pr.pr_long, unknown),
                lunch: this.ensureNotEmpty(this.formatPrice(rest.lunch), unknown)
            };
        },
        //地図上に表示する店舗情報のフォーマットを生成します。
        formatContent: function (store) {
            return '<div><h2>' + store.name + '</h2><div class="left"><img src="' + store.shopImage1 + '" width="100px" height="auto"><br /></div>\n\
<div class="right"><table><tr><th>休業日</th><td>' + store.holiday + '</td></tr>\n\
<tr><th>営業時間</th><td>' + store.opentime + '</td></tr>\n\
<tr><th>ランチタイム平均予算（円）</th><td>' + store.lunch + '</td></tr>\n\
<tr><th>住所</th><td>' + store.address + '</td></tr>\n\
<tr><th>電話番号</th><td>' + store.tel + '</td></tr>\n\
<tr><th>PR文</th><td>' + store.prShort + '</td></tr>\n\
<tr><th>詳細</th><td><a href="' + store.url + '" target="_blank">ぐるなび店舗ページヘ</a></td></tr>\n\
</table></div></div>';
        }
    }
}));

