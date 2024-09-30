<?php

class CustomStack{
  public array $stack;
  public array $increments;
  public int $topIndex;

  public function __construct(int $maxSize){
    $this->stack = array_fill(0, $maxSize, 0);
    $this->increments = array_fill(0, $maxSize, 0);
    $this->topIndex = 0;
  }

  public function push(int $x): void
  {
    if($this->topIndex < count($this->stack)){
      $this->stack[$this->topIndex++] = $x;
    }
  }

  public function pop(): int
  {
    if($this->topIndex <= 0 ){
      return -1;
    }

    $this->topIndex--;
    $result = $this->stack[$this->topIndex] + $this->increment[$this->topIndex];

    if($this->topIndex > 0 ){
      $this->increments[$this->topIndex -1] += $this->increments[$this->topIndex];
    }

    $this->increments[$this->topIndex] = 0;

    return $result;
  }

  public function increment(int $k,int $val): void
  {
    if($this->topIndex > 0){
      $index = min($this->topIndex, $k) -1;
      $this->increments[$index] += $val;
    }
  }
}
