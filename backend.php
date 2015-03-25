<?php
/*
Plugin Name: Test Spring Break Estimator
 */
//this function creates the option page for the SBE plugin to create options for the site adminsitrator to select and display to the site user
function spring_option_page()
{
	?>
	<div class="wrap">
	// activates a function to write on the backend of the WP Plugin SBE for the administrator to see
	<?php screen_icon(); ?>
	<h2>Test Spring Break Estimator</h2>
	<p>Welcome to the Test Spring Break Estimator Plugin. Here you can customize how long you would like the vacation package offers will be valid till.</p>
	<p>
        Valid Until: <input id= "widestyle" type="text" value="">
        </p>
	</div>
	<?php
}


function spring_plugin_menu()
{
	add_options_page('Test Spring Break Estimator Settings','Test Spring Break Estimator', 'manage_options', 'spring-validation-plugin', 'spring_option_page');
}
add_action('admin_menu', 'spring_plugin_menu');