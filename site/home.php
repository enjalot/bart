<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!--opengraph required properties -->
        <meta property="og:title" content="Sketchflow" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="http://halftone.co/projects/temperatures/img/cover-image.png" />
        <meta property="og:description" content="This project displays over 100 years of NOAA monthly land temperature data collected from over 7,200 climate monitoring stations, with each month creating unique geometric artwork.e" />
        <meta property="og:url" content="http://halftone.co/projects/temperatures/" />

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link href='http://fonts.googleapis.com/css?family=Inika:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    </head>
    <body data-spy="scroll" data-target="#sidebar">

        <?php
        require('./wp/wp-blog-header.php');
        ?>
        <div id="sidebar" class="sidebar" data-spy="affix" data-offset-top="100">
            <ul class="sidenav nav">
               
                <li>
                    <a href="#articles">Writing</a>
                </li>
                <li>
                    <a href="#thoughts">Thoughts</a>
                </li>
                <li>
                    <a href="#data-vis">Data Visualization</a>
                </li>
                <li>
                    <a href="#comics">Comics</a>
                </li>
                <li>
                    <a href="#infographics">Infographics</a>
                </li>
            </ul>
        </div>    
        
<div id="container">
    <div id="posts">
        <div id="articles" class="section">
            <?php
            $posts = get_posts('category=174&numberposts=10&order=DESC&orderby=the_date');
            foreach ($posts as $post) : setup_postdata( $post ); ?>
            <div class="post" data-content="<?php the_excerpt(); ?> 
            ">
                <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>
                <div class="post-thumbnail"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>    
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <div id="thoughts" class="section">
            <?php
            $posts = get_posts('category=175&numberposts=10&order=DESC&orderby=the_date');
            foreach ($posts as $post) : setup_postdata( $post ); ?>
            <div class="post" data-content="<?php the_excerpt(); ?> 
            ">
                <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>
                <div class="post-thumbnail"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>    
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <div id="data-vis" class="section">
            <?php
            $posts = get_posts('category=140&numberposts=10&order=DESC&orderby=the_date');
            foreach ($posts as $post) : setup_postdata( $post ); ?>
            <div class="post" data-content="<?php the_excerpt(); ?> 
            ">
                <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>
                <div class="post-thumbnail"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>    
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <div id="comics" class="section">
            <?php
            $posts = get_posts('category=155&numberposts=10&order=DESC&orderby=the_date');
            foreach ($posts as $post) : setup_postdata( $post ); ?>
            <div class="post" data-content="<?php the_excerpt(); ?> 
            ">
                <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>
                <div class="post-thumbnail"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>    
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <div id="infographics" class="section">
            <?php
            $posts = get_posts('category=152&numberposts=10&order=DESC&orderby=the_date');
            foreach ($posts as $post) : setup_postdata( $post ); ?>
            <div class="post" data-content="<?php the_excerpt(); ?> 
            ">
                <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>
                <div class="post-thumbnail"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>    
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>

  
     
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
                         
                         
     <script src="js/vendor/bootstrap.min.js"></script>
     <script src="js/main.js"></script>

</body>
</html>