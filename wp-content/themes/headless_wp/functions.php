<?php

$dir = __DIR__;
require_once("$dir/vendor/autoload.php");
require_once("$dir/loaders.php");

Loaders::requireAllFilesinDir("$dir/models/blocks");
Loaders::requireAllFilesinDir("$dir/models/post_types");

