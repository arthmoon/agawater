<?php
$dir = '/var/www/agawater';

echo shell_exec('cd ' . $dir . ' && git pull');
