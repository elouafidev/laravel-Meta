<?php
namespace Eusonlito\LaravelMeta\Tags;

class DCtag extends TagAbstract
{
    protected static $available = [
        'title', /*'type',*/ 'canonical', /*'url',*/ 'keywords', 'description', 'locale','source'
    ];

    public static function tagDefault($key, $value)
    {
        if (in_array($key, self::$available, true)) {
            return '<meta property="'.self::propertyTag($key).'" content="'.$value.'" />';
        }
    }
    public static function propertyTag($key)
    {
        $tag = 'DC.';

        switch ($key) {
            case 'locale':
                $tag .= 'Language';
                break;
            case 'canonical':
                $tag .= 'Relation';
                break;
            case 'keywords':
                $tag .= 'Subject';
                break;
            default: $tag .= ucfirst($key);
        }

        return $tag;
    }
}
