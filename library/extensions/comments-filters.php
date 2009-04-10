<?php

// creates the $more_link_text for the_content
function list_comments_arg() {
	$content = 'type=comment&callback=thematic_comments';
	return apply_filters('list_comments_arg', $content);
}

?>