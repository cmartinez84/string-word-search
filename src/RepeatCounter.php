<?php
    class RepeatCounter
    {
        private $phrase;
        private $word;
        private $frequency;
        private $plural = "";
        private $mostFrequentWordsInEnglish = array("the", "of", "and", "a", "to", "in", "is", "you", "that", "it", "he", "was", "for", "on", "are", "as", "with", "his", "they", "I", "at", "be",
         "this", "have", "from", "or", "one", "had", "by", "word", "but", "not", "what", "all", "were", "we", "when", "your", "can", "said", "there", "use", "an", "each", "which", "she", "do",
          "how", "their", "if", "will", "up", "there", "about", "out", "many", "then", "them", "these", "so", "some", "her", "would", "make", "like", "him", "into", "time", "has", "look", "two", "more", "write", "go", "see", "number", "no", "way", "could", "people", "my", "than", "first", "water", "been", "call", "who", "oil", "its", "now", "find", "long", "down", "day", "did", "get", "come",
          "made", "may", "part", "i");
        private $eachWordOnce = array();
        private $mostUniqueWordsArray = array();
        private $readability;
        private $totalWord;
        private $averageSentenceLength;

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

        function countAllWords($phrase){
            $phrase = strtolower(strtr($phrase,".,:;?!-\$%@#^*({})][]\\/<> +=_", "                                "));
            $wordArray = explode(" ", $phrase);
            foreach($wordArray as $index => $word){
                $wordArray[$index] =  trim($word, "' \"");
            }
            foreach ($wordArray as $phraseWord) {
                if(array_key_exists($phraseWord, $this->eachWordOnce)==false && !(empty($phraseWord))){
                    $this->eachWordOnce[$phraseWord] = 1;
                }
                elseif(array_key_exists($phraseWord, $this->eachWordOnce) == true){
                    $this->eachWordOnce[$phraseWord] += 1;
                }
            }
            arsort($this->eachWordOnce);
            // var_dump($this->mostFrequentWordsInEnglish);
            foreach($this->eachWordOnce as  $word => $frequency){
                if((!in_array($word, $this->mostFrequentWordsInEnglish) && count($this->mostUniqueWordsArray)<10))
                {
                    array_push($this->mostUniqueWordsArray, $word);
                }
            }
        }
        function analyzeReadability($input){
            $sentenceArray = preg_split("/[.?!]+/", $input);
            $totalSentences =  count($sentenceArray);
            $totalWord = count(explode(" ", $input));
            $totalCharacters = count(str_split(preg_replace('/[^a-z0-9]/i', '', $input)));
            $this->totalWord = $totalWord;
            $this->readability =round(4.71 *($totalCharacters/$totalWord)+.5*($totalWord/$totalSentences)   -21.43);
            $this->averageSentenceLength = $totalWord/$totalSentences;
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
        function getEachWordOnce(){
            return $this->eachWordOnce;
        }
       function getmostUniqueWordsArray(){
           return $this->mostUniqueWordsArray;
       }
       function getreadability(){
           return $this->readability;
       }
       function gettotalWord(){
           return $this->totalWord;
       }
       function getaverageSentenceLength(){
           return $this->averageSentenceLength;
       }
    }
 ?>
