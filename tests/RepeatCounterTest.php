
<?php
    require_once "src/RepeatCounter.php";

   class RepeatCounterTest extends PHPUnit_Framework_TestCase
   {
       function test_countRepeats_one_word_input(){
           $test_countRepeats = new RepeatCounter;
           $phrase = "and";
           $input_word = "and";

           $result = $test_countRepeats->CountRepeats($phrase, $input_word);

           $this->assertEquals(1, $result);
       }
       function test_countRepeats_three_word_input(){
           $test_countRepeats = new RepeatCounter;
           $phrase = "Benny and the Jets";
           $input_word = "and";

           $result = $test_countRepeats->CountRepeats($phrase, $input_word);

           $this->assertEquals(1, $result);
       }

   }
 ?>
