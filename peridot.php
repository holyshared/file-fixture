<?php

use Evenement\EventEmitterInterface;
use expect\peridot\ExpectPlugin;
use cloak\peridot\CloakPlugin;
use Peridot\Reporter\Dot\DotReporterPlugin;

return function(EventEmitterInterface $emitter)
{
    ExpectPlugin::create()->registerTo($emitter);

    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }

    (new DotReporterPlugin($emitter));
};
