<?php
//カスタムフィールドから住所を取得して緯度と経度を取得する
// $address = get_post_meta(get_the_ID(), 'address', true);
// $address = "〒180-0003 東京都武蔵野市吉祥寺南町１丁目";
// $coordinates = get_coordinates_from_address($address);

// if ($coordinates) {
//     echo '緯度: ' . $coordinates['lat'];
//     echo '経度: ' . $coordinates['lng'];
// }
?>

<?php
// 地図情報テキストエリアから入力を取得
$map_info = get_field('map');
if( $map_info ) {
    $map_lines = explode("\n", $map_info); // 改行で分割
    $latitude = trim($map_lines[0]); // 1行目: 緯度
    $longitude = trim($map_lines[1]); // 2行目: 経度
}else{
  $latitude = '35.70173879672273';
  $longitude = '139.5792795912598';
}
?>
<script>
    function initMap() {
      const center = { lat: parseFloat(<?php echo esc_js($latitude); ?>), lng: parseFloat(<?php echo esc_js($longitude); ?>) };

      // $address = "〒180-0003 東京都武蔵野市吉祥寺南町１丁目";
      // $coordinates = get_coordinates_from_address($address);

        const location = { lat:  35.70173879672273, lng: 139.5792795912598 }; // 東京の位置

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: center
        });

        const marker = new google.maps.Marker({
            position: center,
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
