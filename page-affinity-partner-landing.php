<?php
/*
 Template Name: Affinity Partner Landing Page
 *
*/
?>

<?php get_header(); ?>


      <?php if(has_post_thumbnail()): ?>
        <div id="banner_int">
          <div class="banner_img"><?php the_post_thumbnail(full); ?></div>
          <div class="banner_inner">
            <div class="blue_wedge"></div>
            <div class="white_wedge"></div>
          </div>
        </div>
      <?php endif; ?>


      <div id="content">

        <div id="inner-content" class="wrap cf">

          <main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

              <section class="entry-content cf" itemprop="articleBody">
                <?php
                  the_content();
                ?>
              </section>

              <footer class="article-footer">

              </footer>

            </article>

            <?php
              wp_enqueue_script( 'tuckerallen-affinity-landing-pages' );
              $affinityPartner = array();
              $organizationName = get_post_meta($post->ID, 'wpcf-affinity-partner-organization-name', true);
              if (!empty($organizationName)) $affinityPartner['organizationName'] = $organizationName;
              wp_localize_script( 'tuckerallen-affinity-landing-pages', 'affinityPartner', $affinityPartner );
            ?>

            <?php endwhile; endif; ?>

          </main>

        </div>

      </div>




<?php get_footer(); ?>
