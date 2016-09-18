<?php
    class RepeatCounter
    {
        private $phrase;
        private $word;
        private $frequency;
        private $plural = "";

        function CountRepeats($phrase, $word){
            $this->phrase = $phrase;
            $this->word = $word;
            $word = trim(strtolower($word));
            $phrase = strtr($phrase,".,:;?!-\$%@#^*({})][]\\/<> +=_", "                                ");
            $phrase = strtolower($phrase);
            $phraseArray = explode(" ", $phrase);
            foreach($phraseArray as $index => $word){
                $phraseArray[$index] =  trim($word, "' \"");
            }
            $result = 0;
            foreach($phraseArray as $phraseWord){
                if ($word == $phraseWord){
                    $result += 1;
                }
            }
            $this->frequency = $result;
            if($result !=1){
                $this->plural = "s";
            }
            return $result;
        }
        function getPhrase(){
            return $this->phrase;
        }
        function getWord(){
            return $this->word;
        }
        function getfrequency(){
            return $this->frequency;
        }
        function getplural(){
            return $this->plural;
        }
        function countAllWords($phrase){
            $eachWordOnce = array();
            $phrase = strtolower(strtr($phrase,".,:;?!-\$%@#^*({})][]\\/<> +=_", "                                "));
            $wordArray = explode(" ", $phrase);
            foreach($wordArray as $index => $word){
                $wordArray[$index] =  trim($word, "' \"");
            }
            foreach ($wordArray as $phraseWord) {
                if(array_key_exists($phraseWord, $eachWordOnce)==false ||(empty($phraseWord))){
                    $eachWordOnce[$phraseWord] = 1;
                }
                elseif(array_key_exists($phraseWord, $eachWordOnce) == true){
                    $eachWordOnce[$phraseWord] += 1;
                }
            }
            arsort($eachWordOnce);
            return $eachWordOnce;
        }
    }
 ?>
