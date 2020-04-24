<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/CreaInput.php');
function mostrar($valor = '') {
	print '<pre>';
	print_r($valor);
	print '</pre>';
}

$head = "
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Document</title>
	<link rel='stylesheet' href='css/estilo.css'>	
</head>
<body>
";
$foot = "
</body>
</html>
<script src='js/eventos.js' type='module'></script>
";

$claseIpt 	= 'ipt';
$claseColor = 'ipt-color';

$entradas = array();
$entradas[] = new CreaInput('date','fecha','FECHA','2020-04-21');
$entradas[0]->class = $claseIpt;
$entradas[] = new CreaInput('number','cantidad','CANTIDAD');
$entradas[1]->value = 5.25;
$entradas[1]->class = $claseIpt;
$entradas[] = new CreaInput('email','correo');
$entradas[2]->name = 'CORREO';
$entradas[2]->value = 'mvmendez@muniguate.com';
$entradas[2]->class = $claseIpt;
$entradas[] = new CreaInput('color');
$entradas[3]->id = 'mi_color';
$entradas[3]->name = 'MI_COLOR';
$entradas[3]->value = '#ABCDEF';
$entradas[3]->class = $claseColor;
$entradas[] = new CreaInput();
$entradas[4]->type = 'password';
$entradas[4]->id = 'mi_clave';
$entradas[4]->name = 'MI_CLAVE';
$entradas[4]->placeHolder = 'contraseña';
$entradas[4]->class = $claseIpt;
$entradas[4]->autoFocus = true;
$entradas[] = new CreaInput();
$entradas[5]->__set('id','dato1')->__set('name','Dato1')->__set('placeHolder','Dato 1');
$entradas[5]->__set('disabled',true)->__set('class',$claseIpt);
$entradas[] = new CreaInput();
$entradas[6]->__set('id','dato2')->name = 'Dato2';
$entradas[6]->__set('value','Dato 2')->__set('readOnly', true)->__set('class', $claseIpt);
$entradas[] = new CreaInput('number');
$entradas[7]->id = 'dato3';
$entradas[7]->__set('name','Dato3')->__set('min',-9)->__set('max',-3)->__set('step',.2);
$entradas[7]->placeHolder = "[{$entradas[7]->min} y {$entradas[7]->max}] i={$entradas[7]->step}";
$entradas[7]->class = $claseIpt;
$entradas[] = new CreaInput('number');
$entradas[8]->__set('id','dato4')->__set('min','10')->__set('max','100')->__set('step', 5);
$entradas[8]->placeHolder = "[{$entradas[8]->min}-{$entradas[8]->max}] i={$entradas[8]->step}";
$entradas[8]->class = $claseIpt;
$entradas[] = new CreaInput('button','dato4','', 'validar');
$entradas[9]->class = $claseIpt;
$entradas[] = new CreaInput;
$entradas[10]->__set('id','dato5')->__set('class',$claseIpt);
$entradas[10]->label->value = 'Ingrese Dato 5:';
$entradas[] = new CreaInput;
$entradas[11]->__set('id','dato6')->__set('class','ipt-w50p');
$entradas[11]->label->value = 'Ingrese Dato 6:';
$entradas[11]->label->pos = 'left';
$entradas[11]->label->class = 'lbl-w50p';
$entradas[] = new CreaInput;
$entradas[12]->__set('id','dato7')->__set('class','ipt-w70p');
$entradas[12]->label->value = 'Ingrese Dato 7:';
$entradas[12]->label->pos = 'left';
$entradas[12]->label->class = 'lbl-w30p';


print $head;
foreach ($entradas as $key => $value) {
	print $value->show();
}
print $foot;
?>
<input type='button' value="enviar">