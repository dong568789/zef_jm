<?php

$broadcaster->channel('banned.{player}', \Plugins\Tests\App\Events\GamePlayerBannedUpdated::class);
