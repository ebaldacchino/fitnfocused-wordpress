<?php
    add_action( 'graphql_register_types', function() {
      include 'trainers.php';
      include 'memberships.php'; 
      include 'challenges.php';
    });
?>