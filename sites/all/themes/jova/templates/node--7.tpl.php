<?php print $node->body['und'][0]['value']; ?>

<div class="prist-info">
    <div class="pristatymas section"><i class="fa fa-truck"></i>
      	<div class="title"><?php print t('Pristaytmas'); ?></div>
      	<div class="text"><?php print variable_get('pristatymas'); ?></div>
    </div>
    <div class="siuntimas section"><i class="fa fa-clock-o"></i>
      	<div class="title"><?php print t('Siuntimas'); ?></div>
 		<div class="text"><?php print variable_get('siuntimas'); ?></div>
    </div>
</div>
