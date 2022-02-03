<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(DATA_BASE_SETTINGS);

$capsule->setAsGlobal();

$capsule->bootEloquent();