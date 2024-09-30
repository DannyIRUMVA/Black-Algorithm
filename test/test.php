<?php

require_once('../src/TestClass.php');


function test(){
  $test = new TestClass();
  $result = $test->add(2,5);

  if($result == 7){
    return "test passed";
  }else {
    return "test failed";
  }
}
