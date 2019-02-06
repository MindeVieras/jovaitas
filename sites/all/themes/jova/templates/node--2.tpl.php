<?php print $node->body['und'][0]['safe_value']; ?>

<div class="musu-sert">
	<h2><?php print t('Mūsų sertifikatai'); ?></h2>

	<?php
		$cert_query = new EntityFieldQuery();

		$cert_query->entityCondition('entity_type', 'node')
		  ->entityCondition('bundle', 'sertifikatas')
		  ->propertyCondition('status', NODE_PUBLISHED)
		  ->fieldCondition('field_image', 'fid', 'NULL', '!=')
		  ->fieldOrderBy('field_image', 'fid', 'ACS')
		  ->range(0, 10)
		  ->addMetaData('account', user_load(1)); // Run the query as user 1.

		$cert_result = $cert_query->execute();

		if (isset($cert_result['node'])) {
		  $cert_ids = array_keys($cert_result['node']);
		  $certs = entity_load('node', $cert_ids);
		}

		print '<div class="cert-popup-wrap">';
		foreach ($certs as $cert) {
			$lan = $cert->language;
			$cert_img_uri = $cert->field_image[$lan][0]['uri'];
			$cert_img_lg = file_create_url($cert_img_uri);
			$cert_img_sm = image_style_url('medium', $cert_img_uri);
			print '<a href="'.$cert_img_lg.'" style="background-image:url('.$cert_img_lg.')">
					<span class="cert-title">'.$cert->title.'</span>
				</a>';
		}
		print '</div>';

		//print('<pre>');print_r($certs);print('</pre>');
	?>

</div>

