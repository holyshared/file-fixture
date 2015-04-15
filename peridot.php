<?php

use Evenement\EventEmitterInterface;
use expect\peridot\ExpectPlugin;
use Peridot\Reporter\Dot\DotReporterPlugin;

return function(EventEmitterInterface $emitter)
{
    ExpectPlugin::create()->registerTo($emitter);
    (new DotReporterPlugin($emitter));
};
