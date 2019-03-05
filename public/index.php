<?php

require_once __DIR__ . '/../vendor/autoload.php';

define("SOURCE_DIR", __DIR__ . '/../src');
define("MANIFEST_PATH", __DIR__ . '/../src/blazar-manifest.json5');
define("CUSTOM_MANIFEST", __DIR__ . '/../mf_develop.json5');


Blazar::init();