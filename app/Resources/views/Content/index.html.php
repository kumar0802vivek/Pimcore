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
        
            if ($this->assets instanceof Pimcore\Model\DataObject):
                /** @var Pimcore\Model\Asset\Image $asset */
                ?>
                <div class="gallery-row">
                    <?= $this->assets->getProductName(); ?>
                </div>
                <?php
            endif;
       ?>
    </div>
<?php endif; ?>