<?php
//DEBUG Mode
if(DEVELOPMENT_ENVIRONMENT):
	$router = new Router();
	$router->map('GET|POST','/', 'home#index', 'home');
	$router->map('GET','/api', 'brigdeOut', 'apiout');
	$router->map('POST','/api', 'brigdeIn', 'apiin');

	// match current request
	$match = $router->match();
	?>
	<h1>Router</h1>
	<h4>Mapping api In/Out to simulate bridgeIn/bridgeOut</h4>

	<h3>Current request: </h3>
	<pre>
		Target: <?php var_dump($match['target']); ?>
		Params: <?php var_dump($match['params']); ?>
		Name: 	<?php var_dump($match['name']); ?>
	</pre>

	<h3>Try these requests: </h3>
	<p><a href="<?php echo $router->generate('apiin'); ?>">GET <?php echo $router->generate('apiin'); ?></a></p>
	<p><form action="<?php echo $router->generate('apiout', array('id' => 10, 'action' => 'update')); ?>" method="post"><button type="submit">POST <?php echo $router->generate('apiout', array('id' => 10, 'action' => 'update')); ?></button></form></p>
<?php
endif;
?>
