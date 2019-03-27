<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
?>

<?php if ($this->assets): ?>

    <div class="my-gallery">
        <?php
       
           // if ($this->assets instanceof Pimcore\Model\DataObject):
		print_r($this->assets); exit;
                /** @var Pimcore\Model\Asset\Image $asset */
                ?>
                <div class="gallery-row">
                    <?= $asset->getProductName(); ?>
                </div>
                <?php
            //endif;
         ?>
    </div>
<?php endif; ?>