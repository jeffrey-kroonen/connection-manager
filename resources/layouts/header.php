<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageConfig["title"] ?? ""; ?></title>
    <!-- SCRIPT -->
    <script type="text/javascript">
    <?php
      foreach (get_defined_constants(true)["user"] as $const => $value) {
    ?>
        var <?= $const; ?> = "<?= str_replace("\\", "/", $value); ?>";
    <?php
      }
    ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9a68d31783.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= URL; ?>/assets/js/main.js"></script>
    <?php
      if (isset($pageConfig["javascript"]) &&!empty($pageConfig["javascript"])) {
        foreach ($pageConfig["javascript"] as $script) {
          $script = str_replace(".js", "", $script);
    ?>
      <script type="text/javascript" src="<?= URL . "/assets/js/" . $script . ".js"; ?>"></script>
    <?php
        }
      }
    ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css"" href="<?= URL; ?>/assets/css/main.css">
    <?php
        if (isset($pageConfig["css"]) &&!empty($pageConfig["css"])) {
            foreach ($pageConfig["css"] as $css) {
                $css = str_replace(".css", "", $css);
    ?>
      <link type="text/css" rel="stylesheet" href="<?= URL . "/assets/css/" . $css . ".css"; ?>">
    <?php
            }
        }
    ?>
  </head>
  <body>