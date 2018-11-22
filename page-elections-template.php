<?php	

	/*
		Template Name: Election Template

		==================================================
			Custom template for the page election.
		==================================================	
	 */

?>

<?php get_header(); ?>	

<?php

	/*
		FILTER_SANITIZE_NUMBER_FLOAT
 	   	FILTER_SANITIZE_SPECIAL_CHARS
    	FILTER_SANITIZE_STRING
    	FILTER_SANITIZE_URL
    	FILTER_SANITIZE_ENCODED

 	
		$var=(filter_var($var, FILTER_SANITIZE_NUMBER_INT));
		$var=(filter_var($var,  FILTER_SANITIZE_EMAIL));
		$var=(filter_var($var, FILTER_SANITIZE_STRING));

esc_html() – Use this function anytime an HTML element encloses a section of data being displayed.
esc_url() – Use this function on all URLs, including those in the src and href attributes of an HTML element.
esc_js() – Use this function for inline Javascript.
esc_attr() – Use this function on everything else that’s printed into an HTML element’s attribute.
esc_textarea() – encodes text for use inside a textarea element.

	 */
?>
<?php //echo get_site_url(); ?>
<?php //var_dump( $GLOBALS['wp_query'] ); ?>

<div class="row"> <!-- Main Row -->
	<div class="col-12 col-sm-8">	<!-- Content Column -->
		<div class="row"> <!-- Races Row -->
<?php 

global $wpdb;
$params = array();

if (! get_query_var('race')): // Display Race Widget

	$params[1]  = filter_var(1, FILTER_SANITIZE_NUMBER_INT) ;
	$query = "SELECT raceUniqueID, title1, precintsPercentage FROM da_election_races WHERE raceActive = %s";
	$races = $wpdb->get_results( $wpdb->prepare( $query, $params) ) or die( $wpdb->last_error );

	foreach ($races as $race) {
		$params = array();
		$params[1]  = filter_var($race->raceUniqueID, FILTER_SANITIZE_STRING) ;
		$query = "SELECT * FROM da_election_candidates WHERE raceUniqueID = %s ORDER BY numberVotes Desc";
		$candidates = $wpdb->get_results( $wpdb->prepare( $query, $params) ) or die( $wpdb->last_error );

?>
			<div class="col-12 col-sm-6 col-md-4" style="margin-top:5px;">
				<div class="row">
					<div class="col-12"><h4><?php echo esc_html($race->title1); ?></h4></div>
					<div class="col-12"><h5><?php echo 'Reporting: ', esc_html($race->precintsPercentage), '%'; ?></h5></div>
					<?php foreach ($candidates as $cand) { ?>
						<div class="col-1"><h6><?php if ($cand->winner) echo 'X'; ?></h6></div>
						<div class="col-8">
							<h6><?php echo esc_html($cand->lastName), '(', esc_html($cand->affiliation), ')'; ?></h6>
						</div>
						<div class="col-2">
							<h6><?php echo esc_html($cand->percentageVotes), '%'; ?></h6>
						</div>
					<?php } ?>
					<?php $qparams = array( 'race' => $race->raceUniqueID ); ?>
					<div class="col-11">
						<a href="<?php echo add_query_arg($qparams, '/election/'); ?>"><small>Full Results</small></a>
					</div>
				</div>
			</div>
		<?php } ?>
<?php 

else: // Display Individual Page
	
	$params[1]  = filter_var(get_query_var('race'), FILTER_SANITIZE_STRING) ;
	$query = "SELECT raceUniqueID, title1, title2, lastUpdated, precintsPercentage FROM da_election_races WHERE raceUniqueID = %s";
	$race = $wpdb->get_row( $wpdb->prepare( $query, $params) ) or die( $wpdb->last_error );

?>

		<div class="col-12" style="margin-top: 15px;"><h1><?php echo esc_html($race->title1); ?></h1></div>
		<div class="col-12"><h3><?php echo esc_html($race->title2); ?></h3></div>
		<div class="col-12"><h5><?php echo 'Last Updated: ', esc_html($race->lastUpdated); ?></h5></div>
		<div class="col-11">
			<a href="/election/"><small>Back to Main Election Page</small></a>
		</div>

<?php endif; ?>
		</div> <!-- Races Row -->
	</div> <!-- End Content Column -->
	<div class="col-12 col-sm-4">	<!-- Sidebar Column -->
		<?php get_sidebar(); ?>
	</div>	<!-- End Sidebar Column -->
</div> <!-- End Main Row --->
<?php get_footer(); ?>