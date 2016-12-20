<?php use Cake\I18n\Date; ?>


<div id="corps" class="row">
    <div class="evenements col-sm-6 col-sm-offset-3 form-box">
    
    <div class="panel panel-primary">
    <div class="panel-heading">Modifier un événement</div>
    <div class="panel-body">
        
        <div class="form-bottom">

            <?= $this->Form->create($evenement) ?>
            
            <?= $this->element('formgroup',
                ['champ'=>'evenement',
                 'placeholder'=>"le nom de l'événement",
                 'icon'=>'tag']) ?>

            <?= $this->element('formgroup',
                ['champ'=>'date',
                 'placeholder'=>"",
                 'icon'=>'calendar']) ?>

            <?= $this->element('formgroup',
                ['champ'=>'lieu',
                 'placeholder'=>"la localisation de l'événement",
                 'icon'=>'map-marker']) ?>

	        <?= $this->element('formgroup',
                ['champ'=>'category_id',
                 'placeholder'=>2,
                 'icon'=>'road']) ?>

	        <?= $this->element('formgroup',
                ['champ'=>'distance',
                 'placeholder'=>"le nombre de kilomètre annoncé",
                 'icon'=>'forward']) ?>

	        <?= $this->element('formgroup',
                ['champ'=>'denivele',
                 'placeholder'=>"le dénivelé positif annoncé",
                 'icon'=>'signal']) ?>



	        <button type="submit" class="btn btn-primary">Modifier l'événement</button>
			<?= $this->Form->end() ?>
		 </div>
     </div>
     </div>
     </div>
     </div>
</div>

<script type="text/javascript">
<!--
$('body').css('background-image', 'url(' + "<?= $this->url->image('trail1.jpg') ?>" + ')');
//-->
</script>
