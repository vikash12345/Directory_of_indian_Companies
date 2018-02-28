<?

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
		$link		=	'http://www.indianyellowpages.com/search.php?term=ltd&pageno=0';
		$page		=	file_get_html($link);
		$totalrec	=	$page->find("//*[@id='breadcrumb']/li[3]",0)->plaintext;
		$text = str_replace(' Result(s) Found', '', $totalrec);
		$records = str_replace('- ', '', $text);
		$paginations = $records  / 50;
		$pages =  (int)$paginations;
		
	
for($page = 0;$page <= 0; $page++)
	{
		$link	=	'http://www.indianyellowpages.com/search.php?term=ltd&pageno='.$page;
		$html	=	file_get_html($link);
		$link	=	$html->find("a[@class='xxlarge']",0)->href;
		if($html)
		{
			sleep(5);
			foreach($html->find("/html/body/div/div/div[@itemtype='http://schema.org/Organization']") as $element)
			{
				$nameofcompany	=	$element->find("a[@class='xxlarge']",0)->plaintext;
				$des		=	$element->find("div[@itemprop='description']",0)->plaintext;
				$phone		=	$element->find("b[@itemprop='telephone']",0)->plaintext;
				$fulladdress	=	$element->find("li[@itemprop='streetAddress']",0)->plaintext;
				$businesstype	=	$element->find("li[@class='ofh']",0)->plaintext; 
				$link		=	$element->find("a[@class='blue']",0)->plaintext;
				
				$record = array( 'nameofcompany' =>$nameofcompany,
						'phone' =>$phone,
						'fulladdress' =>$fulladdress,
						'businesstype' =>$businesstype,
						'des' =>$des,
					       'link' =>$link);
				
				scraperwiki::save(array('nameofcompany','phone','fulladdress','businesstype','des','link'), $record);
			}
		}
	
	}
?>
