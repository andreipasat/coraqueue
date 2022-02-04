<?php
namespace App;

class ArrayHelper implements HelperInterface {
    
    protected $adapter;
    protected $list;
    
    public function __construct(AdapterInterface $adapter) {
        $this->adapter = $adapter;
        $this->list = $this->adapter->getList();
    }
    
    public function addElement(array $element) {
        if ($this->findPositionByElement($element) === false) {
            array_unshift($this->list, $element);
            $this->adapter->saveList($this->list);
            return 0;
        }
        throw new \Exception("This user already exists in list and can't be added!");
        
    }
    
    public function removeElement(array $element) {
        $position = $this->findPositionByElement($element);
        if ($position !== false) {
            unset($this->list[$position]);
            $this->list = array_values($this->list);
            $this->adapter->saveList($this->list);
            return;
        }
        throw new \Exception("User that you want to remove does not exist in the list!");
    }
    
    public function removeElementByPosition(int $position) {
        $this->checkPositionExists($position);
        unset($this->list[$position]);
        $this->list = array_values($this->list);
        $this->adapter->saveList($this->list);
    }
    
    public function moveElementByPositions(int $startPosition, int $endPosition) {
        if ($startPosition === $endPosition) {
            return;
        }
        $this->checkPositionExists($startPosition);
        $this->checkPositionExists($endPosition);
        
        $elementFromStart = $this->list[$startPosition];
        unset($this->list[$startPosition]);
        $elementFromEnd = $this->list[$endPosition];
        $this->list[$endPosition] = $elementFromStart;
        $this->list = array_values($this->list);
        if ($startPosition < $endPosition) {
            array_splice($this->list, $endPosition-1, 0, [$elementFromEnd]);
        } else {
            array_splice($this->list, $endPosition+1, 0, [$elementFromEnd]);
        }
        
        $this->adapter->saveList($this->list);
    }
    
    public function switchElements(int $position1, int $position2) {
        $this->checkPositionExists($position1);
        $this->checkPositionExists($position2);
        $element1 = $this->list[$position1];
        $element2 = $this->list[$position2];
        $this->list[$position1] = $element2;
        $this->list[$position2] = $element1;
        $this->adapter->saveList($this->list);
    }
    
    public function reverseElements() {
        $this->list = array_reverse($this->list);
        $this->adapter->saveList($this->list);
    }
    
    public function getList() {
        return $this->adapter->getList();
    }
    
    protected function findPositionByElement(array $element) {
        return array_search($element, $this->list);
    }
    
    protected function checkPositionExists($position) {
        if (!array_key_exists($position, $this->list)) {
            throw new \Exception('Position ' . $position . ' in list does not exist');
        }
    }
    
}
