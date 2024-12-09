<?php
require_once("lib/settings/SitePages.php");


$title = "GDG - WTM Kütahya";

$route = $_GET['route'] ?? 'anasayfa';

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include "lib/layout/_LayoutHeadComponentPartial.php"; ?>
</head>
<body>
<?php
    include "lib/layout/_LayoutPreloadComponentPartial.php";
?>
<div id="content">
    <?php
    if ($route != 'login') {
        include_once "lib/layout/_LayoutNavbarComponentPartial.php";
    }

    if (array_key_exists($route, $Page)) {
        include $Page[$route];
    } else {
        include $Page['404'];
    }

    include_once "lib/layout/_LayoutBackToTopComponentPartial.php";

    if ($route != 'login' and $route != 'gdgcekilis'){
        include_once "lib/layout/_LayoutFooterComponentPartial.php";
    }

    include "lib/layout/_LayoutScriptComponentPartial.php";
    ?>
</div>

</body>
</html>
