<?php

function accessibility_data_array() {

  $accessibility_data['defaults']['guideline_types'] = array(
    'section508' => 'section508',
    'wcag1a' => 'wcag1a',
    'wcag1aa' => 'wcag1aa',
    'wcag1aaa' => 'wcag1aaa',
    'wcag2a' => 'wcag2a',
    'wcag2aa' => 'wcag2aa',
    'wcag2aaa' => 'wcag2aaa',
    'atag1' => 'atag1',
    'atag2' => 'atag2',
    'html5' => 'html5',
  );

  $accessibility_data['guideline_types'] = array(
    'section508' => array(
      'title' => 'Section 508 of 1998 United States Rehabilitation Act',
      'description' => NULL,
      'reference' => 'http://www.webaim.org/standards/508/checklist',
      'stardard_uri' => 'http://www.section508.gov/index.cfm?&FuseAction=Content&ID=12',
      ),
    'wcag1a' =>  array(
      'title' => 'WCAG 1.0 A. Priority 1 Web Content Accessibility Guidelines',
      'description' => 'Web developers must satisfy these requirements, otherwise it will be impossible for one or
        more groups to access the Web content. ',
      'reference' => 'http://www.w3.org/WAI/intro/atag.php',
      'stardard_uri' => 'http://www.w3.org/TR/WCAG10/'
      ),
    'wcag1aa' =>  array(
      'title' => 'WCAG 1.0 AA. Priority 2 Web Content Accessibility Guidelines',
      'description' => 'Web developers should satisfy these requirements, otherwise some groups will find it
        difficult to access the Web content. ',
      'reference' => 'http://www.w3.org/WAI/intro/atag.php',
      'stardard_uri' => 'http://www.w3.org/TR/WCAG10/'
      ),
    'wcag1aaa' =>  array(
      'title' => 'WCAG 1.0 AAA. Priority 3 Web Content Accessibility Guidelines',
      'description' => 'Web developers may satisfy these requirements, in order to make it
        easier for some groups to access the Web content. ',
      'reference' => 'http://www.w3.org/WAI/intro/atag.php',
      'stardard_uri' => 'http://www.w3.org/TR/WCAG10/'
      ),
    'wcag2a' => array(
      'title' => 'WCAG 2.0 A. Priority 1 Web Content Accessibility Guidelines',
      'description' => NULL,
      'reference' => 'http://www.w3.org/WAI/intro/wcag20',
      'stardard_uri' => 'http://www.w3.org/TR/WCAG20/'
      ),
    'wcag2aa' => array(
      'title' => 'WCAG 2.0 AA. Priority 2 Web Content Accessibility Guidelines',
      'description' => NULL,
      'reference' => 'http://www.w3.org/WAI/intro/wcag20',
      'stardard_uri' => 'http://www.w3.org/TR/WCAG20/'
      ),
    'wcag2aaa' => array(
      'title' => 'WCAG 2.0 AAA. Priority 3 Web Content Accessibility Guidelines',
      'description' => NULL,
      'reference' => 'http://www.w3.org/WAI/intro/wcag20',
      'stardard_uri' => 'http://www.w3.org/TR/WCAG20/'
      ),
    'atag1' =>   array(
      'title' => 'ATAG 1.0 (Authoring Tool Accessibility Guidelines)',
      'description' => 'Guidelines related to making web applications and authoring tools accessible.',
      'reference' => 'http://www.w3.org/WAI/intro/atag.php',
      'stardard_uri' => 'http://www.w3.org/TR/ATAG10/'
    ),
    'atag2' =>  array(
      'title' => 'ATAG 2.0 (Authoring Tool Accessibility Guidelines)',
      'description' => 'Guidelines related to making web applications and authoring tools accessible.',
      'reference' => NULL,
      'stardard_uri' => 'http://www.w3.org/TR/ATAG20/'
    ),
    'html5' =>  array(
      'title' => 'HTML 5',
      'description' => 'Use HTML 5 Elements.',
      'reference' => NULL,
      'stardard_uri' => '',
    ),
    'aria' =>  array(
      'title' => 'ARIA',
      'description' => 'Use ARIA Markup',
      'reference' => NULL,
      'stardard_uri' => '',
    ),
  );

  $accessibility_data['defaults']['tools'] = array (
    'quail' => 'quail',
    'fae' => 'fae',
    'evalaccess' => 'evalaccess',
  );

  $accessibility_data['tools'] = array(
    'quail' => array(
      'title' => 'quail',
      'description' => '',
      'reference' => "http://quail-lib.org/",
      ),
    'fae' => array(
      'title' => 'fae',
      'description' => '',
      'reference' => "http://fae.cita.uiuc.edu/",
      ),
    'evalaccess' => array(
      'title' => 'evalaccess',
      'description' => '',
      'reference' => "http://sipt07.si.ehu.es/evalaccess2/index.html",
      ),
    );

  // mapping of tips to contexts they should be shown in.

  $accessibility_data['contexts'] = array(
    'webforms' => array(
      'title' => 'Accessibility Tips for Web Forms',
      'tips' => array('fieldset_and_legend','optgroup'),
      'paths' => array('admin/structure/contact/add',
                    'admin/structure/contact/edit*'),
    ),
    'audio_and_video' => array(
      'title' => 'Accessibility Tips for Audio and Video',
      'tips' => array('transcript','transcript2','volume'),
      'paths' => array('*/swftools*'),
    ),
    'content' => array(
      'title' => 'Accessibility Tips for Content Writing',
      'tips' =>  array('content_writing','summary','scope','header','color','descriptive_headings_and_labels'),
      'paths' => array('node/edit*', 'admin/structure/block/configure*', 'node/add/*'),
    ),
    'blocks_and_menus' => array(
      'title' => 'Accessibility Tips for Content Writing',
      'tips' => array('skip_repitition','skip_nav','nav_to_content','headings', 'structured_links','develop_patterns'),
      'paths' => array('admin/structure/menu*',
        'admin/structure/block/configure*',
        'admin/structure/menu-customize*',
        'admin/structure/menu/item*'
        ),
    ),
  );

  // tips.  each tip should be of one type.

  $accessibility_data['tips']['fieldset_and_legend'] = array(
      'type' => 'wcag',
      'text' => 'Use the "fieldset" and "legend" attributes to add a description of groupings of form controls
      (<a href="http://www.w3.org/TR/UNDERSTANDING-WCAG20/content-structure-separation-programmatic.html"
      title="guidelines 1.3.1">guidelines 1.3.1</a> | <a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H71"
      title="technique for 1.3.1">technique 1.3.1 H71</a>)'
      );


  $accessibility_data['tips']['optgroup'] = array(
      'type' => 'wcag',
      'text' => 'In a "select" dropdown, use "optgroup" to group the "option" elements
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H85" title="technique for 1.3.1">technique 1.3.1 H85</a>)'
      );


  $accessibility_data['tips']['transcript'] = array(
      'type' => 'wcag',
      'text' => 'Provide a textual transcript of audio-only content (for a live audio stream, do this after the fact).
      (<a href="http://www.w3.org/TR/UNDERSTANDING-WCAG20/media-equiv-av-only-alt.html" title="guidelines for
      1.2.1">guideline 1.2.1</a> | <a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G158"
      title="technique for 1.2.1">technique 1.2.1 G158</a>)'
      );

  $accessibility_data['tips']['transcript2'] = array(
      'type' => 'wcag',
      'text' => 'For a pre-recorded or streaming video, link to textual information describing the video content.
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G159" title="technique for 1.2.1">technique 1.2.1 G159</a>)'
      );

  $accessibility_data['tips']['volume'] = array(
      'type' => 'wcag',
      'text' => 'If adding an audio clip more than 3 seconds in length, add a readily-usable feature
      near the beginning of the page to either pause/stop the audio or control the audio\'s volume independent
      of the user\'s native sound system. (<a href="http://www.w3.org/TR/UNDERSTANDING-WCAG20/visual-audio-contrast-dis-audio.html"
      title="guidelines for 1.4.2">guidelines 1.4.2</a> | <a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G170"
      title="technique for 1.4.2">technique 1.4.2 G170</a>)'
      );


  $accessibility_data['tips']['content_writing'] = array(
      'type' => 'wcag',
      'text' => 'For a pre-recorded or streaming video, link to textual information describing the video content.
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G159" title="technique for 1.2.1">technique 1.2.1 G159</a>)'
      );

  $accessibility_data['tips']['summary'] = array(
      'type' => 'wcag',
      'text' => 'When using a table to present data:
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H51" title="Techniques for 1.3.1">techniques 1.3.1</a>)'
      );



  $accessibility_data['tips']['scope'] = array(
      'type' => 'wcag',
      'text' => 'Use the "scope" attribute to associate header cells with data cells in a table of data
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H63" title="technique for 1.3.1">technique 1.3.1 H63</a>)'
      );


  $accessibility_data['tips']['header'] = array(
      'type' => 'wcag',
      'text' => 'Use header tags (h1, h2, h3, h4, h5, h6) to designate headings
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H42" title="technique for 1.3.1">technique 1.3.1 H42</a>)'
      );

  $accessibility_data['tips']['color'] = array(
      'type' => 'wcag',
      'text' => 'Ensure that color is not the only visual cue to prompt a user response or convey a visual relationship
      (<a href="http://www.w3.org/TR/UNDERSTANDING-WCAG20/visual-audio-contrast-without-color.html" title="guidelines 1.4.1">guidelines 1.4.1 |
      <a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G182" title="techniques for 1.4.1">technique 1.4.1 G182</a>)'
      );

  $accessibility_data['tips']['descriptive_headings_and_labels'] = array(
      'type' => 'wcag',
      'text' => 'Use descriptive headings and labels to describe information and sections of content
      (<a href="http://www.w3.org/WAI/WCAG20/quickref/#qr-navigation-mechanisms-descriptive" title="guidelines for 2.4.6">guidelines 2.4.6</a> |
      <a href="http://www.w3.org/TR/UNDERSTANDING-WCAG20/navigation-mechanisms-descriptive.html" title="techniques for 2.4.6">techniques 2.4.6</a>)'
      );

  $accessibility_data['tips']['skip_repitition'] = array(
      'type' => 'wcag',
      'text' => 'Add a link at the top of a block of repeated content to go to the end of that block
      (<a href="http://www.w3.org/TR/UNDERSTANDING-WCAG20/navigation-mechanisms-skip.html" title="guideline 2.4.1">guidelines 2.4.1</a> |
      <a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G123" title="technique for 2.4.1 G123">technique 2.4.1 G123</a>)'
      );

  $accessibility_data['tips']['skip_nav'] = array(
      'type' => 'wcag',
      'text' =>'Add a link at the top of a navigation scheme to skip directly to the main content of the page
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G1" title="">technique 2.4.1 G1</a>)'
      );

  $accessibility_data['tips']['nav_to_content'] = array(
      'type' => 'wcag',
      'text' =>'Add a link at the top of a navigation scheme to go directly to each important area of content on a page
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G124" title="technique 2.4.1 G124">technique 2.4.1 G124</a>)'
    );

  $accessibility_data['tips']['headings'] = array(
      'type' => 'wcag',
      'text' => 'Provide meaningful heading elements at the beginning of each block of content
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H69" title="technique 2.4.1 H69">technique 2.4.1 H69</a>)'
      );

  $accessibility_data['tips']['structured_links'] = array(
      'type' => 'wcag',
      'text' =>'Use structural elements (ul, li, map, etc.) to group links
      (<a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/H50" title="technique 2.4.1 H50">technique 2.4.1 H50</a>)'
      );

  $accessibility_data['tips']['develop_patterns'] = array(
      'type' => 'wcag',
      'text' => 'Make separate components that have the same functionality identifiable as consistent and similar
      (<a href="http://www.w3.org/WAI/WCAG20/quickref/#qr-consistent-behavior-consistent-functionality" title="guidelines 3.2.4">guidelines 3.2.4</a> |
      <a href="http://www.w3.org/TR/2008/NOTE-WCAG20-TECHS-20081211/G197" title="technique 3.2.4 G197">technique 3.2.4 G197</a>)'
      );

  return $accessibility_data;
}
