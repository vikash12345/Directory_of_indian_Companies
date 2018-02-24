<?

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$link		=	'http://www.indianyellowpages.com/search.php?term=pvt&pageno=0';
		$page		=	file_get_html($link);
		$totalrec	=	$page->find("//*[@id='breadcrumb']/li[3]",0)->plaintect;
		$text = str_replace(' Result(s) Found', '', $totalrec);
		$records = str_replace('- ', '', $text);
		$paginations = $records  / 50 + 1;
		$pages =  (int)$paginations;
		echo $paginations;
?>
