<?php
// Template name: Documentation-Page
?>


<?php get_header(); ?>

<?php get_template_part( '/template-parts/page', 'header' ); ?>


<div class="wrapper">
  <div class="documentation__nav">
  <a href="#" class="documentation__nav__item documentation__nav__item__active" data-type="all"><?php pll_e( "Alle" ); ?></a>
    <a href="#" class="documentation__nav__item" data-type="case_studies"><?php pll_e( "Case studies" ); ?></a>
    <a href="#" class="documentation__nav__item" data-type="videos"><?php pll_e( "Video's" ); ?></a>
    <a href="#" class="documentation__nav__item" data-type="presentaties"><?php pll_e( "Presentaties" ); ?></a>
    <a href="#" class="documentation__nav__item" data-type="templates"><?php pll_e( "Templates" ); ?></a>
  </div>

  <div class="documentation__article__grid">

          <?php $query = new WP_Query(array('post_type' => "documentatie")); ?>
          <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
           
            <div class="documentation__article__item">
              <h2><?php the_title(); ?></h2>
              <p><?php the_field("content"); ?></p>
              <?php $url = get_field("url");?>
              <?php if(!empty($url)): ?>
                <a href="<?php the_field("url"); ?>"><?php pll_e( "Download" ); ?></a>
              <?php else: ?>
                <a href="<?php the_field("file"); ?>"><?php pll_e( "Download" ); ?></a>
              <?php endif; ?>
            </div>
              
          <?php endwhile; endif; ?>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
  
  $(".documentation__nav__item").click(function(e){

    e.preventDefault();

    $(".documentation__nav__item").removeClass("documentation__nav__item__active");
    $(this).addClass("documentation__nav__item__active");

    $(".documentation__article__grid").empty();

    $(".documentation__article__grid").append("<div class='documentation__article__grid__loading'></div>");

    $.ajax({
      method: "POST",
      url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php',
      data:  {
        action: "filterDocumentation",
        type: $(this).attr("data-type")
      }
    })
    .success(function(data) {

        $(".documentation__article__grid").empty();

        if(!data){
           $(".documentation__article__grid").append("<p>Geen documentatie gevonden voor deze categorie.</p>");
        }else{
           $(".documentation__article__grid").append(data);
        }
        
    });

  });

</script>

<?php get_footer(); ?>
