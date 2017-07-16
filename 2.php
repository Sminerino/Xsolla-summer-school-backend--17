<?php
class MaximumUniqueSubstring
{
    public function findMaximumUniqueSubstring($str) {
        $current="";
        $max="";
        $index=0;
        while ($index<strlen($str)){
            if(!$this->contains($current,$str[$index])){
                $current.=$str[$index];
                if(strlen($max)<strlen($current))
                    $max=$current;
                $index++;
            }
            else $current="";
        }
        return $max;
    }
    static function contains($str,$chr){
        for($i=0;$i<strlen($str);$i++){
            if($str[$i]==$chr)
                return true;
        }
        return false;
    }
}
?>
