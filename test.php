<?php

use alexeevdv\storage\stream\HttpStorageStream;

require 'vendor/autoload.php';

//$stream = new CombinedStorageStream([
//    'remote' => new HttpStorageStream('https://archive.openwrt.org/snapshots/trunk/ar71xx/nand/packages/base'),
//    'local' => new FileSystemStorageStream('/home/dir'),
//]);
//$stream->register('storage1');

$stream = new HttpStorageStream('https://archive.openwrt.org/snapshots/trunk/ar71xx/nand/packages/base');
$stream->register('storage1');

//$f1 = fopen('storage1://Packages.sig', 'r');

//var_dump($f1);

//$s = fread($f1, '100');
//var_dump($s);

readfile('storage1://Packages.sig');
//readfile('storage1://local/ca.crt');
