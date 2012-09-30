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

/**
 * Layout for Moodle's tiny theme.
 *
 * @package   theme
 * @copyright 2012 Mary Evans
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasheader = (empty($PAGE->layout_options['noheader']));
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$haslogininfo = (empty($PAGE->layout_options['nologininfo']));
$hasfootnote = (!empty($PAGE->theme->settings->footnote));
$haslogo = (!empty($PAGE->theme->settings->logo));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($haslogo) {
    $bodyclasses[] = 'has-logo';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta charset="utf-8" />
     <!-- Le Google font -->
    <link href='http://fonts.googleapis.com/css?family=UnifrakturMaguntia' rel='stylesheet' type='text/css' />

    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('ico/favicon', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-144-precomposed', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-114-precomposed', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-72-precomposed', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-57-precomposed', 'theme'); ?>" />


    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">

<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="page">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo $CFG->wwwroot; ?>">The Tiny Project</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?php echo $CFG->wwwroot; ?>"><i class="icon-home icon-white"></i> <?php echo get_string('home'); ?></a></li>
              <li><a href="mailto:your-email@address"><i class="icon-envelope icon-white"></i> <?php echo get_string('contact', 'theme_tiny'); ?></a></li>
              <li class="dropdown">
              <?php
          if (isloggedin() || isguestuser()) { ?>
                <a href="<?php echo $CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id;?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $USER->firstname.'&nbsp;'.$USER->lastname; ?>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $CFG->wwwroot ?>/my/"><i class="icon-tasks"></i> <?php echo get_string('mycourses'); ?></a></li>
                  <li><a href="#"><i class="icon-briefcase"></i> My private files</a></li>
                  <li><a href="#"><i class="icon-edit"></i> Edit my profile</a></li>
                  <?php
          } else { ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-leaf icon-white"></i> <?php echo get_string('about','theme_tiny'); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                  <?php
          } ?>
                </ul>
              </li>
            </ul>

            <?php include('navbarlogin.php'); ?>

         </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div id="page-header"></div>

    <div class="container-fluid">

      <!-- Main default unit for a primary marketing message or call to action -->
      <div class="default-unit">

        <h1>Hello, world!</h1>
        <p>Welome to "The Tiny Project" a new Moodle 2.3+ theme based on a template from <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap 2.0</a>.</p>
        <p>Incorporating Google fonts and IE7 work-arounds, makes for an interesting project. So why not use it as a starting point to create something more unique...</p>
        <p><a class="btn btn-large" href="http://docs.moodle.org/23/en/Tiny_theme_for_Moodle_2.3"><i class="icon-hand-right"></i>&nbsp;&nbsp;Learn more</a></p>

      </div>

      <!-- row 1 -->

             <div class="tiny-row-fluid">
              <div class="span3 left" >
                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
                </div>
                <?php } ?>
              </div>
              <div class="span6">
                <div id="region-main">
                  <div class="region-content">
                    <?php echo $OUTPUT->main_content(); ?>
                  </div>
                </div>
              </div>
              <div class="span3 right">
                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
                </div>
                <?php } ?>
              </div>
            </div>
      <!-- end row 1 -->

      <hr>
 <div id="page-footer"></div>
      <footer>
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>

                <?php if ($hasfootnote) { ?>
                        <div id="footnote"><?php echo $PAGE->theme->settings->footnote;?></div>
                <?php } ?>

                <?php
                include('navbarlogin.php');
                echo $OUTPUT->standard_footer_html();
        ?>
      </footer>

    </div> <!-- /container -->
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>