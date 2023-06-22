<?php
/**
 * Title: Report Writing, with icon
 * Slug: writers-theme/report-writing
 */
?>
<!-- wp:group {
"layout":{"type":"constrained"},
"className": "col-lg-4 pb-5"
} -->
<div class="wp-block-group col-lg-4 pb-5">
    <!-- wp:image {"width":64,"height":64,"sizeSlug":"full"} -->
    <figure class="wp-block-image size-full is-resized">
        <img src="<?php echo esc_url(WRITERS_THEME_DIR_URI.'/assets/images/pdf-svgrepo-com.png') ?>"
             alt="<?php echo esc_html__("Report Writing svg", 'writers-theme') ?>"
             width="64" height="64"/>
    </figure>
    <!-- /wp:image -->

    <!-- wp:heading {
    "level":4,
    "className":"pt-4 text-dark display-3 text-lg-center fw-bolder"
    } -->
    <h4 class="wp-block-heading mt-4 pb-4 text-black">
        <?php echo esc_html__("Report Writing", 'writers-theme') ?>
    </h4>
    <!-- /wp:heading -->

    <!-- wp:paragraph {
    "className":"mt-2 pb-4 text-secondary fs-5 lh-sm"
    } -->
    <p class="wp-block-paragraph mt-2 pb-4 text-secondary fs-5 lh-sm">
        <?php echo esc_html__("Our report writing service delivers comprehensive and well-structured reports tailored to your specific needs, ensuring accurate and concise presentation of information.", 'writers-theme') ?>
    </p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
