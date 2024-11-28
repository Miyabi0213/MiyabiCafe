<?php
$let = get_query_var('let');
$lng = get_query_var('lng');

?>
<script>
    function initMap() {
      const latitude = parseFloat(<?php echo json_encode($let); ?>);
      const longitude = parseFloat(<?php echo json_encode($lng); ?>);

      const location = { lat:  35.70173879672273, lng: 139.5792795912598 }; // 東京の位置

//       if (!isNaN(latitude) && !isNaN(longitude)) {
//         const location = { lat: latitude, lng: longitude };
//           console.log("Location:", location); // デバッグ用
//         }else{
//           const location = { lat:  35.70173879672273, lng: 139.5792795912598 }; // 東京の位置
//         }
//中野  35.70173879672273    139.5792795912598
// 阿佐ヶ谷  35.70173879672273   139.5792795912598
// 吉祥寺  35.70567    139.65080

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location
        });

        const marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: getResponsiveMarkerSize() // カスタムマーカー
        });

        // ウィンドウサイズ変更時にマーカーサイズを動的に変更
        window.addEventListener('resize', function() {
            marker.setIcon(getResponsiveMarkerSize());
        });
    }

    // ウィンドウ幅に応じたカスタムマーカーサイズを返す関数
    function getResponsiveMarkerSize() {
        const windowWidth = window.innerWidth;
        let iconSize;

        if (windowWidth <= 768) {
            iconSize = new google.maps.Size(17.398, 29.395); // スマホサイズ
        } else if (windowWidth <= 992) {
            iconSize = new google.maps.Size(25, 42.239); // タブレットサイズ
        } else {
            iconSize = new google.maps.Size(35, 60); // デスクトップサイズ
        }

        return {
            url: '<?php echo get_template_directory_uri(); ?>/img/pin.webp',
            scaledSize: iconSize
        };
    }
</script>
