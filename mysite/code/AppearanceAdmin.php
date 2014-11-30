<?php
// FeatureAdmin.php
class AppearanceAdmin extends ModelAdmin {

    private static $managed_models = array(
        "Appearance"
    );

    private static $menu_title = "Appearance";

    private static $url_segment = "appearance";

}