
<?php

require_once ("lib.php");

// Cara I fokus ke xpath
// $result = scrapExplorer(
// 	// link yang mau discrapp
// 	'http://infoharga.bappebti.go.id/harga_komoditi_petani', 

// 	// filter tag html menggunakan preg_match
// 	array(
// 		'#<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"*>(.*?)</div>#is', // scrap tingkat 1
// 		//'#<tbody>*>(.*?)</tbody>#is', // mensecrap tingkat 2, mengolah hasil dari scrap tingkat 1
// 		//'#<tr>*>(.*?)</tr>#is' // menscrap tingkat 3 agar lebih detail
// 	),

// 	// filter hasil dengan menggunakan xpath
// 	"//table/tbody/tr/td" 
// );

// Cara II fokus ke preg_match
// $result = scrapExplorer(
// 	// link yang mau discrapp
// 	'http://infoharga.bappebti.go.id/harga_komoditi_petani', 

// 	// filter tag html menggunakan preg_match
// 	array(
// 		'#<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"*>(.*?)</div>#is', // scrap tingkat 1
// 		'#<tbody>*>(.*?)</tbody>#is', // mensecrap tingkat 2, mengolah hasil dari scrap tingkat 1
// 		'#<tr>*>(.*?)</tr>#is' // menscrap tingkat 3 agar lebih detail
// 	),

// 	// filter hasil dengan menggunakan xpath
// 	"//td" 
// );


// Cara I fokus ke xpath
$result = scrapExplorer(
	// link yang mau discrapp
	'http://infopangan.jakarta.go.id/publik/dashboard/7', 

	// filter tag html menggunakan preg_match
	array(
		'#<div class="price-info cchange"*>(.*?)</div>#is', // scrap tingkat 1
		//'#<tbody>*>(.*?)</tbody>#is', // mensecrap tingkat 2, mengolah hasil dari scrap tingkat 1
		//'#<tr>*>(.*?)</tr>#is' // menscrap tingkat 3 agar lebih detail
	),

	// filter hasil dengan menggunakan xpath
	"//div/div/div" 
);


echo "<pre>";
echo print_r($result);
echo "</pre>";