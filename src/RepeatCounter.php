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
            $phrase = strtr($phrase,".,:;?!-\'\"$%@#^*({})][]\\/<> +=_", "                                ");
            $phrase = strtolower($phrase);
            $word = strtolower($word);
            $result = 0;
            $phraseArray = explode(" ", $phrase);
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
    }
 ?>
