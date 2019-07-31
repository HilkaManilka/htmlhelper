<?

class HtmlHelper
{

    public $default = array();

    public static $tagsArray = array(
        'p',
        'div',
        'img',
        'a',
        'strong',
        'em'
    );

    /**
     * @param $tag
     * @param $text
     * @param array $attrs
     * return $tag
     */
    public static function tag( $tag, $text, $attrs = array() ) {
        if ( !empty($tag) ) {

            foreach ( static::$tagsArray as $tagArray) {

                if ( $tagArray === (string) $tag ) {

                    $attr = static::parseAttrs( $attrs );

                    $tag = '<' . $tag . ' ' . $attr . '>' . $text . '</' . $tag . '>';

                    echo $tag;
                }
            }

        }
    }

    /**
     * @param $src
     * @param array $attrs
     */
    public static function img( $src, $attrs = array() )
    {
        $attr = static::parseAttrs( $attrs );

        $img = '<img '. $src .'  '. $attr .' />';

        echo $img;
    }

    /**
     * @param $src
     * @param string $attr
     * return script
     */
    public static function loadScript( $src, $attr = 'defer' )
    {
        if ( !empty($src) ) {
            echo '<script src="'. $src .'" '. $attr .'></script>';
        }
    }

    /**
     * @param $src
     * @param string $type
     * @param string $rel
     */
    public static function loadStyle( $src, $type = 'text/css', $rel = 'stylesheet' )
    {
        if ( !empty($src) ) {
            echo '<link type="'. $type .'" rel="'. $rel .'" href="'. $src .'" />';
        }
    }

    /**
     * @param string $name
     * @param array $attrs
     * @return string input
     */
    public static function input( $name = '', $attrs = array() )
    {

        $attr = static::parseAttrs( $attrs );

        if ( !empty($name) ) {
            $name = 'name="'. $name .'"';
        }

        $input = '<input '. $name .' '. $attr .' />';

        echo $input;

    }

    /**
     * @param string $name
     * @param string $type
     * @param array $attrs
     * @param string $value
     * @return string textarea
     */
    public static function textarea( $name = '', $type = 'text', $attrs = array(), $value = '' )
    {

        $attr = static::parseAttrs( $attrs );

        if ( !empty($name) ) {
            $name = 'name="'. $name .'"';
        }

        $textarea = '<textarea ' . $name . ' ' . $type . ' '. $attr .' >'. $value .'</textarea>';

        echo $textarea;

    }

    /**
     * @param array $items
     * @param string $name
     * @param array $attrs
     * @param array $selected
     * return $select
     */
    public static function select( $items = array(), $name = '', $attrs = array(), $selected = array() )
    {
        if ( !empty($items) ) {
            $attr   = static::parseAttrs( $attrs );
            $items  = static::parseItems( $items, $selected );

            $select = '<select '. $name .' '. $attr .'>' . $items . '</select>';

            echo $select;
        }
    }

    /**
     * @param $url
     * @param $method
     * @param $attrs
     */
    public static function formStart( $url, $method, $attrs = array() )
    {
        if ( !empty($url) && !empty($method) ) {
            $attr = static::parseAttrs( $attrs );

            echo '<form action="' . $url . '"  method="'. $method .'"  '. $attr .'>';
        }
    }

    /**
     * Return end form tag
     */
    public static function formEnd()
    {
        echo '</form>';
    }

    /**
     * @param $link
     * @param $value
     * @param string $target
     * @param array $attrs
     */
    public static function a( $link, $value, $attrs = array(), $target = '_self' )
    {
        if ( !empty($link) && !empty($value) ) {
            $attr = static::parseAttrs( $attrs );

            echo '<a href="'. $link .'" target="' . $target . '" '. $attr .' >'. $value .'</a>';
        }
    }

    /**
     * @param $link
     * @param $value
     * @param array $attrs
     * @param string $target
     */
    public static function mailto( $link, $value, $attrs = array(), $target = '_self' )
    {
        if ( !empty($link) && !empty($value) ) {
            $attr = static::parseAttrs( $attrs );

            echo '<a href="mailto:'. $link .'" target="' . $target . '" '. $attr .' >'. $value .'</a>';
        }
    }

    /**
     * @param $link
     * @param $value
     * @param array $attrs
     * @param string $target
     */
    public static function tel( $link, $value, $attrs = array(), $target = '_self' )
    {
        if ( !empty($link) && !empty($value) ) {
            $attr = static::parseAttrs( $attrs );

            echo '<a href="tel:'. $link .'" target="' . $target . '" '. $attr .' >'. $value .'</a>';
        }
    }

    /**
     * This function parse your attrs.
     * She checked your enter data.
     * She'll parse only if $args not empty && his type = array / object
     * @param $attrs
     * @return string
     */
    public static function parseAttrs( $attrs )
    {
        $result = '';

        if ( !empty($attrs) && (gettype($attrs) === 'object' || gettype($attrs) === 'array') ) {

            foreach ($attrs as $attr => $value) {
                $result .= $attr . '="' . $value . '" ';
            }

            return $result;
        }
    }

    /**
     * This function parse item's from item's list
     * Don't use $items as string / var. Only array or object
     * @param $items - array ( key => value )
     * @param string $selected - selected item ( If has )
     * @return string
     */
    public static function parseItems( $items, $selected = '' )
    {
        $result = '';

        if ( !empty($items) && (gettype($items) === 'object' || gettype($items) === 'array') ) {

            if ( !empty($selected) ) {
                $result .= '<option selected>'. $selected .'</option>';
            }

            foreach ($items as $key => $value) {
                $result .= '<option value="'. $key .'">'. $value .'</option>';
            }

            return $result;
        }
    }

    /**
     * @param $var
     * return $debug info
     */
    public static function debug( $var )
    {
        var_dump( $var );
    }

}
