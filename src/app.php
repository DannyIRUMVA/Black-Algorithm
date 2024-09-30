<?php

class Node{
  public $count;
  public $prev;
  public $next;
  public $keys;

  public function __construct(){
    $this->count = $count;
    $this->prev = $prev;
    $this->keys =  new \SplObjectStorage();
    $this->next = $next;
  }

  public function __constructWithKeys($count, $keys){
    $this->count = $count;
    $this->keys = new \SplObjectStorage();
    $this->key->attach($key, true);
  }
}

class AllOne{
  private $head;
  private $tail;
  private $keyToNode;

	public function __construct() {
    $this->head = new Node(0);
    $this->tail = new Node(0);
    $this->head->next = $this->next;
    $this->tail->prev = $this->prev;
    $this->keyToNode = [];
 	}

  public function inc($key){
    if(isset($this->keyToNode[$key])){
      $this->incremenExistingKey($key);
    }else {
      $this->addNewKey($key);
    }
	}

	public function dec($key){
    $this->decrementExistingKey($key);
	}

  public function getMaxKey(){
    return $this->tail->prev = $this->prev ? "" : $this->head->next->keys->key();
	}

  public function getMinKey(){
    return $this->head->next = $this->next ? "": $this->tail->prev->keys->key();
  }

  private function addNewKey($key){
    if($this->head->next->count == 1){
      $this->head->next->keys->attach($key, 1)
    }else {
      $this->insertAfter($this->head, new Node(1, $key))
    }
  }

  private function incremenExistingKey($key){
    $node = $this->keyToNode[$key];
    $node->keys->detach($key)

      if($node->next === $this->tail || $node->next->count > $node->count + 1){
        $this->insertAfter($node, new Node($node->count + 1))
      }

    $node->keys->next->attach($keys);
    $node->keyToNode = $node->next;

    if($node->key->count() === 0){
      $this->remove($node);
    }
  }

  private function decrementExistingKey($key){
    $node = $this->keyToNode[$key];
    $node->keys->detach($key);

    if($node->count > 1){
      if($node->prev == $this->head || $node->prev->count != $node->count -1){
        $this->insertAfter($node->prev, new Node($node->count - 1));
      }

      $node = $node->keys->attach($key, true);
      $this->keyToNode[$key] = $node->prev;
    }else{
      unset($this->keyToNode[$key]);
    }

  }

  private function insertAfter($node, $newNode){
    $newNode->prev = $node;
    $newNode->next = $node->next;
    $node->next->prev = $newNode;
    $node->next = $newNode
  }

  private function remove($node) {
    $this->prev-next = $node->next;
    $this->next-prev = $node->prev;
  }
}
