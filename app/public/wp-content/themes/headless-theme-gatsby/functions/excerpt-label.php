<?php
    add_filter( 'gettext', 'wpse22764_gettext', 10, 2 );
    
    function wpse22764_gettext( $translation, $original )
    {         
        if ( 'Excerpt' == $original  ) 
            {
                return ucfirst(  get_post_type() ) . ' Description';
            } else
            {
                $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
            
                if ($pos !== false) 
                {
                    return  null; //Change the default text you see below the box with link to learn more...
                }
            }
        return $translation;
    }

    
?> 