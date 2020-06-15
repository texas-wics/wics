<div class="row">
    <div class="span16">
        <h1>Manage Events</h1>
        <p>Check boxes under "Delete" to delete a post. <strong>Deleteing a post is permanent.</strong></p>
        <?if($success = Session::get('success')){?>
            <div class="alert-message success fade in" data-alert="alert">
              <a class="close" href="#">×</a>
              <p><strong>Success</strong> <?=$success?></p>
            </div>
        <?}elseif($error = Session::get('error')){?>
            <div class="alert-message error fade in" data-alert="alert">
              <a class="close" href="#">×</a>
              <p><strong>Error</strong> <?=$error?></p>
            </div>
        <?}?>
        <script >
          $(function() {
            $("table#manage").tablesorter({ sortList: [[0,0]] });
          });
        </script>
        <?=Form::open();?>
        <table id="manage" class="zebra-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?foreach($this->events as $event){
                $event->render('Row');
            }?>
            </tbody>
        </table>
        <div class="actions" style="padding-left:20px">
            <?=Form::submit('Submit', array('class' => 'btn primary'));?>
            <?=Form::reset('Reset', array('class' => 'btn'));?>
        </div>
    </div>
</div>

