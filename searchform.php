<?php
/**
 * Search Form Template
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" name="s" placeholder="Buscar..." value="<?php echo esc_attr( get_search_query() ); ?>" />
	<button type="submit" class="button">Buscar</button>
</form>
