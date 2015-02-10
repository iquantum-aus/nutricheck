<?php $group_id = $this->Session->read('Auth.User.group_id'); ?>

<div class="users index">
    
	<form method="POST" style="width: 50%;" action="/admin/users<?php if(!empty($_GET['mode'])) { echo "/?mode=".$_GET['mode']; } ?>">
		<input placeholder = "Enter Search Here" type="text" name="data[User][value]" style="width: 50%; float: left; clear: none;" value="<?php echo $search_value; ?>">
		<input type="submit" value="SEARCH" class="btn btn-success" name="data[User][search]" style="float: left; clear: none; margin-left: 10px;">
		<input type="submit" value="RESET" name="data[User][reset]" class="btn btn-danger" style="float: left; clear: none; margin-left: 5px;">
	</form>
	
	<?php 
		if($group_id == 5 || $group_id == 4) {
			?>
				<div class="left full">
					<?php if($group_id == 5) { ?><a class="list_toggle <?php if($_GET['mode'] == "client_group") { echo "active-link"; } ?>" href="?mode=client_group">List Client Groups</a><?php } ?>
					<a class="list_toggle <?php if($_GET['mode'] == "client") { echo "active-link"; } ?>" href="?mode=client">List Clients</a>
					<a class="list_toggle <?php if($_GET['mode'] == "member" || !isset($_GET['mode'])) { echo "active-link"; } ?>" href="?mode=member">List Members</a>
				</div>
			<?php
		}
	?>
	
	<table class="table">
    <tr>
        <th class="header"><?php echo $this->Paginator->sort('id');?></th>
        <th class="header">Name</th>
        <th class="header"><?php echo $this->Paginator->sort('email');?></th>
        <th class="header">Company</th>
        
		<?php if($group_id == 1) { ?>
			<th class="header"><?php echo $this->Paginator->sort('group_id');?></th>
		<?php } ?>
        
		<th class="header"><?php echo $this->Paginator->sort('created');?></th>
        <th class="header" style="text-align:center;"><?php echo $this->Paginator->sort('can_answer');?></th>
        <th class="header" style="text-align:center;"><?php echo $this->Paginator->sort('status');?></th>
        <th class="header center" style="text-align:center;"><?php echo __('Actions');?></th>
    </tr>
    
	<?php
    foreach ($users as $user) { ?>
		<tr>
				<td><?php echo h($user['User']['id']); ?></td>
				<td>
					<?php 
						if($user['User']['group_id'] == 3) {
							echo $user['UserProfile']['first_name']." ".$user['UserProfile']['last_name']; 
						}
					?>
				</td>
				<td><?php echo h($user['User']['email']); ?></td>
				
				<td>
					<?php 
						if($user['User']['group_id'] == 2) {
							if(!empty($user['UserProfile']['company'])) {
								echo h($user['UserProfile']['company']); 
							} else {
								echo "N/A";
							}
						}
					?>
				</td>
				
				<?php if($group_id == 1) { ?>
					<td><?php echo h($user['Group']['name']); ?></td>
				<?php } ?>
				
				<td><?php echo h($user['User']['created']); ?></td>
			
				<td style="text-align:center;">
					<?php
						if($user['User']['group_id'] == 3) {
							$adminRoleName = array('admin', 'administrator');
							if(in_array(strtolower($user['Group']['name']), $adminRoleName)){//Admin
								echo $this->Html->image('/acl_management/img/icons/tick_disabled.png');
							}else{
								echo '<span style="cursor: pointer">';
								echo $this->Html->image('/acl_management/img/icons/allow-' . intval($user['User']['can_answer']) . '.png',
									array('onclick' => 'published.toggle("can_answer-'.$user['User']['id'].'", "'.$this->Html->url('/acl_management/users/toggle_can_answer/').$user['User']['id'].'/'.intval($user['User']['can_answer']).'");',
										  'id' => 'can_answer-'.$user['User']['id']
										));
								echo '</span>';
							}
						}
					?>
				</td>				
				
				<td style="text-align:center;">
					<?php
						$adminRoleName = array('admin', 'administrator');
						if(in_array(strtolower($user['Group']['name']), $adminRoleName)){//Admin
							echo $this->Html->image('/acl_management/img/icons/tick_disabled.png');
						}else{
							echo '<span style="cursor: pointer">';
							echo $this->Html->image('/acl_management/img/icons/allow-' . intval($user['User']['status']) . '.png',
								array('onclick' => 'published.toggle("status-'.$user['User']['id'].'", "'.$this->Html->url('/acl_management/users/toggle/').$user['User']['id'].'/'.intval($user['User']['status']).'");',
									  'id' => 'status-'.$user['User']['id']
									));
							echo '</span>&nbsp;';
						}
					?>
				</td>
				<td class="center" style="text-align:center;">
					<div class="btn-group right">
					  <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class'=>'btn')); ?>
					  
					<?php if($user['User']['group_id'] == 3) { ?>
						<?php echo $this->Html->link(__('Alert'), array('plugin' => '', 'controller' => 'user_alerts', 'action' => 'alert_list', $user['User']['id']), array('class' => 'btn')); ?>
						<?php echo $this->Html->link(__('Report'), array('plugin' => '', 'controller' => 'users', 'action' => 'nutricheck_activity', $user['User']['id']), array('class' => 'btn')); ?>
					<?php } ?>
					  
					  <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class'=>'btn')); ?>
					  <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
					</div>
				</td>
		</tr>
    <?php } ?>
    </table>

    <?php echo $this->element('pagination');?>
</div>
<script type="text/javascript">
    var published = {
        toggle : function(id, url){
            obj = $('#'+id).parent();
            $.ajax({
                url: url,
                type: "POST",
                success: function(response){
                    obj.html(response);
                }
            });
        }
    };
</script>