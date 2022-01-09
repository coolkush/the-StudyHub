<?php


function extractor($link)
{
$link = substr($link,32);
return 'https://www.youtube.com/embed/'.$link;
}

?>