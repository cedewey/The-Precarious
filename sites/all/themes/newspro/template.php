<?php
// $Id$

//if (drupal_is_front_page()) drupal_add_js(drupal_get_path('theme', 'newspro') . '/js/jquery-1.4.2.min.js');
//drupal_add_js(drupal_get_path('theme', 'newspro') . '/js/jquery.main.js');
//drupal_add_js(drupal_get_path('theme', 'newspro') . '/js/tabs.js');

drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 8', '!IE' => FALSE), 'preprocess' => FALSE));

function newspro_tm_skin() {
	switch (theme_get_setting('tm_skin')) {
		case 0:
			return ' blue';
			break;
		case 1:
			return ' green';
			break;
		case 2:
			return ' red';
			break;
		default:
			return ' blue';
	}
}

function newspro_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb['breadcrumb'])) {
	$out = '';
	foreach ($breadcrumb['breadcrumb'] as $data) {
		$out .= '<li>'.$data.'</li>';
	}
	return '<ul class="breadcrumbs">'. $out .'</ul>';
  }
}
/*
function newspro_set_tabs($bid, $title, $content, $isout = false) {
  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
  }
  if ($isout) {
	$out_t = '';
	$out_c = '';
	$i = 0;
	foreach ($tabs as $data) {
		if (!$i) $ac = ' class="active"'; else  $ac = '';
		$out_t .= '<li><a href="#tab'.$data->bid.'">'.$data->title.'</a></li>';
		$out_c .= '<div class="post-list-holder" id="tab'.$data->bid.'">'.$data->content.'</div>';
		$i++;
	}
	return '<div class="box"><div class="holder"><div class="frame"><div class="tabset-holder"><ul class="tabset">'. $out_t .'</ul></div><div class="tabcontent">'.$out_c.'</div></div></div></div>';
  }
}
*/
/*
function newspro_set_tabs($bid, $title, $content, $isout = false) {
  if ($bid) {
    $_SESSION['block_tabs'][$bid]->bid = $bid;
    $_SESSION['block_tabs'][$bid]->title = $title;
    $_SESSION['block_tabs'][$bid]->content = $content;
  }
  if ($isout and isset($_SESSION['block_tabs']) and is_array($_SESSION['block_tabs'])) {
	$out_t = '';
	$out_c = '';
	$i = 0;
	foreach ($_SESSION['block_tabs'] as $value) {
		if (!$i) $ac = ' class="active"'; else  $ac = '';
		if ($value->title == '') $value->title = '?';
		$out_t .= '<li><a href="#tab'.$value->bid.'">'.$value->title.'</a></li>';
		$out_c .= '<div class="post-list-holder" id="tab'.$value->bid.'">'.$value->content.'</div>';
		$i++;
	}
	unset($_SESSION['block_tabs']);
	return '<div class="box"><div class="holder"><div class="frame"><div class="tabset-holder"><ul class="tabset">'. $out_t .'</ul></div><div class="tabcontent">'.$out_c.'</div></div></div></div>';
  }
}
*/
/*
$block_tabs = array();

$block_tabs['t']['bid'] = 0;
$block_tabs['t']['title'] = '1';
$block_tabs['t']['content'] = '1';

function newspro_set_tabs($bid, $title, $content, $isout = false) {
  global $block_tabs; 
  if ($bid) {
    $block_tabs[$bid]['bid'] = $bid;
    $block_tabs[$bid]['title'] = $title;
    $block_tabs[$bid]['content'] = $content;
  }
  if ($isout and isset($block_tabs) and is_array($block_tabs)) {
	  $out_t = '';
	  $out_c = '';
	  $i = 0;
	  foreach ($block_tabs as $value) {
		  if (!$i) $ac = ' class="active"'; else  $ac = '';
		  if ($value['title'] == '') $value['title'] = '?';
		  $out_t .= '<li><a href="#tab'.$value['bid'].'">'.$value['title'].'</a></li>';
		  $out_c .= '<div class="post-list-holder" id="tab'.$value['bid'].'">'.$value['content'].'</div>';
		  $i++;
	  }
	  unset($block_tabs);
	  return '<div class="box"><div class="holder"><div class="frame"><div class="tabset-holder"><ul class="tabset">'. $out_t .'</ul></div><div class="tabcontent">'.$out_c.'</div></div></div></div>';
  }
}
*/

function newspro_set_tabs($bid, $title, $content, $isout = true) {
  static $block_tabs = array();
  if ($bid) {
    $block_tabs[$bid]['bid'] = $bid;
    $block_tabs[$bid]['title'] = $title;
    $block_tabs[$bid]['content'] = $content;
  }
  if ($isout and isset($block_tabs) and is_array($block_tabs)) {
	  $out_t = '';
	  $out_c = '';
	  $i = 0;
	  foreach ($block_tabs as $value) {
		  if (!$i) $ac = ' class="active"'; else  $ac = '';
		  if ($value['title'] == '') $value['title'] = '?';
		  $out_t .= '<li><a href="#tab'.$value['bid'].'">'.$value['title'].'</a></li>';
		  $out_c .= '<div class="post-list-holder" id="tab'.$value['bid'].'">'.$value['content'].'</div>';
		  $i++;
	  }
	  unset($block_tabs);
	  return '<div class="box"><div class="holder"><div class="frame"><div class="tabset-holder"><ul class="tabset">'. $out_t .'</ul></div><div class="tabcontent">'.$out_c.'</div></div></div></div>';
  }
}



