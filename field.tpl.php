<?php
// $Id$

/**
 * @file field.tpl.php
 * Default theme implementation to display the value of a field.
 *
 * Available variables:
 * - $node: The node object.
 * - $field: The field array.
 * - $items: An array of values for each item in the field array.
 * - $teaser: Whether this is displayed as a teaser.
 * - $page: Whether this is displayed as a page.
 * - $field_name: The field name.
 * - $field_type: The field type.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $label: The item label.
 * - $label_display: Position of label display, inline, above, or hidden.
 * - $field_empty: Whether the field has any valid value.
 *
 * Each $item in $items contains:
 * - 'view' - the themed view for that item
 *
 * @see template_preprocess_field()
 */
?>
<?php if (!$field_empty) : ?>
<div class="field field-type-<?php print $field_type_css ?> field-<?php print $field_name_css ?>">
  <?php if ($label_display == 'above') : ?>
    <div class="field-label"><?php print t($label) ?>:&nbsp;</div>
  <?php endif;?>
  <div class="field-items">
    <?php foreach ($items as $delta => $item) :
            if (!empty($item['view']) || $item['view'] === "0") : ?>
              <div class="field-item">
                <?php if ($label_display == 'inline') { ?>
                  <div class="field-label-inline<?php print($delta ? '' : '-first')?>">
                    <?php print t($label) ?>:&nbsp;</div>
                <?php } ?>
                <?php print $item['view'] ?>
              </div>
      <?php endif;
          endforeach;?>
  </div>
</div>
<?php endif; ?>