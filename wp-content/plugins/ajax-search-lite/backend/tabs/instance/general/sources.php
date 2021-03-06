<?php
$themes = array(
    array('option'=>'Simple Red', 'value'=>'simple-red'),
    array('option'=>'Simple Blue', 'value'=>'simple-blue'),
    array('option'=>'Simple Grey', 'value'=>'simple-grey'),
    array('option'=>'Classic Blue', 'value'=>'classic-blue'),
    array('option'=>'Curvy Black', 'value'=>'curvy-black'),
    array('option'=>'Curvy Red', 'value'=>'curvy-red'),
    array('option'=>'Curvy Blue', 'value'=>'curvy-blue'),
    array('option'=>'Underline White', 'value'=>'underline')
);
?>
<div class="item">
    <?php
    $o = new wpdreamsCustomSelect("theme", __("Theme", "ajax-search-lite"), array(
        'selects'=>$themes,
        'value'=>$sd['theme']
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("override_search_form", __("Try to replace the theme search with Ajax Search Lite form?", "ajax-search-lite"),
        $sd["override_search_form"]);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg"><?php echo __("Works with most themes, which use the searchform.php theme file to display their search forms.", "ajax-search-lite"); ?></p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinposts", __("Search in posts?", "ajax-search-lite"),
        $sd["searchinposts"]);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinpages", __("Search in pages?", "ajax-search-lite"),
        $sd['searchinpages']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomPostTypes("customtypes", __("Search in custom post types", "ajax-search-lite"),
        $sd['customtypes']);
    $params[$o->getName()] = $o->getData();
    $params['selected-'.$o->getName()] = $o->getSelected();
    ?></div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchintitle", __("Search in title?", "ajax-search-lite"),
        $sd['searchintitle']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchincontent", __("Search in content?", "ajax-search-lite"),
        $sd['searchincontent']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinexcerpt", __("Search in post excerpts?", "ajax-search-lite"),
        $sd['searchinexcerpt']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("search_all_cf", __("Search all custom fields?", "ajax-search-lite"),
        $sd['search_all_cf']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsCustomFields("customfields", __("..or search in selected custom fields?", "ajax-search-lite"),
        $sd['customfields']);
    $params[$o->getName()] = $o->getData();
    $params['selected-'.$o->getName()] = $o->getSelected();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("exactonly", __("Show exact matches only?", "ajax-search-lite"),
        $sd['exactonly']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("searchinterms", __("Search in terms? (categories, tags)", "ajax-search-lite"),
        $sd['searchinterms']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>