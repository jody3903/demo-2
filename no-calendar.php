<?php /* Template Name: No Calendar */ ?>

<html>

<head>

    <link rel='stylesheet' id='tuckerallen-styles-css'
        href='https://tuckerallenstg.wpengine.com/wp-content/themes/tuckerallen/library/css/style.css?v=202003175'
        type='text/css' media='all' />

</head>

<body style="background: white;">

    <div class="wrap cf">

        <main class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage"
            itemtype="http://schema.org/Blog">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope
                itemtype="http://schema.org/BlogPosting">

                <section class="entry-content cf" itemprop="articleBody">
                    <?php
									the_content();
								?>
                </section>

                <footer class="article-footer">

                </footer>

            </article>

            <?php endwhile; endif; ?>

        </main>

    </div>

</body>

</html>