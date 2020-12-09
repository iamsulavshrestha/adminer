<?php

include_once "vendor/autoload.php";

function adminer_object() {
  $plugin_dir = "./vendor/vrana/adminer/plugins/";
    // required to run any plugin
    include_once $plugin_dir. "plugin.php";
    
    // autoloader
    foreach (glob($plugin_dir . "*.php") as $filename) {
        include_once "./$filename";
    }

    $plugins = array(
        // specify enabled plugins here
        new AdminerDumpXml,
        new AdminerTinymce,
        new AdminerFileUpload("data/"),
        new AdminerSlugify,
        new AdminerTranslation,
        new AdminerForeignSystem,
        new Sush\AdminerTheme\AdminerTheme(),
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./vendor/vrana/adminer/adminer-4.7.8.php";
?>
