<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
?>
<section id="renderlet-gallery">
    <?= $this->renderlet("myGallery", [
        "controller" => "content",
        "action" => "index",
        "title" => "Drag an asset folder here to get a gallery",
        "height" => 400
    ]); ?>
</section>
