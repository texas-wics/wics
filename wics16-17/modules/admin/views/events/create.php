<div class="row">
    <div class="span16">
        <?
        $isupdate = isset($post);
        $h1 = $isupdate ? 'Update' : 'Create New';
        ?>
        <h1><?=$h1?> Event</h1>
        <?if($success = Session::get('success')){?>
            <div class="alert-message success fade in" data-alert="alert">
              <a class="close" href="#">×</a>
              <p><strong>Success</strong> <?=$success?></p>
            </div>
        <?}?>
        <?if($errors = Session::get('errors')){?>
            <div class="alert-message error fade in" data-alert="alert">
              <a class="close" href="#">×</a>
              <? $msg = count($errors) ? "Please fix the following errors" : "An unknown error has occured"; ?>
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
            <?=Form::label('name', 'Title');?>
            <div class="input<?=$error?' error':''?>">
            <?=Form::text('name', Input::old('name', $default), array('class' => 'span10'));?>
            <?if($error){?>
                <span class="help-inline"><?=$errors->first('name');?></span>
            <?}?>
            </div>
        </div>
        <?
        $error = $errors&&$errors->has('description');
        $default = $isupdate ? $post->description : '';
        ?>
        <div class="clearfix<?=$error?' error':''?>">
            <?=Form::label('description', 'Description');?>
            <div class="input <?=$error?' error':''?>">
            <?=Form::textarea('description', Input::old('description', $default), array('class' => 'span10'));?>
            <?if($error){?>
                <span class="help-inline"><?=$errors->first('description');?></span>
            <?}?>
            <span class="help-block">Please use <?=HTML::link('http://daringfireball.net/projects/description/syntax', 'description');?> to markup your post.</span>
            </div>
        </div>
        <?
        $error = $errors&&$errors->has('user_id');
        $default = $isupdate ? $post->user_id : '';
        ?>
        <div class="clearfix<?=$error?' error':''?>">
            <?=Form::label('user_id', 'Author');?>
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
        <?$error = $errors&&$errors->has('location');?>
        <div class="clearfix<?=$error?' error':''?>">
            <?=Form::label('location', 'Location');?>
            <div class="input<?=$error?' error':''?>">
            <?=Form::text('location', Input::old('location', $default), array('class' => 'span10'));?>
            <?if($error){?>
                <span class="help-inline"><?=$errors->first('location');?></span>
            <?}?>
            </div>
        </div>
        <?$error = $errors&&$errors->has('start_time');?>
        <div class="clearfix<?=$error?' error':''?>">
            <?=Form::label('start_time', 'Start Time');?>
            <div class="input<?=$error?' error':''?>">
            <?=Form::text('start_date', Input::old('start_date', $default), array('class' => 'span10'));?>
            <?for ($i = strtotime('12:00AM'); $i <= strtotime('11:45PM'); $i += 900) {
                $time_array[date('G:i:s',$i)] = date('g:i A',$i);
            } ?>
            <?=Form::select('start_time', $time_array, Input::old('start_time', $default))?>
            <?if($error){?>
                <span class="help-inline"><?=$errors->first('start_time');?></span>
            <?}?>
            </div>
        </div>
        <?$error = $errors&&$errors->has('end_time');?>
        <div class="clearfix<?=$error?' error':''?>">
            <?=Form::label('end_time', 'End Time');?>
            <div class="input<?=$error?' error':''?>">
            <?=Form::text('end_date', Input::old('end_date', $default), array('class' => 'span10'));?>
            <?=Form::select('end_time', $time_array, Input::old('end_time', $default))?>
            <?if($error){?>
                <span class="help-inline"><?=$errors->first('end_time');?></span>
            <?}?>
            </div>
        </div>
        <?$error = $errors&&$errors->has('rsvp');?>
        <div class="clearfix<?=$error?' error':''?>">
            <?=Form::label('rsvp', 'Requires RSVP?');?>
            <div class="input<?=$error?' error':''?>">
            <?=Form::checkbox('rsvp', '1', Input::old('rsvp'));?>
            <?if($error){?>
                <span class="help-inline"><?=$errors->first('rsvp');?></span>
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
