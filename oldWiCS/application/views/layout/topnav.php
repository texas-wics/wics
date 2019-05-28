<ul class="tabs">
<li<?=($active=='index'?' class="active"':'');?>><?=HTML::link_to_index('News');?></li>
<li<?=($active=='events'?' class="active"':'');?>><?=HTML::link_to_events('Events');?></li>
<li<?=($active=='about'?' class="active"':'');?>><?=HTML::link_to_about('About');?></li>
<li<?=($active=='photos'?' class="active"':'');?>><?=HTML::link_to_photos('Photos');?></li>
<li<?=($active=='sponsors'?' class="active"':'');?>><?=HTML::link_to_sponsors('Sponsors');?></li>
<li<?=($active=='contact'?' class="active"':'');?>><?=HTML::link_to_contact('Contact');?></li>
</ul>
