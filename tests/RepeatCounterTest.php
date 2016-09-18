
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
       function test_countRepeats_capitalization(){
           $test_countRepeats = new RepeatCounter;
           $phrase = "And so we beat on";
           $input_word = "and";

           $result = $test_countRepeats->CountRepeats($phrase, $input_word);

           $this->assertEquals(1, $result);
       }
       function test_countRepeats_ignore_partial_matches(){
           $test_countRepeats = new RepeatCounter;
           $phrase = "Andy Williams";
           $input_word = "and";

           $result = $test_countRepeats->CountRepeats($phrase, $input_word);

           $this->assertEquals(0, $result);
       }
       function test_countRepeats_ignore_ignore_special_characters(){
           $test_countRepeats = new RepeatCounter;
           $phrase = "Fish.,:;?!-\'\"$%@#^*({})][]\\/<> +=_and chips";
           $input_word = "and";

           $result = $test_countRepeats->CountRepeats($phrase, $input_word);

           $this->assertEquals(1, $result);
       }
       function test_countAllWords(){
           $test_countAllWords = new RepeatCounter;
           $phrase = "and and and the the the";

           $allWordsArray = $test_countAllWords->countAllWords($phrase);
           $result = $allWordsArray["and"];


           $this->assertEquals(3 , $result);
       }
   }
 ?>
