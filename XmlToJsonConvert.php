<?php
	class XmlToJsonConvert{
	private $book = array();
    private $tmppath = 'https://helion.pl/plugins/new/xml/lista.cgi';
	private $col;
	
    
		public function Convert($path){
		  
		  if (file_exists($path)) {
			$col = simplexml_load_file($path) or die("File not found.");
		  }else {
			$path = "https://helion.pl/plugins/new/xml/lista.cgi"; 
			$col = simplexml_load_file($path) or die("Page not found.");
		  }			  
foreach ($col->item as $column) {
 


 
	$book[] = array(
	"ident" => (string) $column->attributes()->ident,
	"tytul" => (string) $column->attributes()->tytul,
	"autor" => (string) $column->attributes()->autor,
	"cena" => (string) $column->attributes()->cena,
	"typ" => (string) $column->attributes()->typ,
	"status" => (string) $column->attributes()->status,
	);
	
	
	
	}
	$bk = array('ksiazki' => $book);
	return $js = json_encode($bk);
	
	}
	}
	
	$test = new XmlToJsonConvert();
	echo $test->convert('lista.xml');
	?>