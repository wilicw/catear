function loadMap() {

    const locs = [
        ["12:00", "台北車站M8出入口", [25.048107, 121.516965]],
        ["12:40", "捷運市政府站", [25.041106, 121.565985]],
        ["12:50", "松山高中門口", [25.043896, 121.565644]]
    ];

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: {
                lat: 0,
                lng: 0
            },
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.RoadMap
        }),
        bounds = new google.maps.LatLngBounds();


    for (i = 0; i < 3; i++) {

        let marker = new google.maps.Marker({
                position: {
                    lat: locs[i][2][0],
                    lng: locs[i][2][1]
                }
            }),
            infowindow = new google.maps.InfoWindow({
                content: "<h6 style='font-size:18px;color:black;'>" + locs[i][0] + " - " + locs[i][1] + "</h6>"
            })

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
        marker.setMap(map);

        loc = new google.maps.LatLng(
            marker.position.lat(),
            marker.position.lng()
        );
        bounds.extend(loc);
        map.fitBounds(bounds);
        map.panToBounds(bounds);
    }

}

function mloadMap() {

    const locs = [
        ["12:00", "台北車站M8出入口", [25.048107, 121.516965]],
        ["12:40", "捷運市政府站", [25.041106, 121.565985]],
        ["12:50", "松山高中門口", [25.043896, 121.565644]]
    ];

    var map = new google.maps.Map(document.getElementById('m-map_canvas'), {
            center: {
                lat: 0,
                lng: 0
            },
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.RoadMap
        }),
        bounds = new google.maps.LatLngBounds();


    for (i = 0; i < 3; i++) {

        let marker = new google.maps.Marker({
                position: {
                    lat: locs[i][2][0],
                    lng: locs[i][2][1]
                }
            }),
            infowindow = new google.maps.InfoWindow({
                content: "<h6 style='font-size:18px;color:black;'>" + locs[i][0] + " - " + locs[i][1] + "</h6>"
            })

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
        marker.setMap(map);

        loc = new google.maps.LatLng(
            marker.position.lat(),
            marker.position.lng()
        );
        bounds.extend(loc);
        map.fitBounds(bounds);
        map.panToBounds(bounds);
    }

}

$(document).ready(function () {
    setInterval(scrl, 100);
    setInterval(mscrl, 100);
});

let p = val => screen.height + val;
let r = val => (($(this).scrollTop()) < p(val));
var flag = false, mflag = false;

function nav(target) {
    if (!$(target).is(":visible")) {
        $(".cmp").fadeOut(200);
        $(target).fadeIn(200);
    }

}

function mnav(target) {
    if (!$(target).is(":visible")) {
        $(".mcmp").fadeOut(200);
        $(target).fadeIn(200);
    }

}

function e() {
    window.setTimeout(()=>{
        $('.sidenav').sidenav('close');
    }, 200);
}

function scrl() {
    if (r(200)) {
        nav("#title");
    } else if (r(1100)) {
        nav("#event");
    } else if (r(2200)) {
        nav("#gather");
    } else if (r(3300)) {
        nav("#vivre");
    } else if (r(4400)) {
        nav("#dacsc");
    } else if (r(5500)) {
        nav("#ssinrc");
    } else if (r(6600)) {
        nav("#crc");
    } else if (r(7700)) {
        nav("#cnmc");
    }
    if (r(2200) && flag == false) {
        console.log("load");
        setTimeout(loadMap, 1000);
        flag = true;
    }
};

function mscrl() {
    if (r(200)) {
        mnav("#m-title");
    } else if (r(1000)) {
        mnav("#m-event");
    } else if (r(2000)) {
        mnav("#m-location");
    } else if (r(3000)) {
        mnav("#m-gather");
    } else if (r(4000)) {
        mnav("#m-vivre");
    } else if (r(5000)) {
        mnav("#m-dacsc");
    } else if (r(6000)) {
        mnav("#m-ssinrc");
    } else if (r(7000)) {
        mnav("#m-crc");
    } else if (r(8000)) {
        mnav("#m-cnmc");
    }
    if (r(3000) && mflag == false) {
        console.log("load");
        setTimeout(mloadMap, 1000);
        mflag = true;
    }
};

function mnavs(target) {
    switch (target) {
        case "#m-event":
            $(this).scrollTop(p(201));
            break;
        case "#m-location":
            $(this).scrollTop(p(1001));
            break;
        case "#m-gather":
            $(this).scrollTop(p(2001));
            break;
        case "#m-vivre":
            $(this).scrollTop(p(3001));
            break;
        case "#m-dacsc":
            $(this).scrollTop(p(4001));
            break;
        case "#m-ssinrc":
            $(this).scrollTop(p(5001));
            break;
        case "#m-crc":
            $(this).scrollTop(p(6001));
            break;
        case "#m-cnmc":
            $(this).scrollTop(p(7001));
            break;
        default:
            $(this).scrollTop(p(-(screen.height)));
            break;
    }
};

function navs(target) {
    switch (target) {
        case "#event":
            $(this).scrollTop(p(201));
            break;
        case "#gather":
            $(this).scrollTop(p(1101));
            break;
        case "#vivre":
            $(this).scrollTop(p(2201));
            break;
        case "#dacsc":
            $(this).scrollTop(p(3301));
            break;
        case "#ssinrc":
            $(this).scrollTop(p(4401));
            break;
        case "#crc":
            $(this).scrollTop(p(5501));
            break;
        case "#cnmc":
            $(this).scrollTop(p(6601));
            break;
        default:
            $(this).scrollTop(p(-(screen.height)));
            break;
    }
};

let cat = 0;

function cfe(){
    if (cat >= 5) {
        location.href = "./418.html";
    } else {
        cat++;
    }
}

let jsc = 0;

function js(){
    if (jsc >= 19) {
        location.href = "./418.html";
    } else {
        jsc++;
    }
}
