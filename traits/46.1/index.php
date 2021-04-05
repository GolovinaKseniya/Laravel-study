<?php

include_once 'Country.php';

$country = new Country('Ukraine', 29, '46mln');

echo $country->getName();
echo $country->getAge();
