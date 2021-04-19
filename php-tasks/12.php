<?php

$tags = ['p', 'x', 'y', 'z'];
$htmlTemplate = 'XML
<p>
	<x>
		<y>{{$title}}</y>
	<x/>
	<z>
		<p>{{$content}}</p>
	</z>
</p>
XML';

var_dump(parseXML($htmlTemplate));

function parseXML ($htmlTemplate) {

    $res = preg_match_all("/<([^>\/]+)>/i", $htmlTemplate, $matches, PREG_PATTERN_ORDER);
    return $matches[1];
}