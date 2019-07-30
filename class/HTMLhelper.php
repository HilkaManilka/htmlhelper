<?

class HtmlHelper
{
    public function __construct() {}

    public $default = array();

    /**
     * @param $src
     * @param array $attrs
     */
    public function img( $src, $attrs = array() )
    {
        $attr = $this->parseAttrs( $attrs );

        $img = '<img '. $src .'  '. $attr .' />';

        echo $img;
    }

    /**
     * @param $src
     * @param string $attr
     * return script
     */
    public function loadScript( $src, $attr = 'defer' )
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
    public function loadStyle( $src, $type = 'text/css', $rel = 'stylesheet' )
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
    public function input( $name = '', $attrs = array() )
    {

        $attr = $this->parseAttrs( $attrs );

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
    public function textarea( $name = '', $type = 'text', $attrs = array(), $value = '' )
    {

        $attr = $this->parseAttrs( $attrs );

        if ( !empty($name) ) {
            $name = 'name="'. $name .'"';
        }

        $textarea = '<textarea ' . $name . ' ' . $type . ' '. $attr .' >'. $value .'</textarea>';

        echo $textarea;

    }

    /**
     * @param $url
     * @param $method
     * @param $attrs
     */
    public function formStart( $url, $method, $attrs = array() )
    {
        if ( !empty($url) && !empty($method) ) {
            $attr = $this->parseAttrs( $attrs );

            echo '<form action="' . $url . '"  method="'. $method .'"  '. $attr .'>';
        }
    }

    /**
     * Return end form tag
     */
    public function formEnd()
    {
        echo '</form>';
    }

    public function a( $link, $value, $target = '_self', $attrs = array() )
    {
        if ( !empty($link) && !empty($value) ) {
            $attr = $this->parseAttrs( $attrs );

            echo '<a href="'. $link .'" target="' . $target . '" '. $attr .' >'. $value .'</a>';
        }
    }

    /**
     * This function parse your attrs.
     * She checked your enter data.
     * She'll parse only if $args not empty && his type = array / object
     * @param $attrs
     * @return string
     */
    public function parseAttrs( $attrs )
    {
        $result = '';

        if ( !empty($attrs) && (gettype($attrs) === 'object' || gettype($attrs) === 'array') ) {

            foreach ($attrs as $attr => $value) {
                $result .= $attr . '="' . $value . '"';
            }

            return $result;
        }
    }

    /**
     * @param $var
     * return $debug info
     */
    public function debug( $var )
    {
        var_dump( $var );
    }

}