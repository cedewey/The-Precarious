Extend the image module.

Extended functionalities

  - Adds checkboxes for the fields of image editing forms by content type.
    - Alt field required
    - Title field required
  - Sets the Alt field maxlength value to 128 for editing forms of nodes.

EIM was written by Siegfried Neumann aka Quiptime.

Dependencies
------------

The image (core) module.

Install
-------

1) Copy the EIM folder to the modules folder in your installation. Usually
   this is sites/all/modules.
   Or use the UI and install it via admin/modules/install.

2) In your Drupal site, enable the module under Administration -> Modules
   (/admin/modules).

3) Add or configure a image field under Administration -> Structure ->
   Content types -> [type]
   (admin/structure/types/manage/[type]/fields).

   Add the additonal checkboxes

     Check 'Enable Alt field' to see the checkbox 'Alt field required'.
     Check 'Enable Title field' to see the checkbox 'Title field required'.

   Alt field maxlength

     The use of the maxlength value is not configurable. This value is used 
     for all alt fields of image fields - when enabled the EIM module.
