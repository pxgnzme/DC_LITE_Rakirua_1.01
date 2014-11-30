<?php
// FeatureAdmin.php
class FeatureAdmin extends ModelAdmin {

    private static $managed_models = array(
        "Feature"
    );

    private static $has_one = array('Feature' => 'Feature');

    private static $menu_title = "Features";

    private static $url_segment = "features";

}