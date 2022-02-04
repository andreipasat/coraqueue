<?php
namespace App;

class CacheAdapter implements AdapterInterface {
    
    protected $filename;
    
    public function __construct() {
        $this->filename = 'queue_cache_file';
        if (!file_exists($this->filename)) {
            file_put_contents($this->filename,serialize([]));
        }
    }
    
    public function getList() {
        return unserialize(file_get_contents($this->filename));
    }
    
    public function saveList(array $list) {
        file_put_contents($this->filename, serialize($list));
    }
    
}
