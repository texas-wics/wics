<div class="row">
    <div class="span16">
		<?
		$isupdate = isset($post);
		$h1 = $isupdate ? 'Update' : 'Create New';
		?>
    	<h1><?=$h1?> Post</h1>
    	<?if($success = Session::get('success')){?>
			<div class="alert-message success fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <p><strong>Success</strong> <?=$success?></p>
			</div>
		<?}?>
    	<?if($errors = Session::get('errors')){?>
			<div class="alert-message error fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <? $msg = count(errors) ? "Please fix the following errors" : "An unknown error has occured"; ?>
			  <p><strong>Error</strong> <?=$msg?></p>
			</div>
		<?}?>
		<?=Form::open();?>
		<?//Form::token();?>
		<?if($isupdate){?>
			<?=Form::hidden('id', $post->id);?> 
		<?}?>
		<?
		$error = $errors&&$errors->has('name');
		$default = $isupdate ? $post->name : '';
		?>
		<div class="clearfix<?=$error?' error':''?>">
			<?=Form::label('name', 'Title of Post');?>
			<div class="input<?=$error?' error':''?>">
			<?=Form::text('name', Input::old('name', $default), array('class' => 'span10'));?>
			<?if($error){?>
				<span class="help-inline"><?=$errors->first('name');?></span>
			<?}?>
			</div>
		</div>
		<?
		$error = $errors&&$errors->has('markdown');
		$default = $isupdate ? $post->markdown : '';
		?>
		<div class="clearfix<?=$error?' error':''?>">
			<?=Form::label('markdown', 'Body Text of Post');?>
			<div class="input <?=$error?' error':''?>">
			<?=Form::textarea('markdown', Input::old('markdown', $default), array('class' => 'span10'));?>
			<?if($error){?>
				<span class="help-inline"><?=$errors->first('markdown');?></span>
			<?}?>
			<span class="help-block">Please use <?=HTML::link('http://daringfireball.net/projects/markdown/syntax', 'markdown');?> to markup your post.</span>
			</div>
		</div>
		<?
		$error = $errors&&$errors->has('user_id');
		$default = $isupdate ? $post->user_id : '';
		?>
		<div class="clearfix<?=$error?' error':''?>">
			<?=Form::label('user_id', 'Author of Post');?>
			<div class="input<?=$error?' error':''?>">
			<?
			$options = $current_user->getClearance() == 1 ? array() : array('disabled'=>'disabled');
			$user_list = array();
			foreach($users as $user){
				$user_list[$user->id] = $user->getName();
			}
			?>
			<?=Form::select('user_id', $user_list, $current_user->id, $options);?>
			<?if($error){?>
				<span class="help-inline"><?=$errors->first('user_id');?></span>
			<?}?>
			</div>
		</div>
		<?$error = $errors&&$errors->has('publish');?>
		<div class="clearfix<?=$error?' error':''?>">
			<?=Form::label('publish', 'Publish on Save');?>
			<div class="input<?=$error?' error':''?>">
			<?=Form::checkbox('publish', '1', Input::old('publish'));?>
			<?if($error){?>
				<span class="help-inline"><?=$errors->first('publish');?></span>
			<?}?>
			</div>
		</div>
		
		<div class="actions">
			<?=Form::submit('Save', array('class' => 'btn primary'));?>
			<?=Form::button('Preview', array('class' => 'btn', 'name' => 'preview', 'value' => '1'));?>
			<?=Form::reset('Reset', array('class' => 'btn'));?>
		</div>
	</div>
</div>
<?if($preview = Session::get('preview')){?>
<div class="row">
	<div class="hero-unit span14">
		<h1><?=Input::old('name')?></h1>
		<?=$preview?>
	</div>
</div>
<?}?>
