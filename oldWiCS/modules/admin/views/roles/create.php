<div class="row">
    <div class="span16">
    	<h1>Create New Post</h1>
    	<?if($success = Session::get('success')){?>
			<div class="alert-message success fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <p><strong>Success</strong> <?=$success?></p>
			</div>
		<?}?>
    	<?if($errors = Session::get('errors')){?>
			<div class="alert-message error fade in" data-alert="alert">
			  <a class="close" href="#">×</a>
			  <p><strong>Error</strong> Please fix the following errors</p>
			</div>
		<?}?>
		<?=Form::open('admin/posts/create/', 'POST');?>
		<?//Form::token();?>
		<?$error = $errors&&$errors->has('name');?>
		<div class="clearfix<?=$error?' error':''?>">
			<?=Form::label('name', 'Title of Post');?>
			<div class="input<?=$error?' error':''?>">
			<?=Form::text('name', Input::old('name'), array('class' => 'span10'));?>
			<?if($error){?>
				<span class="help-inline"><?=$errors->first('name');?></span>
			<?}?>
			</div>
		</div>
		<?$error = $errors&&$errors->has('markdown');?>
		<div class="clearfix<?=$error?' error':''?>">
			<?=Form::label('markdown', 'Body Text of Post');?>
			<div class="input <?=$error?' error':''?>">
			<?=Form::textarea('markdown', Input::old('markdown'), array('class' => 'span10'));?>
			<?if($error){?>
				<span class="help-inline"><?=$errors->first('markdown');?></span>
			<?}?>
			<span class="help-block">Please use <?=HTML::link('http://daringfireball.net/projects/markdown/syntax', 'markdown');?> to markup your post.</span>
			</div>
		</div>
		<?$error = $errors&&$errors->has('user_id');?>
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
