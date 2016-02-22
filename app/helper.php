<?php

function markdown($text)
{
    return sharp_markdown($text);
}

function premier_paragraphe($source)
{
    $paragraphes = paragraphes($source);

    if(! sizeof($paragraphes)) {
        return "";
    }

    return strip_tags($paragraphes[0], "<em><strong><i><b>");
}

function paragraphes($source)
{
    $source = str_replace('</p>', '', trim($source));

    $tab = explode('<p>', $source);

    array_shift($tab);

    return $tab;
}

function is_bandeau_photos($text)
{
    if(starts_with($text, "//")) {
        return trim(substr($text, 2));
    }

    return false;
}