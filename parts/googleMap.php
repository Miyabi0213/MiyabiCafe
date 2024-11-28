<script>
  function initMap() {
  const location = {lat: 35.6895, lng: 139.6917}; // 東京の例
  const map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: location,
  });

  const markerSize = getResponsiveMarkerSize();
    // マーカーの内容をDOM要素として作成
  // const imgElement = document.createElement('img');
  // imgElement.src = "<?php echo get_template_directory_uri(); ?>/img/pin.webp";
  // imgElement.alt = "Pin";
  // imgElement.style.width = `${markerSize.width}px`;
  // imgElement.style.height = `${markerSize.height}px`;

  // const marker = new google.maps.marker.AdvancedMarkerElement({
  //   map: map,
  //   position: location,
  //   title:"tokyo",
  //   content: imgElement
  //   // content: `<img src="<?php echo get_template_directory_uri(); ?>/img/pin.webp" alt="Pin"
  //   //           style="width: ${markerSize.width}px; height: ${markerSize.height}px;">`

  // });
  const marker = new google.maps.Marker({
      position: location,
      map: map,
      title:'tokyo',
      icon: {
        url:'<?php echo get_template_directory_uri(); ?>/img/pin.webp',
        // scaledSize: new google.maps.Size(17, 29)
        scaledSize: getResponsiveMarkerSize(),
        // origin: new google.maps.Point(0, 0), // 画像の表示開始位置
        // anchor: new google.maps.Point(0,0)
      }
  });

  window.addEventListener('resize', function() {
    const newSize = getResponsiveMarkerSize();
    marker.setIcon({
      url:'<?php echo get_template_directory_uri(); ?>/img/pin.webp',
      scaledSize: newSize
    });
  });

  // jQuery(window).on("resize", function() {
  //   const newSize = getResponsiveMarkerSize(); // 新しいサイズを取得
  //   marker.content.style.width = `${newSize.width}px`;
  //   marker.content.style.height = `${newSize.height}px`;
  // });
}

function getResponsiveMarkerSize() {
  let windowWidth = window.innerWidth;
  console.log("current window width:", window.innerWidth);
  if (windowWidth <= 768) {
    console.log("<= 758")

      return new google.maps.Size(17.398, 29.395);
  } else if (windowWidth <= 992) {
    console.log("<= 992")

    return new google.maps.Size(17.398, 29.395);
  } else {
    console.log("else")
    return new google.maps.Size(35, 60);
  }
}
</script>
