

Accessible Fix readme for developers.

I.  ARCHITECTURE RATIONALE

The module is designed for short term, small fixes so code is in many small, modular files
to allow for simple patching.  Its also designed for code execution and admin options to be limited to only enabled modules.

I.  OVERVIEW

A. Accessible Fix leverages the preferences provided by Accessible API when possible.
B. It is meant as a stop gap measure until issues are resolved in core and contrib modules.
C. It generally intevenes in other modules through the theming layer or hooks such as hook_form_alter.
D. Code in it should be designed to fail gracefully when the module it is accomodating is repaired or changes.

II.  HOW MODULE FIXES WORK and HOW YOU MIGHT WRITE ONE

All individual module fixes are stored in the directory module_fixes directory and have a set of files such as MODULE.inc, MODULE.admin.inc, etc.

- MODULE.inc.  Required. This file is loaded if a module with the same name is enabled...it should have as little code as possible in it.  The MODULE.inc file is the only file that should have hooks in it.

- MODULE.admin.inc should have any administrative interfaces in it.  In particular, the functions accessible_fix_admin_module_fixes_MODULE and accessible_fix_admin_module_fixes_MODULE_submit are called to gather form elements for the configuration form.
