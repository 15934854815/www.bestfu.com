<?php
return [
    '__pattern__' => [
        'name' => '\w+',
        'id' =>	'\d+'
    ],
    
	'about$'	=> 'About/index',
    'index$'	=> 'Index/index',
    'service$'	=> 'Service/index',
    'contact$'	=> 'Contact/index',
    'news-<id>$' => 'News/show',
    'news$'	=> 'News/index',
    'jobs$'	=> 'Jobs/index',
    'legal$'	=> 'Legal/index'
];