<?=$header;?>
<div class="content" style="text-align: center">
<div class="row">
	<div class="span6 offset5">
		<h1>Please login to continue</h1>
		<?if($error = Session::get('error')){?>
			<div class="alert-message error fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <p><strong>Error</strong> <?=$error?></p>
			</div>
		<?}?>
		<?if($warning = Session::get('warning')){?>
			<div class="alert-message warning fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <p><strong>Warning</strong> <?=$warning?></p>
			</div>
		<?}?>
		<?if($success = Session::get('success')){?>
			<div class="alert-message success fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <p><strong>Success</strong> <?=$success?></p>
			</div>
		<?}?>
		<?=Form::open('admin/login/', 'POST', array('class' => 'form-stacked', 'style' => 'padding-left:0;'));?>
		<div class="clearfix"> <?//add error class?>
			<?=Form::label('email', 'Email Address');?>
			<div class="input"> <?//add error class?>
			<?=Form::text('email', '', array('class' => 'span6'));?>
			<span class="help-inline"><?//print error messsage here?></span>
			</div>
		</div>
		<div class="clearfix"> <?//add error class?>
			<?=Form::label('password', 'Password');?>
			<div class="input"> <?//add error class?>
			<?=Form::password('password', array('class' => 'span6'));?>
			<span class="help-inline"><?//print error messsage here?></span>
			</div>
		</div>
		<div class="actions" style="margin-left:0;">
			<?=Form::submit('Login', array('class' => 'btn primary'));?>
			<?=Form::reset('Reset', array('class' => 'btn'));?>
		</div>
	</div>
</div>
<div class="row">
	<div class="hero-unit span4 offset5">
		<h3>Here by mistake?</h3>
		<?=HTML::link_to_index('Return to our home page');?>
	</div>
</div>
</div>
<?=$footer;?>
