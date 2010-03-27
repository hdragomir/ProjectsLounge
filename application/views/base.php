<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8" />
<title>Projects Lounge</title>

<meta http-equiv="X-UA-Compatible" content="chrome=1" />

<?php echo html::stylesheet( 'media/css/style.css' ); ?>

</head>

<body>

<div id="wrapper">

    <div id="header">
        <a id="branding" href="<?php echo url::base(); ?>" title="Projects Lounge"><img src="<?php echo url::site( 'media/images/projectslounge.png' ); ?>" alt="Projects Lounge" /></a>
    
        <form id="search" action="<?php echo url::site( 'search' ); ?>">
            <fieldset>
                <p>
                    <input type="text" id="search_field" name="s" value="members, projects" />
                </p>
                <p>
                    <input type="image" src="<?php echo url::site( 'media/images/btn_search.gif' ); ?>" id="btn_search" alt="Search" />
                </p>
            </fieldset>
        </form>
    </div>
    
    <a id="login" href="<?php echo url::site( 'login' ); ?>">Login to your account</a>
    
    <nav>
        <ul id="nav">
            <li class="first"><a href="<?php echo url::site( 'projects' ); ?>">Projects</a></li>
            <li><a href="<?php echo url::site( 'members' ); ?>">Members</a></li>
            <li><a href="<?php echo url::site( 'about' ); ?>">About</a></li>
            <li><a href="<?php echo url::site( 'contact' ); ?>">Contact</a></li>
            <li class="last"><a href="<?php echo url::site( 'projects/add' ); ?>">Add new project</a></li>
        </ul>
    </nav>
    <?php
        if( isset( $content ) )
            echo $content;
        else
            echo 'oups!';
        ?>
    <div id="footer_wrapper">
    <div id="footer">
    Copyright &#169; 2010 Projects Lounge. All rigts reserved
    <p>
        <a href="#">Home</a> | <a href="#">Projects</a> | <a href="#">Members</a> | <a href="#">About</a> | <a href="#">Contact</a>
    </p>
    </div>
</div>
<!-- {execution_time} {memory_usage} {included_files} files included -->
</body>
</html>