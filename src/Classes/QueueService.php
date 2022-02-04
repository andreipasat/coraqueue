<?php

namespace App;

class QueueService {
    
    public $listHelper;
    
    public function __construct(HelperInterface $helper) {
        $this->listHelper = $helper;
    }
    
    public function add (User $user) {
        return $this->listHelper->addElement($user->toArray());
    }
    
    public function remove (User $user) {
        return $this->listHelper->removeElement($user->toArray());
    }
    
    public function removeByPosition (int $position) {
        $this->listHelper->removeElementByPosition($position);
    }
    
    public function move (int $start, int $end) {
        $this->listHelper->moveElementByPositions($start, $end);
    }
    
    public function switch (int $fromPosition, int $toPosition) {
        $this->listHelper->switchElements($fromPosition, $toPosition);
    }
    
    public function reverse () {
        $this->listHelper->reverseElements();
    }
    
    public function printList (PrinterInterface $printer) {
        $list = $this->listHelper->getList();
        $printer->print($list);
    }
}
