<?php
//http://www.whitepages.com/


$html = file_get_contents('http://www.whitepages.com/phone/1-323-426-2149');

//parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);

//grab all the links on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("//p");

for ($i = 0; $i < $hrefs->length; $i++) {
    $href = $hrefs->item($i);
    $url = $href->getAttribute('href');
    echo "<br />Link: $url";

}


?>