function newspro_node_view($node, $teaser = FALSE, $page = FALSE, $links = TRUE) {
  $node = (object)$node;

  $node = node_build_content($node, $teaser, $page);

  if ($links) {
    $node->links = module_invoke_all('link', 'node', $node, $teaser);
    drupal_alter('link', $node->links, $node);
  }

  // Set the proper node part, then unset unused $node part so that a bad
  // theme can not open a security hole.
  $content = drupal_render($node->content);
  if ($teaser) {
    $node->teaser = $content;
    unset($node->body);
  }
  else {
    $node->body = $content;
    unset($node->teaser);
  }

  // Allow modules to modify the fully-built node.
  node_invoke_nodeapi($node, 'alter', $teaser, $page);

$out = '<li>';
if ($node->field_image[0]['filepath']) {$out .= '<div class="image-holder"><a href="'.url('node/'.$node->nid).'">'.theme('imagecache', 'teaser_related', $node->field_image[0]['filepath'], '', '').'</a></div>';}
$out .= '<div class="text-holder">';
$out .= '<h3 class="title"><a href="'.url('node/'.$node->nid).'">'.$node->title.'</a></h3>';
$out .= '<ul class="info-list">';
$out .= '<li>'.format_date($node->created).'</li>';
$out .= '<li><a href="'.url("node/$node->nid", array('fragment' => 'comments')).'">'.format_plural($node->comment_count, '1 Comment', '@count Comments').'</a></li>';
$out .= '</ul>';
$out .= '<p>'.$node->teaser.'</p>';
$out .= '</div>';
$out .= '</li>';
//$out .= '<pre>'. check_plain(print_r($node, 1)) .'</pre>';
  return $out;//theme('node', $node, $teaser, $page);
}


/* Top Menu */
function newspro_tree_top($menu_name = 'primary-links', $type = 'top-menu') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = newspro_tree_output_top($tree,$type);
  }
  return $menu_output[$menu_name];
}


function newspro_tree_output_top($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
	  //drupal_set_message('<pre>'. check_plain(print_r($data, 1)) .'</pre>');
	  //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'"><span>'.$data['link']['title'].'</span></a>'."</li>";
  }
  return $output ? '<ul class="'.$type.'">'. $output .'</ul>'.$s : '';
}

/* Top Categories */
function newspro_tree_cat($menu_name = 'menu-top-categories', $type = 'nav') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = newspro_tree_output_cat($tree,$type);
  }
  return $menu_output[$menu_name];
}


function newspro_tree_output_cat($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
	  if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
    if ($data['below']) {
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'"><span>'.$data['link']['title'].'</span></a>' . newspro_tree_output2_cat($data['below']) ."</li>";
    }
    else {
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'"><span>'.$data['link']['title'].'</span></a>'."</li>";
    }
  }
  return $output ? '<ul id="'.$type.'">'. $output .'</ul>'.$s : '';
}

function newspro_tree_output2_cat($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  foreach ($items as $i => $data) {
	  if ($data['link']['in_active_trail']) $a = ' class="current"'; else $a = '';
	if ($data['below']) {
		$output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'.newspro_tree_output2_cat($data['below'])."</li>";
	}
    else {
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
    }
  }
  return $output ? '<ul>'. $output .'</ul>' : '';
}


/* Bottom Menu */
/* -dkw 5nov2011 put our user menu in the footer area instead of theirs, 
   so we can  have login/out buttons that recognize if already logged in or not

function newspro_tree_bottom($menu_name = 'menu-footer-menu', $type = 'footer-menu') {
*/
function newspro_tree_bottom($menu_name = 'user-menu', $type = 'footer-menu') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = newspro_tree_output_bottom($tree,$type);
  }
  return $menu_output[$menu_name];
}


function newspro_tree_output_bottom($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = '';
  foreach ($items as $i => $data) {
	  //drupal_set_message('<pre>'. check_plain(print_r($data, 1)) .'</pre>');
	  //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) $a = ' class="active"'; else $a = '';
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
  }
  return $output ? '<ul class="'.$type.'">'. $output .'</ul>'.$s : '';
}




function newspro_menu_tree($tree) {
  return '<ul>'. $tree['tree'] .'</ul>';
}

/**
 * Generate the HTML output for a menu item and submenu.
 *
 * @ingroup themeable
 */
 
function newspro_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  return '<li>'. $link . $menu ."</li>\n";
}


/* Node */
function newspro_get_node($type = 'type') {
	static $node = false;
	if (!$node and arg(0) == 'node' and is_numeric(arg(1))){
		$node = db_fetch_array(db_query('SELECT * FROM {node} where nid = %d',arg(1)));
	}	
  return $node[$type];
}

function newspro_get_node_style() {
	static $node = false;
	if (!isset($node) and arg(0) == 'node' and is_numeric(arg(1)) and !arg(2)){
		$node = node_load(arg(1));
		return $node->field_style[0]['value'];
	} else {
		return 'n';
	} 
}

function newspro_get_tax_link($vid = 1) {
	$out = '';
	$result = db_query('SELECT * FROM {term_data} where vid = %d',$vid);
	while ($term = db_fetch_object($result)) {
		$out .= l($term->name, 'taxonomy/term/'.$term->tid).' ';
	}	
  return $out;
}

function newspro_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= ' ...';
  }

  return $string;
}