<?php
    class RepeatCounter
    {
        function CountRepeats($phrase, $input_word){
            $phrase = strtolower($phrase);
            $input_word = strtolower($input_word);
            $result = 0;
            $phraseArray = explode(" ", $phrase);
            $result = 0;
            foreach($phraseArray as $word){
                if ($word == $input_word){
                    $result += 1;
                }
            }
            return $result;
        }
    }
 ?>
