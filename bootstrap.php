<?php 

/**
* @package   arcadia\bilibili-embed
* @copyright Copyright (c) 2016 arcadia
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace arcadia\Flarum\MediaEmbed;

use Flarum\Event\ConfigureFormatter;
use Illuminate\Events\Dispatcher;

function subscribe(Dispatcher $events)
{
	$events->listen(
		ConfigureFormatter::class,
		function (ConfigureFormatter $event)
		{
			$event->configurator->MediaEmbed->add(
'bilibili',
[
    'host'    => 'www.bilibili.com',
    'extract' => "!www.bilibili.com/video/av(?'id'[0-9]+)/!",
    'flash'  => [
        'width'  => 640,
        'height' => 400,
        'src'    => 'https://static-s.bilibili.com/miniloader.swf?aid={@id}'
    ]
]
);

		}
	);
};

return __NAMESPACE__ . '\\subscribe';
