$Id: README.txt,v 1.7 2010/06/09 19:44:17 johnbarclay Exp $

This is a helper module group to make creating accessible websites easier.

The module's functionality are divided up as such:

==============
accessible_api

General toolset including guidelines data, site accessibility preferences,
and functions other modules may build on.

- store any reusable data such as guidelines and mapping of guidelines
  to drupal authoring contexts.
- configuration interface and retrieval function for site accessibility guideline preferences
- configuration of accessibility conventions preferences where practices are not yet clear.
  e.g. should content be positioned off screen left, top, or right.
- adds !important to element-invisible rule in css


==============
accessible_fix

Accomodate and fix accessiblilty deficiencies
in core and contributed module.  Works on a case by case basis with hooks like
hook_form_alter to modify other modules forms and markup.  As a rule, these
are either stop gap measures until real fixes are made in modules or when
accessibility implementation is unclear or preference based.


- examples include google_cse and search module in drupal 6 needing labels.
- allows for offscreen heading configuration in blocks and nodes
- allows for aria roles to be applied to nodes and blocks.  need to look into if this is better done in rdf modules.

===============
accessible_help

Adds contextual accessibility help for content authors.

- provides contextual help through hook_help.

===============

examples folder

Much of accessiblity is on the theming layer, so example .tpl and template.php overrides
are included in the examples directory of this module.  These may be installed with the CVS patches such
as examples/garland/garland.patch or by copying the changed files such as examples/garland/block.tpl.php
to the theming directory you are working with.


===============================
Install and Configure
===============================

Enable the module(s) you want to use.  All require accessible_api. (admin/modules)
Give site admins permissions to "administer accessible module" (admin/user/permissions)
Configure the modules (admin/config/regional/access/accessible_api and admin/config/regional/access/accessible_fix)

Change theming layer as needed for accessible_fix functions:

- Tweak block.tpl.php to use the $block->offscreen variable as you desire for block headings
  An example in in examples/garland/block.tpl.php


