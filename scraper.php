<?

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
		$link		=	'http://www.indianyellowpages.com/search.php?term=pvt&pageno=0';
		$page		=	file_get_html($link);
		$totalrec	=	$page->find("//*[@id='breadcrumb']/li[3]",0)->plaintext;
		$text = str_replace(' Result(s) Found', '', $totalrec);
		$records = str_replace('- ', '', $text);
		$paginations = $records  / 50;
		$pages =  (int)$paginations;
		
	
for($page = 0;$page <= 0; $page++)
	{
		$link	=	'http://www.indianyellowpages.com/search.php?term=pvt&pageno='.$page;
		$html	=	file_get_html($link);
		if($html)
		{
			foreach($html->find("/html/body/div/div/div[@itemtype='http://schema.org/Organization']") as $element)
			{
				$nameofcompany	=	$element->find("a[@class='xxlarge']",0)->href;
				
				echo $nameofcompany'<br>';
				scraperwiki::save_sqlite(array('link'), array('link' => $nameofcompany));
			}
		}
	
	}
?>
