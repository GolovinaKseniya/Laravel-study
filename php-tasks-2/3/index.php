<?php
include_once "FileDBDriver.php";

$exampleArray = [
    ['id' => 'test', 'title' => '1234', 'name' => 12344],
    ['id' => 'ffff', 'title' => 'ggg', 'name' => 5888, 'age' => '22', 'city' => 'London']
];

$config = [
    'extension' => '.txt',
    'path' => 'storage'
];

$fd = new FileDBDriver($config);
//$queryBuilder = new FileDBBuilder($fd);
//$queryBuilder->get();


//$queryBuilder->get(); //[['id' => 1, 'name' => 'test'], ....]
//$queryBuilder->where(1, '=', 1)->get(); //[['id' => 1, 'name' => 'test'], ....]
//$queryBuilder->insert(['id' => 5, 'name' => 'test']); // true
//$queryBuilder->select(['id'])->where('id', '=', 1)->orWhere('id', '=', 5)->get() ;//[['id' => 1], ['id' => 5]]
//$queryBuilder->where('name', '=', 'test')->update(['name' => 'new_test']); // 2 (updated rows count)
//$queryBuilder->where('name', '=', 'new_test')->delete(); // 2 (updated rows count)


//$db->file('users')
//    ->find([['name', '=', 'test']])
//    ->update(['name' => 'new_test'])

$fd->file('test')
    ->find(
        [['name', '=', 'rrrrr']], [['id', '=', 4], ['id', '=', 5]]
    )
    ->update(['name' => 'test123'])
//    ->read(['id', 'name'])
;
//    ->update(['name' => 'TTTTTT']);


//$fd->file('test')
//    ->find([['id', '=',  1], ['id', '=', 3]]);
//    ->read(['id', 'name']);

//echo ((1 && 1 && 1) || 0 || 0) ? 'true' : 'false';

