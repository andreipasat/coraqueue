<?php
namespace App;

interface AdapterInterface {
    public function getList();
    public function saveList(array $list);
}
