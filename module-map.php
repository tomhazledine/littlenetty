<?php 
    $event_map = get_field('venue_map');
?>

<section class="mapSettings">
    <?php if($event_map['lat']){ echo "latlong working!";?>
    <?php  echo "<p class='propMapLat'>" . $event_map['lat'] . "</p>"; ?>
  
    <?php  echo "<p class='propMapLng'>" . $event_map['lng'] . "</p>"; ?>
    <p class="propMapLatOffset">0</p>
    <p class="propMapLngOffset">0</p>
    <p class="mapZoom">15</p>
    <?php } else { ?>
        <p class='propMapLat fallback'>50.2600</p>
        <p class='propMapLng fallback'>-5.0510</p>
        <p class="propMapLatOffset">0</p>
        <p class="propMapLngOffset">0</p>
        <p class="mapZoom">8</p>
    <?php } ?>
</section>

<div id="mapCanvas" class="mapCanvas"></div>