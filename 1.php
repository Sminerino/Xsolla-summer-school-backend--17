<?php
class Brackets
{
	private $strg=" ";
	private $correct=true;
	private $index=0;
	public function isBracketSequenceCorrect($str) {
		$this->strg=$str;
		$this->index=0;
		$correct=true;
 
		while($this->index<strlen($this->strg) && $this->correct==true)
		{
			$this->check();
			$this->index++;
		}
		return $this->correct;
	}
 
	function check(){
 
		$sym=' ';
 
		switch($this->strg[$this->index])
		{
			case '(':
				$sym=')';
				break;
 
			case '[':
				$sym=']';
				break;
 
			case '{':
				$sym='}';
				break;
		}
		if ($this->index+1<strlen($this->strg)){
 
			$this->index++;
 
			if($this->strg[$this->index]!=$sym){
				$this->check();
			}
			else return;
 
			if(($this->index+1)>=strlen($this->strg) || $this->strg[++$this->index] != $sym) {
				$this->correct=false;
			}
		}
		else $this->correct=false;
	}
}
?>