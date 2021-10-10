#!/usr/bin/env php
<?php

namespace Shimoning\Formula;

require_once __DIR__ . '/vendor/autoload.php';

echo __NAMESPACE__ . " shell\n";
echo "-----\nexample:\n";
echo "var_dump(Formula::calculate('-1000 / 2 * 5 + 3'));\n-----\n\n";

$sh = new \Psy\Shell();

$sh->addCode(sprintf("namespace %s;", __NAMESPACE__));

$sh->run();

echo "\n-----\nBye.\n";
