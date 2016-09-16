
<?php
    require_once "src/RepeatCounter.php";

   class RepeatCounterTest extends PHPUnit_Framework_TestCase
   {
       function test_countRepeats_one_word(){
           $test_countRepeats = new RepeatCounter;
           $phrase = "and";
           $word = "and";

           $result = $test_countRepeats->CountRepeats($phrase, $word);

           $this->assertEquals(1, $result);
       }
   }
 ?>
