<?php 

add_theme_support( 'post-thumbnails' ); 

include 'functions/excerpt-label.php';
include 'functions/register-graphql-fields/index.php';

include 'post-types/trainers.php';
include 'post-types/memberships.php';
include 'post-types/classes.php';
include 'post-types/challenges.php';

?>