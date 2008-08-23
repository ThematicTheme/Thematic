<?php

// Get the page number adapted from http://efficienttips.com/wordpress-seo-title-description-tag/
function pageGetPageNo()
{
    if (get_query_var('paged'))
    {
        print ' | Page ' . get_query_var('paged');
    }
}

?>