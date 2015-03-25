<?php
		
		/*
		Plugin Name: Test Spring Break Estimator
		Description: A plugin for estimating the cost of spring break vacations
		*/
		
		// calls sheet 'backend.php' which is where the administrator will be able to place a due date for the estimation.
		include ("backend.php");
		// Register style sheet to pull external style sheet to plugin (using built in WP add_actions)
		add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

		/**
		 * Register style sheet.
		 	The register_plugin function calls on wordpress' internal function to call the style sheet in the folder. Plugins_url calls the location of the style sheet. Enqueue and wp_register_style tie it to the proper plugin.
		 */
		function register_plugin_styles() {
			wp_register_style( 'sbestimator', plugins_url( 'sbestimator/style.css' ) );
			wp_enqueue_style( 'sbestimator' );
			}
		
		
		/*Lines 15-37 are codes that enable us to assign our different variables -the dates and destinations- to a specific number or value. We are 
		setting up 
		our variables so that we can make a formula later that will allow the plugin to echo an estimated cost when a user picks a specific destination 
		and date.*/
		
		/* On lines 16-20, we are saying that city0 will have a value of 750, city1 as 900, city2 as 1208, city3 as 1207, and city4 as 890. 
		$submittedCity allows users to pick a speciifc destination from our given list. It is a variable that fills with whichever city the user 
		selects
		*/ 	
		    function vacationBookingPlugin() {
		        
		        $submittedCity = "";
		        $city0 = 750;
		        $city1 = 900;
		        $city2 = 1208;
		        $city3 = 1207;
		        $city4 = 890;
		        
		/* The following conditions check for values. If it is not null, or if something is set in the $_POST["DestinationList"] key, then assign the 
		values given in that key to the $submittedValue.*/          
		        if (isset($_POST["DestinationList"])) {
		            $submittedValue = $_POST["DestinationList"];
		        }
		        
		
		
		/* On lines 35-38, we are saying that date1 will have a value of 1.5, date2 as 2, date3 as 2.4, and date4 as 1.75. 
		$submitteddatw allows users to pick a speciifc date from our given list. It is a variable that fills with whichever date the user selects. Same 
		as line 62, $submittedCity */            
		        $submitteddate = "";
		        $date1 = 1.5;
		        $date2 = 2;
		        $date3 = 2.4;
		        $date4 = 1.75;
		
		/* The following conditions check for values. If it is not null, or if something is set in the $_POST["DateList"] key, then assign the values 
		given in that key to the $submittedValue. This is the same as the if condition on lines 23-25.*/     
		        if (isset($_POST["DateList"])) {
		            $submittedValue = $_POST["DateList"];
		        }
		        
		/*The code below is an HTML form for user input. It can contain normal content, markup, or controls (like checkboxes, radio buttons, menus), 
		and labels on those controls. Lines 54-60 requires users to complete a form, called dates, by  modifying its controls. In this case, users are required to 
		select from the Destination List  and the Date List before clicking submit.*/    
		
		/*The options tag defines an option in a select list. The value attribute explains the option. Lines 55-59 states that Cancun is equal to $
		city0, Punta Cana to $city1, Panama to $city2, New York to $city3, and Colorado Springs to $city4. If you check lines 16-20, we have assinged city keys to 
		specific numbers. Therefore, Cancun will have a value of 750, Punta Cana will have a value of 900, Panama with 1208, New York with 1207, and Colorado 
		Springs	with 890*/
		
		/*The same thing applies to lines 65-69 states that Feb 28 - Mar 7 is equal to $date1, Mar 8 - 14 to $date2, Mar 15 - Mar 21 to $date3, and Mar 
		22 - Mar 28 to $date4. On lines 35-38, we have assinged the date keys to specific values. Therefore, Feb 28 - Mar 7 will have a value of 1.5, Mar 8 - 14 
		will have a value of 2, Mar 15 - Mar 21 with 2.4, and Mar 22 - Mar 28 with 1.75 */   
		
		
		 echo '<div class="sbe">';
		
?>
			<!-- Displays title of plugin -->
			<h1>Spring Break Estimator</h1> </br>	
			<!--Display drop down list of destinations -->	
		        <h2>Destinations List:</h2> 	
			<!-- Creates from of dates to pull from itself via the post method-->
		        <form action="" name="dates" method="post">
		  	<!-- Creates Destination list of cities to be assigned a value to be used at further time -->
		        <select project="DestinationList" id="DestinationList" name="DestinationList">
		         <option value = <?php echo $city0; ?> >Cancun</option>
		         <option value = <?php echo $city1; ?> >Punta Cana</option>
		         <option value = <?php echo $city2; ?> >Panama</option>
		         <option value = <?php echo $city3; ?> >New York</option>
		         <option value = <?php echo $city4; ?> >Colorado Springs</option>
		        </select> <br> </br>
		     						
			
		        <h2>Dates:</h2> 
			<!-- Creates Date list of cities to be assigned a value multiplier to be used at further time -->

		        <select project="datesList" id="DateList" name="DateList">
		         <option value = "<?php echo $date1; ?>" >Feb 28 - Mar 7</option>
		         <option value = "<?php echo $date2; ?>" >Mar 7 - 14</option>
		         <option value = "<?php echo $date3; ?>" >Mar 14 - Mar 21</option>
		         <option value = "<?php echo $date4; ?>" >Mar 21 - Mar 28</option>
		        </select>
		        <input type="submit" name="submit" id="submit" value="Submit" /><br></br>
		        <!-- Estimated Cost creates box to display total of City value * Date multiplier value -->
		        <h2>Estimated Cost:</h2> 
		  
		       <!-- Creates box to echo "$" and then the total of destination times date -->
		       <input class="widefat" id= "widestyle" type="text" value=" <?php echo '$' . $equals = $_POST['DestinationList'] * $_POST['DateList'];?>"><br></br>
		
		
			<h2> This Estimate is valid until:</h2>
			<input class="widefat" id= "widestyle" type="text" value=" <?php echo 'Aug 21, 2014';?>">
			<p> Please <a href="http://phoenix.sheridanc.on.ca/~ccit1900/?page_id=9">contact us</a> for more info! </p>
			
<?php        
		       		
		echo '</div>';
	
		/*Line 114 code allows the user's chosen destination be multiplied by their chosen date. The result of it will be echoed as the amount for the estimated 
		cost. */   
		}
		
		add_action('travel-plugin', 'vacationBookingPlugin');
		
		/* This line of code adds a hook for a shortcode tag. Shortcodes are special tags inserted into a post that gets replaced with a different content when 
		viewed on the website. This can be used to make a widget appear on the post/page section instead of the widgets area on Wordpress. It can be used in widget areas, content fields or any input 
		fields.*/
		
		add_shortcode('book-it', 'vacationBookingPlugin');
?>