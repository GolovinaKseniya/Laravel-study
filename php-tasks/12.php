<?php

$tags = ['p', 'x', 'y', 'z'];
$htmlTemplate = 'XML
<p>
	<x>
		<y>{{$title}}</y>
	</x>
	<z>
		<p>{{$content}}</p>
	</z>
</p>
XML';

//(parseXML($htmlTemplate));
parseXML($htmlTemplate);

function parseXML($htmlTemplate)
{
    $array = str_split($htmlTemplate);


    $tag = "p";

    var_dump(getTagContent($htmlTemplate, $tag));

    return $array;
}

function getTags($str, $tags) {
    $tags = ['p', 'x', 'y', 'z'];

    $array = str_split($str);

    $res = [];

    foreach($array as $key => $item) {
        if($item === "<" && in_array($item[$key + 1], $tags)) {
            $res[]
        }
    }

}

/**
 * @param array $array
 * @param string $tag
 * @return array
 */
function getTagContent(string $array, string $tag): array
{
//    $array = str_split($array);
//    $res = "";
//    $resArray = [];
//    $arrayTags = ['p', 'x', 'y', 'z'];
//
//
//    for ($i = 0; $i < count($array); $i++) {
//        if ($array[$i] === "<" && $array[$i + 1] === $tag) {
//            $resArray['tagName'] = $array[$i + 1];
//
//            $i += 3;
//
//            if($array[$i] === "<") {
//                echo 'test';
//                $resArray['children'] = getTagContent($array, $array[$i]);
////              echo getTagContent($array, $array[$i + 1]);
//            } else {
//                while($i < count($array) - 1) {
//                    $res .= $array[$i];
//                    if ($array[$i] === "/" && $array[$i + 1] === $tag && $array[$i + 2] === ">") {
//                        $res .= $array[$i + 1] . $array[$i + 2];
//                        break;
//                    }
//                    $i++;
//                }
//            }
//        }
//    }
//
//    var_dump($resArray);
//    return $resArray;
}

