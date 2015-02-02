<div class="analysisResults view">
<h2><?php echo __('Analysis Result'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($analysisResult['AnalysisResult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factors'); ?></dt>
		<dd>
			<?php echo $this->Html->link($analysisResult['Factors']['name'], array('controller' => 'factors', 'action' => 'view', $analysisResult['Factors']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($analysisResult['Users']['id'], array('controller' => 'users', 'action' => 'view', $analysisResult['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo h($analysisResult['AnalysisResult']['score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($analysisResult['AnalysisResult']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($analysisResult['AnalysisResult']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($analysisResult['AnalysisResult']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Analysis Result'), array('action' => 'edit', $analysisResult['AnalysisResult']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Analysis Result'), array('action' => 'delete', $analysisResult['AnalysisResult']['id']), null, __('Are you sure you want to delete # %s?', $analysisResult['AnalysisResult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Analysis Results'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Analysis Result'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Factors'), array('controller' => 'factors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Factors'), array('controller' => 'factors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
