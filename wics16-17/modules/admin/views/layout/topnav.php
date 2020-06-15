<div class="topbar">
  <div class="fill">
    <div class="container">
      <a class="brand" href="#">WiCS | Admin</a>
      <ul class="nav">
      	<li<?=($active=='admin'?' class="active"':'');?>><?=HTML::link_to_admin('Home');?></li>
        <li<?=($active=='users'?' class="active"':'');?>><?=HTML::link_to_usersmanage('Users');?></li>
        <li<?=($active=='roles'?' class="active"':'');?>><?=HTML::link_to_rolesmanage('Roles');?></li>
        <li<?=($active=='posts'?' class="active"':'');?>><?=HTML::link_to_postsmanage('Posts');?></li>
        <li<?=($active=='events'?' class="active"':'');?>><?=HTML::link_to_eventsmanage('Events');?></li>
        <li><?=HTML::link_to_logout('Logout');?></li>
      </ul>
    </div>
  </div>
</div>
