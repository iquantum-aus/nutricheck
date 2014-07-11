<div class="users view">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit User</li>
</ul>
<table class="table">
    <tbody>
        <tr>
            <d><?php echo __('Id'); ?></td>
            <td><?php echo h($user['User']['id']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Email'); ?></td>
            <td><?php echo h($user['User']['email']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Group'); ?></td>
            <td><?php echo h($user['Group']['name']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td><?php echo h($user['User']['created']); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td><?php echo h($user['User']['modified']); ?></td>
        </tr>
    </tbody>
</table>  
</div>
