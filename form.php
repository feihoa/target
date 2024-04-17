<form method="post" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; min-width: 270px; width: fit-content; margin-right: 20px">
  <?php
  foreach ($labels as $key => $label) {
    echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
      <label>' . $label['radius'] . '
        <br />
        <input type="number" name="radiusPrm' . $key . '" value="' . (isset($_POST['radiusPrm' . $key]) ? $_POST['radiusPrm' . $key] : $radiuses[$key]) . '">
      </label>
      <br />
      <br />
      <label>' . $label['color'] . '
        <input type="color" name="colorPrm' . $key . '" value="' . (isset($_POST['colorPrm' . $key]) ? $_POST['colorPrm' . $key] : $colors[$key]) . '">
      </label>
    </div>';
  }
  ?>
  <button type="submit" style="margin-top: 10px;">Нарисовать фигуру</button>
</form>

<br />
