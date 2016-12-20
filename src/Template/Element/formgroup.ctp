<?php
$input_option['class']='form-username form-control';

if(!isset($input_option['required'])){$input_option['required']=true;}
if(!isset($input_option['label'])){$input_option['label']=false;}
?>

<div class="form-group">
<div class="input-group">

<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-<?= $icon ?>" aria-hidden="true"></span></span>

<?= $this->Form->input($champ,$input_option) ?>
<?php 
if(isset($addon)){ echo   '<span class="input-group-addon" id="basic-addon2">'.$addon.'</span>';}
?>
</div>
</div>
