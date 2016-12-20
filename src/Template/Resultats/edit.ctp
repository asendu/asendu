
<div class="row">
    <div class="evenements col-sm-6 col-sm-offset-3 form-box">
    
    <div class="panel panel-primary">
    <div class="panel-heading">Enregistrer un résultat</div>
    <div class="panel-body">
        
        <div class="form-bottom">

            <?= $this->Form->create($resultat) ?>
            
            <?= $this->element('formgroup',
                ['champ'=>'user_id',
                 'inputOption'=>['placeholder'=>"le nom de l'événement"],
                 'icon'=>'user']) ?>
                 
            <?= $this->element('formgroup',
                ['champ'=>'evenement_id',
                 'inputption'=>['placeholder'=>"le nom de l'événement"],
                 'icon'=>'tag']) ?>
            
            <?= $this->element('formgroup',
                ['champ'=>'temps_puce',
                 'input_option'=>['label'=>"Temps puce",'second'=>True,'required'=>false,'default'=>'00:00:00'],
                 'icon'=>'time']) ?>
                 
            <?= $this->element('formgroup',
                ['champ'=>'temps_officiel',
                 'input_option'=>['label'=>"Temps officiel",'second'=>true,'required'=>false,'default'=>'00:00:00'],
                 'icon'=>'time']) ?>
                 
            <?= $this->element('formgroup',
                ['champ'=>'classement',
                 'input_option'=>['placeholder'=>"classement général",'required'=>false],
                 'icon'=>'list']) ?>
                 
            <?= $this->element('formgroup',
                ['champ'=>'classement_cat',
                 'input_option'=>['placeholder'=>"classement dans la catégorie",'required'=>false],
                 'icon'=>'list-alt']) ?>
            
            <?= $this->element('formgroup',
                ['champ'=>'inscription',
                 'input_option'=>['placeholder'=>"montant de l'inscription"],
                 'required'=>false,
                 'icon'=>'euro']) ?>
            



	        <button type="submit" class="btn btn-primary">Enregistrer le résultat</button>
			<?= $this->Form->end() ?>
		 </div>
     </div>
     </div>
     </div>
     </div>
</div>

<script type="text/javascript">
<!--
$('body').css('background-image', 'url(' + "<?= $this->url->image('route1.jpg') ?>" + ')');
//-->
</script>