<?php

/**
 * @desc Console Product Import
 * 
 */

namespace TradeProductBundle\Command;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class TSProductImportCommand extends ContainerAwareCommand {

    protected function configure() {
	$this
	    ->setName('ts:product-import')
	    ->setDescription('To import the products into Pimcore')
	    ->addArgument('file', InputArgument::REQUIRED, 'Please provice the excel file.')
	;
    }

    /**
     * @desc Entry point for importing products from console
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output) {

	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$file = $input->getArgument('file');
	if (!file_exists(PIMCORE_PRODUCT_DIRECTORY . $file)) {
	    $output->write("File not found. Please keep a copy of product sheet in products Directory \n");
	}

    }

    public function importProducts($params) {
	if($params['filePath']){
	    if (!file_exists($params['filePath'])) {
		return;
	    }
	    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	    $spreadsheet = $reader->load($params['filePath']);
	    $worksheet = $spreadsheet->getActiveSheet();
	    foreach ($worksheet->getRowIterator() AS $row) {
		$cells = $row->getCellIterator();
		$cells->setIterateOnlyExistingCells(TRUE); // iterates through all cells, including empty ones
		$cellData = []; //
		foreach ($cells as $key => $cell) {
		    $cellData[] = $cell->getValue();
		}
	    }
	}
	
    }

}
