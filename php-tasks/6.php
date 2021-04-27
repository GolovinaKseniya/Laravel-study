<?php
/*
 * Напишите функцию аналог printf, которая сможет собирать шаблон:
$htmlTemplate = <<<HTML
<html>
	<head>
		<title>{{$title}}</title>
	<head/>
	<body>
		<p>{{$content}}</p>
	</body>
</html>
HTML;
$context = ['title' => 'test', 'content' => 'content'];
$html = my_stingf($htmlTemplate, context);
 */

$htmlTemplate = '
<html>
	<head>
		<title>{{$title}}</title>
	<head/>
	<body>
		<p>{{$content}}</p>
	</body>
</html>
';

$context = ['title' => 'test', 'content' => 'contentik'];

function my_stingf($html, array $context)
{
    $keys = [];
    $values = [];

    foreach ($context as $key => $item) {
        $values [] = $item;
        $keys [] = '/{{\$' . $key . '}}/';
    }

    return preg_replace($keys, $values, $html);
}

echo my_stingf($htmlTemplate, $context);
