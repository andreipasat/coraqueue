<?php
namespace App;

interface HelperInterface {
    public function addElement(array $element);
    public function removeElement(array $element);
    public function removeElementByPosition(int $position);
    public function moveElementByPositions(int $startPosition, int $endPosition);
    public function switchElements(int $position1, int $position2);
    public function reverseElements();
    public function getList();
}
