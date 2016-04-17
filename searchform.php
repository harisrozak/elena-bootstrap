<?php
/**
 * Template for displaying search forms.
 *
 * @link https://codex.wordpress.org/Function_Reference/get_search_form
 *
 * @package WordPress
 * @subpackage Elena
 */
?>

<form class="search-form-widget" role="search" action="<?php echo home_url() ; ?>/">
	<div class="inline-search-form">
		<input type="text" class="form-control" placeholder="Enter to search.." value="<?php echo get_search_query() ?>" name="s" id="s">
		<button type="submit" class="btn btn-default">Search</button>
	</div>	
	<div class="clearfix"></div>
</form>