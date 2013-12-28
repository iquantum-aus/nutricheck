<div class="questions index">
	<h2><?php echo __('Questions'); ?></h2>
	
	<form method="POST">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Quest. #</th>
				<th>Question</th>
				<th class="actions">0 &nbsp;&nbsp;1 &nbsp;&nbsp;2 &nbsp;&nbsp;3</th>
			</tr>
			<?php foreach ($questions as $question): ?>
				<tr>
					<td style="text-align: center; font-weight: bold;"><?php echo h($question['Question']['id']); ?>&nbsp;</td>
					<td><?php echo h($question['Question']['question']); ?>&nbsp;</td>
					<input type="hidden" name="data[<?php echo $question['Question']['id']; ?>][Answer][questions_id]" id="AnswerQuestionId<?php echo $question['Question']['id']; ?>" value="<?php echo $question['Question']['id']; ?>">
					<td class="actions">
						<?php
							for($i = 0; $i<=3; $i++){
								?>
									<input required type="radio" name="data[<?php echo $question['Question']['id']; ?>][Answer][rank]" id="AnswerRank<?php echo $i; ?>" value="<?php echo $i; ?>">
								<?php
							}
						?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		<input type="submit" name="submit" value="Submit">
	</form>
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List User'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<style>
	* {
		outline: none;
	}
	.actions input {
		float: left;
		clear: none;
		margin-left: 11px;
	}
	
	.actions input:first-child {
		margin-left: 0;
	}
</style>
