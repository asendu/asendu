<?php $this->layout = 'cover'; ?>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3>AS Endurance</h3>
                 <p>Entrer votre email et mot de passe pour vous connecter</p>
            </div>
            <div class="form-top-right">
                <i class="fa fa-key"></i>
            </div>
        </div>
        <div class="form-bottom">
<!-- 			<form role="form" action="" method="post" class="login-form"> -->
            <?= $this->Form->create() ?>
            
			    <div class="form-group">
			    <div class="input-group">
			        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
			        <?= $this->Form->input('email',['placeholder'=>'email...','class'=>'form-username form-control','label' => false,'required' => true]) ?>
			    </div>
			    </div>
			    <div class="form-group">
			    <div class="input-group">
			        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
			        <?= $this->Form->input('password',['placeholder'=>'password...','class'=>'form-password form-control','label' => false,'required' => true]) ?>
			    </div>
			    </div>
			    <button type="submit" class="btn btn-primary">Connexion</button>
			<?= $this->Form->end() ?>
		 </div>
     </div>
</div>
