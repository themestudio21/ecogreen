<div class="img-pagination">
    <?php $ecogreen_prevPost = get_previous_post();
    if($ecogreen_prevPost) {?>
        <div class="pagi-nav-box previous">
            <?php $ecogreen_prevthumbnail = get_the_post_thumbnail($ecogreen_prevPost->ID, array(150,150) ); $ecogreen_prev = esc_html__('Previous post', 'ecogreen'); ?>
            <?php previous_post_link('%link',"<div class='img-pagi'><i class='lnr lnr-arrow-left'></i> 
            $ecogreen_prevthumbnail</div>  <div class='imgpagi-box'><p>$ecogreen_prev</p> <h4 class='pagi-title'>%title</h4> </div>"); ?> 
        </div>

    <?php } $ecogreen_nextPost = get_next_post();  
    if($ecogreen_nextPost) { ?>
        <div class="pagi-nav-box next">
            <?php $ecogreen_nextthumbnail = get_the_post_thumbnail($ecogreen_nextPost->ID, array(150,150) ); $ecogreen_next = esc_html__('Next post', 'ecogreen'); ?>
            <?php next_post_link('%link',"<div class='imgpagi-box'><p>$ecogreen_next</p><h4 class='pagi-title'>%title</h4> </div> <div class='img-pagi'><i class='lnr lnr-arrow-right'></i>
            $ecogreen_nextthumbnail</div> "); ?>
        </div>
    <?php } ?>
</div><!--/.img-pagination-->