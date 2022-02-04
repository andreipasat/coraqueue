<?php

require "vendor/autoload.php";


$adapter = new App\CacheAdapter();
$queue = new App\QueueService(new App\ArrayHelper($adapter));
$user = new App\User();
$queue->add($user);
//$findUser = new App\User(164399299232, "user-1643992992");
//$queue->remove($findUser);
//$queue->removeByPosition(1);
//$queue->move(1, 4);
//$queue->switch(4, 0);
//$queue->reverse();
$queue->printList(new App\SimplePrinter());

