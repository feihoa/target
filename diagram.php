<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $font_path = '/Roboto-Bold.ttf';

    $image = imagecreatetruecolor(500, 500);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 500, 500, $background_color);

    $num_rings = count($labels);

    for ($i = 1; $i <= $num_rings; $i++) {
      $color = $_POST['colorPrm' . ($i - 1)] ?? $colors[$i - 1];
      $color = sscanf($color, "#%02x%02x%02x");
      $color_fill = imagecolorallocate($image, $color[0], $color[1], $color[2]);
      $radius = ($_POST['radiusPrm' . ($i - 1)] ?? $radiuses[$i]);
      imagefilledellipse($image, 250, 250, $radius * 2, $radius * 2, $color_fill);
    }
  
    $text_color = imagecolorallocate($image, 0, 0, 0);
    imagefttext($image, 20, 90, 40, 340, $text_color, $font_path, $image_texts[0]);
    imagefttext($image, 20, 0, 200, 40, $text_color, $font_path, $image_texts[1]);
    imagefttext($image, 20, -90, 460, 120, $text_color, $font_path, $image_texts[2]);


    ob_start();
    imagepng($image);
    $image_data = ob_get_clean();

    $image_base64 = base64_encode($image_data);

    echo "<img src='data:image/png;base64,$image_base64' alt='target'>";

    imagedestroy($image);
}
?>
