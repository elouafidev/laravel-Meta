<?php
namespace Eusonlito\LaravelMeta\Tags;

class DCtag extends TagAbstract
{
    protected static $available = [
        'title', 'canonical', 'keywords', 'description', 'locale', 'source'
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
                return $tag.'Language';

            case 'canonical':
                return $tag.'Relation';

            case 'keywords':
                return $tag.'Subject';

            default:
                return $tag.ucfirst($key);
        }
    }
}
