<?php

namespace App;

class User {
    public $id;
    public $username;
    
    public function __construct(int $id = null, string $username = null) {
        if (null === $id) {
            $this->id = rand(0,10000) + time();
        } else {
            $this->id = $id;
        }
        if (null === $username) {
            $this->username = 'user-' . $this->id;
        } else {
            $this->username = $username;
        }
    }
    
    public function toArray() {
        return [
            'id' => $this->id,
            'username' => $this->username,
        ];
    }
    
}
