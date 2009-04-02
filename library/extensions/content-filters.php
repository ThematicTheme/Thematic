<?php

// creates the $more_link_text for the_content
function more_text() {
	$content = ''.__('Read More <span class="meta-nav">&raquo;</span>', 'thematic').'';
	return apply_filters('more_text', $content);
}

?>