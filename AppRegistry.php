<?php

// Filename: AppRegistry.php
// Location: ROOT/AppRegistry.php

use NGFramer\NGFramerPHPBase\Application;

$appRegistry = Application::$application->appRegistry;

// Setting the custom routes for the Application.
$appRegistry->setCallback('get', '/', [\app\controllers\Index::class, 'index']);