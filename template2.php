<?php
include("koneksi.php");
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

//require __DIR__ . '/../Header.php';

//$helper->log('Load from Xls template');
$reader = IOFactory::createReader('Xlsx');
//$spreadsheet = $reader->load(__DIR__ . '/template.xlsx');
//$spreadsheet = $reader->load(__DIR__ . '/30template.xls');
$spreadsheet = $reader->load(__DIR__ . '/ASSET HANDOVER FORM - ABCH.xlsx');

//$helper->log('Add new data to the template');
$data = [['title' => 'Excel for dummies',
    'price' => 17.99,
    'quantity' => 2,
],
    ['title' => 'PHP for dummies',
        'price' => 15.99,
        'quantity' => 1,
    ],
    ['title' => 'Inside OOP',
        'price' => 12.95,
        'quantity' => 1,
    ],
];

$q = mysqli_query($koneksi, "select * from tb_siswa");
$i = 1;
$no = 1;
$baseRow = 28;
while ($r = mysqli_fetch_array($q)) {
	$row = $baseRow + $i;
	$spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);
	
	$spreadsheet->getActiveSheet()->setCellValue('A' . $row, $no++)
        ->setCellValue('B' . $row, $r["nama"])
        ->setCellValue('C' . $row, $r["kelas"])
        ->setCellValue('D' . $row, $r["alamat"]);
        //->setCellValue('E' . $row, '=C' . $row . '*D' . $row);
	
	/*$sheet->setCellValue("A" . $i, $no++);
	$sheet->setCellValue("B" . $i, $r["nama"]);
	$sheet->setCellValue("C" . $i, $r["kelas"]);
	$sheet->setCellValue("D" . $i, $r["alamat"]);*/
	$i++;
}

/*$spreadsheet->getActiveSheet()->setCellValue('D1', Date::PHPToExcel(time()));

$baseRow = 5;
foreach ($data as $r => $dataRow) {
    $row = $baseRow + $r; echo $row;
    $spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);

    $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $r + 1)
        ->setCellValue('B' . $row, $dataRow['title'])
        ->setCellValue('C' . $row, $dataRow['price'])
        ->setCellValue('D' . $row, $dataRow['quantity'])
        ->setCellValue('E' . $row, '=C' . $row . '*D' . $row);
}*/
$spreadsheet->getActiveSheet()->removeRow($baseRow - 1, 1);

// Save
//$helper->write($spreadsheet, __FILE__);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('write.xlsx');
?>