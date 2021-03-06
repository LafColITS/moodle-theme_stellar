<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$knownregionpre = $PAGE->blocks->is_known_region('side-pre');
$knownregionpost = $PAGE->blocks->is_known_region('side-post');

$regions = theme_stellar_bootstrap_grid($hassidepre, $hassidepost);
$PAGE->set_popup_notification_allowed(false);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<nav role="navigation" class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header pull-left">
            <?php echo $OUTPUT->navbar_brand(); ?>
            <?php echo $OUTPUT->navbar_button(); ?>
        </div>
        <div id="moodle-navbar" class="navbar-collapse collapse">
            <div class="navbar-header pull-left">
                <?php echo $OUTPUT->custom_menu(); ?>
            </div>
            <div class="navbar-header pull-right">
                <?php echo $OUTPUT->page_heading_menu(); ?>
                <?php echo $OUTPUT->user_menu(); ?>
            </div>
        </div>
    </div>
</nav>
<header class="moodleheader">
    <div class="container-fluid">
    </div>
</header>

<div id="page" class="container-fluid">
    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav" role="navigation" aria-label="breadcrumb"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button">
<?php
echo $OUTPUT->page_heading_button();
if ($knownregionpre || $knownregionpost) {
?>
                <div class="singlebutton visible-xs col-sm-2 skipregions">
                    <a href="#blockregion" class="btn btn-default"><?php echo get_string('skiptoblocks', 'theme_stellar'); ?></a>
                </div>
<?php
}
?>
            </div>
        </div>

        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content" class="row">
        <div id="region-main" class="<?php echo $regions['content']; ?>">
            <?php
            echo $OUTPUT->course_content_header();

            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </div>

        <a name="blockregion"></a>
<?php
if ($knownregionpre) {
    echo $OUTPUT->blocks('side-pre', $regions['pre']);
}
if ($knownregionpost) {
            echo $OUTPUT->blocks('side-post', $regions['post']);
}
?>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
