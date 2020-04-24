<?php

class CreaInput {
	private $type 	= '';
	private $id 	= '';
	private $name 	= '';
	private $value = '';
	private $placeHolder = '';
	private $disabled 	= false;
	private $autoFocus 	= false;
	private $readOnly		= false;
	private $min			= 0;
	private $max			= 0;
	private $step 			= 1;
	private $class			= '';
	private $style			= '';
	private $data;

	public $label;
	public $shell;

	const VALID_IPT = array(
		'text' 	=> '',
		'number'	=> '',
		'date'	=> '',
		'email'	=> '',
		'color'	=> '',
		'password'=>'',
		'button' => '',
	);

	public function __construct(	
		string $type = 'text', 
		string $id 	 = '', 
		string $name = '',
		string $value= ''
	) {
		$this->__set('type',$type);
		$this->__set('id',$id);
		$this->__set('name',$name);
		$this->__set('value',$value);
		$this->label = new stdClass;
		$this->label->value 	= '';
		$this->label->pos 	= 'top'; /* top | down | left | right */
		$this->label->class 	= '';
		$this->label->style 	= '';
		$this->shell = new stdClass;
		$this->shell->class	= 'shell';
		$this->shell->style 	= '';
	}

	public function __set(string $attr = '', $value) {
		if (isset($this->$attr)) {
			if ($attr==='type') {
				if (isset(self::VALID_IPT[$value]))
					$this->type = $value;
				else {
					print "error al crear input de tipo $type...";
					exit(0);
				}
			}
			else $this->$attr = $value;
		}
		return $this;
	}

	public function __get(string $attr) {
		return $this->$attr;
	}

	public function show(): string {
		$result = '';
		$result .= $this->type 			!== ''	? "type='{$this->type}'" : '';
		$result .= $this->id				!== ''	? " id='{$this->id}'" : '';
		$result .= $this->name			!== '' 	? " name='{$this->name}'" : '';
		$result .= $this->value 		!== '' 	? " value='{$this->value}'" : '';
		$result .= $this->placeHolder !== '' 	? " placeholder='{$this->placeHolder}'" : '';
		$result .= $this->autoFocus	=== true ? " autofocus " : '';
		$result .= $this->disabled 	=== true ? ' disabled ' : '';
		$result .= $this->readOnly 	=== true ? ' readonly ' : '';
		$result .= $this->type==='number' && $this->min!==$this->max ? " min={$this->min} max='$this->max' step={$this->step} " : '';
		$result .= $this->class			!== ''	? " class='{$this->class}'" : '';
		
		$result = "<div class='{$this->shell->class}' style='{$this->shell->style}'>"
					. ($this->label->value!=='' 
						? "<label for='{$this->id}' class='{$this->label->class}' style='{$this->label->style}'>{$this->label->value}</label>" 
						: '')
					."<input type='{$this->type}' {$result} >"
					."</div>";

		return $result;
	}
}