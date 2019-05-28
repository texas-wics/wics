<div class="row">
        <div class="span16">
			<?=Form::open('admin/users/create/', 'POST', array('class' => 'form-stacked'));?>
			<?//Form::token();?>
			<div class="clearfix"> <?//add error class?>
				<?=Form::label('first_name', 'First Name');?>
				<div class="input"> <?//add error class?>
				<?=Form::text('first_name');?>
				<span class="help-inline"><?//print error messsage here?></span>
				</div>
			</div>
			<div class="clearfix"> <?//add error class?>
				<?=Form::label('last_name', 'Last Name');?>
				<div class="input"> <?//add error class?>
				<?=Form::text('last_name');?>
				<span class="help-inline"><?//print error messsage here?></span>
				</div>
			</div>
			<div class="clearfix"> <?//add error class?>
				<?=Form::label('utcsid', 'Your UTCS id');?>
				<div class="input"> <?//add error class?>
				<span class="help-block">We will use this to send mail to you in the future.</span>
				<?=Form::text('utcsid');?>
				<span class="help-inline"><?//print error messsage here?></span>
				</div>
			</div>
			<div class="clearfix"> <?//add error class?>
				<?=Form::label('password', 'Choose a password');?>
				<div class="input"> <?//add error class?>
				<?=Form::password('password');?>
				<span class="help-inline"><?//print error messsage here?></span>
				</div>
			</div>
			<div class="clearfix"> <?//add error class?>
				<?=Form::label('password_confirmation', 'Confirm your password');?>
				<div class="input"> <?//add error class?>
				<?=Form::password('passwordrepeat');?>
				<span class="help-inline"><?//print error messsage here?></span>
				</div>
			</div>
			<div class="actions">
				<?=Form::submit('Submit', array('class' => 'btn primary'));?>
				<?=Form::button('Reset', array('class' => 'btn'));?>
			</div>
    	</div>
</div>