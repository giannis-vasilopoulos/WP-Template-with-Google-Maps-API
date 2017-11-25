<?php
/*
Template Name: Map
*/

get_header(); ?>
    <script>
        var map;
        var lastZoom = 13;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 37.977284,
                    lng: 23.734743
                },
                zoom: 13
            });
            setMarkers(map);
        }

        var schools = [
        ['93o Δημοτικό Σχολείο Αθηνών', 37.960858, 23.733205, 4, 'Ν. ΚΟΣΜΟΣ ΠΥΘΕΟΥ 9 & ΑΓΚΥΛΗΣ', '2109231030', 'mail@93dim-athin.att.sch.gr'],
        ['73o Δημοτικό Σχολείο Αθηνών', 37.971831, 23.713756, 3, 'Α. ΠΕΤΡΑΛΩΝΑ ΤΡΩΩΝ 2', '2103417858', 'mail@73dim-athin.att.sch.gr'],
        ['165o Δημοτικό Σχολείο Αθηνών', 38.004561, 23.733761, 5, 'ΠΛ. ΑΜΕΡΙΚΗΣ ΚΥΠΡΟΥ 43', '2108640806', '165dimath@sch.gr'],
        ['12/θέσιο Π.Δ.Σ.Π.Α', 37.979956, 23.738537, 2, 'ΚΟΛΩΝΑΚΙ ΣΚΟΥΦΑ 43', '2103610527', 'mail@1dim-uoa.att.sch.gr'],
        ['6/θέσιο Π.Σ.Π.Α', 37.977530, 23.746634, 1, 'ΚΟΛΩΝΑΚΙ ΜΑΡΑΣΛΗ 4', '2107210835', 'pspa@sch.gr'],
        ['13o Νηπιαγωγείο Αθηνών', 37.972552, 23.755855, 6, 'ΕΥΦΡΟΝΙΟΥ & ΜΠΙΓΛΙΤΣΑΣ 2', '2107238598', 'mail@13nip-athin.att.sch.gr'],
        ['16o Νηπιαγωγείο Αθηνών', 37.994336, 23.766177, 7, 'ΑΜΠΕΛΟΚΗΠΟΙ Ι. ΠΑΓΚΑ 2', '2106923372', 'mail@16nip-athin.att.sch.gr'],
        ['31o Νηπιαγωγείο Αθηνών', 37.991390, 23.728480, 8, 'ΠΛ.ΒΑΘΗΣ ΑΡΙΣΤΟΤΕΛΟΥΣ 55', '2108832766', 'mail@31nip-athin.att.sch.gr'],
        ['35o Νηπιαγωγείο Αθηνών', 37.990345, 23.724850, 9, 'ΠΛ.ΒΑΘΗΣ Μ.ΒΟΔΑ 9', '2108818978', 'mail@35nip-athin.att.sch.gr'],
        ['84o Νηπιαγωγείο Αθηνών', 37.979734, 23.719683, 10, 'ΠΛ.ΚΟΥΜΟΥΝΔΟΥΡΟΥ ΑΣΩΜΑΤΩΝ 37', '2103252863', 'mail@84nip-athin.att.sch.gr'],
        ['91o Νηπιαγωγείο Αθηνών', 38.004224, 23.732627, 11, 'ΠΛ. ΑΜΕΡΙΚΗΣ ΛΕΥΚΩΣΙΑΣ 16', '2108614424', 'mail@91nip-athin.att.sch.gr'],
        ['21o Δημοτικό Σχολείο Αθηνών', 38.004392, 23.733644, 12, 'ΠΛ. ΑΜΕΡΙΚΗΣ ΚΥΠΡΟΥ 43', '2108652643', 'mail@21dim-athin.att.sch.gr'],
        ['29o Δημοτικό Σχολείο Αθηνών', 37.999417, 23.746498, 17, 'ΝΕΑ ΚΥΨΕΛΗ ΔΟΙΡΑΝΗΣ 43', '2108846255', 'mail@29dim-athin.att.sch.gr'],
        ['32o Δημοτικό Σχολείο Αθηνών', 37.991390, 23.728277, 14, 'ΠΛ. ΒΙΚΤΩΡΙΑΣ ΑΡΙΣΤΟΤΕΛΟΥΣ 55', '2108212069', 'mail@32dim-athin.att.sch.gr'],
        ['36o Δημοτικό Σχολείο Αθηνών', 37.989710, 23.738977, 15, 'ΕΞΑΡΧΕΙΑ ΙΟΥΣΤΙΝΙΑΝΟΥ 30-34', '2108822088', 'mail@36dim-athin.att.sch.gr'],
        ['45o Δημοτικό Σχολείο Αθηνών', 38.004121, 23.745302, 16, 'ΚΥΨΕΛΗ ΠΥΘΙΑΣ 38', '2108675226', 'mail@45dim-athin.att.sch.gr'],
        ['57o Δημοτικό Σχολείο Αθηνών', 37.995543, 23.714373, 17, 'ΚΟΛΩΝΟΣ ΔΙΣΤΟΜΟΥ 67', '210512267857', '57dimath@sch.gr'],
        ['60o Δημοτικό Σχολείο Αθηνών', 37.994726, 23.709218, 18, 'ΚΟΛΩΝΟΣ ΑΙΜΟΝΟΣ & ΤΗΛΕΦΑΝΟΥΣ', '2105129540', 'mail@60dim-athin.att.sch.gr'],
        ['70o Δημοτικό Σχολείο Αθηνών', 37.969060, 23.727688, 19, 'ΦΙΛΟΠΑΠΠΟΥ ΚΑΛΛΙΣΠΕΡΗ 1', '210922053470', '70dimath@sch.gr'],
        ['72o Δημοτικό Σχολείο Αθηνών', 37.977055, 23.717412, 20, 'ΘΗΣΕΙΟ  ΑΚΤΑΙΟΥ 2-4', '2103464588', ' mail@72dim-athin.att.sch.gr'],
            ];

        function setMarkers(map) {
            var image = {
                url: 'ICON URL', // ICON URL HERE
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(35, 55),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 32).
                anchor: new google.maps.Point(0, 0)
            };

            for (var i = 0; i < schools.length; i++) {
                var school = schools[i];
                var nameSchool = school[0];
                var addrSchool = school[4];
                var telSchool = school[5];
                var emailSchool = school[6];
                var content = '<div id="content">' +
                    '<h3 id="firstHeading" class="firstHeading">' + nameSchool + '</h3>' +
                    '<div id="bodyContent">' +
                    '<p>' + addrSchool + '</p>' +
                    '<p>' + telSchool + '</p>' +
                    '<p><a href="mailto:' + emailSchool + '">' + emailSchool + '</a></p>' +
                    '</div>' +
                    '</div>';
                var infowindow = new google.maps.InfoWindow();
                var marker = new google.maps.Marker({
                    position: {
                        lat: school[1],
                        lng: school[2]
                    },
                    map: map,
                    icon: image,
                    title: school[0],
                    zIndex: school[3]
                });
                google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                    return function () {
                        map.setZoom(18);
                        map.setCenter(marker.getPosition())
                        infowindow.setContent(content);
                        infowindow.open(map, marker);
                    };
                })(marker, content, infowindow));
                google.maps.event.addListener(infowindow, 'closeclick', function () {
                    map.setZoom(lastZoom);
                    map.setCenter({
                        lat: 37.977284,
                        lng: 23.734743
                    });
                });
            }

        }
    </script>
    <script async defer src="API KEY"> 
    </script>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div id="map"></div>

        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();