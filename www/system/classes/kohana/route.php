<?php defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');
/**
 * Routes are used to determine the controller and action for a requested URI.
 * Every route generates a regular expression which is used to match a URI
 * and a route. Routes may also contain keys which can be used to set the
 * controller, action, and parameters.
 *
 * Each <key> will be translated to a regular expression using a default
 * regular expression pattern. You can override the default pattern by providing
 * a pattern for the key:
 *
 *     // This route will only match when <id> is a digit
 *     Route::set('user', 'user/<action>/<id>', array('id' => '\d+'));
 *
 *     // This route will match when <path> is anything
 *     Route::set('file', '<path>', array('path' => '.*'));
 *
 * It is also possible to create optional segments by using parentheses in
 * the URI definition:
 *
 *     // This is the standard default route, and no keys are required
 *     Route::set('default', '(<controller>(/<action>(/<id>)))');
 *
 *     // This route only requires the <file> key
 *     Route::set('file', '(<path>/)<file>(.<format>)', array('path' => '.*', 'format' => '\w+'));
 *
 * Routes also provide a way to generate URIs (called "reverse routing"), which
 * makes them an extremely powerful and flexible way to generate internal links.
 *
 * @package    Kohana
 * @category   Base
 * @author     Kohana Team
 * @copyright  (c) 2008-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Route {

	// Defines the pattern of a <segment>
	const REGEX_KEY     = '<([a-zA-Z0-9_]++)>';

	// What can be part of a <segment> value
	const REGEX_SEGMENT = '[^/.,;?\n]++';

	// What must be escaped in the route regex
	const REGEX_ESCAPE  = '[.\\+*?[^\\]${}=!|]';

	/**
	 * @var  string  default protocol for all routes
	 *
	 * @example  'http://'
	 */
	public static $default_protocol = 'http://';

	/**
	 * @var  array   list of valid localhost entries
	 */
	public static $localhosts = array(FALSE, '', 'local', 'localhost');

	/**
	 * @var  string  default action for all routes
	 */
	public static $default_action = 'index';

	/**
	 * @var  bool Indicates whether routes are cached
	 */
	public static $cache = FALSE;

	/**
	 * @var  array 
	 */
	protected static $_routes = array();

	/**
	 * Stores a named route and returns it. The "action" will always be set to
	 * "index" if it is not defined.
	 *
	 *     Route::set('default', '(<controller>(/<action>(/<id>)))')
	 *         ->defaults(array(
	 *             'controller' => 'welcome',
	 *         ));
	 *
	 * @param   string   route name
	 * @param   string   URI pattern
	 * @param   array    regex patterns for route keys
	 * @return  Route
	 */
	public static function set($name, $uri_callback = NULL, $regex = NULL)
	{
		return Route::$_routes[$name] = new Route($uri_callback, $regex);
	}

	/**
	 * Retrieves a named route.
	 *
	 *     $route = Route::get('default');
	 *
	 * @param   string  route name
	 * @return  Route
	 * @throws  Kohana_Exception
	 */
	public static function get($name)
	{
		if ( ! isset(Route::$_routes[$name]))
		{
			throw new Kohana_Exception('The requested route does not exist: :route',
				array(':route' => $name));
		}

		return Route::$_routes[$name];
	}

	/**
	 * Retrieves all named routes.
	 *
	 *     $routes = Route::all();
	 *
	 * @return  array  routes by name
	 */
	public static function all()
	{
		return Route::$_routes;
	}

	/**
	 * Get the name of a route.
	 *
	 *     $name = Route::name($route)
	 *
	 * @param   object  Route instance
	 * @return  string
	 */
	public static function name(Route $route)
	{
		return array_search($route, Route::$_routes);
	}

	/**
	 * Saves or loads the route cache. If your routes will remain the same for
	 * a long period of time, use this to reload the routes from the cache
	 * rather than redefining them on every page load.
	 *
	 *     if ( ! Route::cache())
	 *     {
	 *         // Set routes here
	 *         Route::cache(TRUE);
	 *     }
	 *
	 * @param   boolean   cache the current routes
	 * @return  void      when saving routes
	 * @return  boolean   when loading routes
	 * @uses    Kohana::cache
	 */
	public static function cache($save = FALSE)
	{
		if ($save === TRUE)
		{
			// Cache all defined routes
			Kohana::cache('Route::cache()', Route::$_routes);
		}
		else
		{
			if ($routes = Kohana::cache('Route::cache()'))
			{
				Route::$_routes = $routes;

				// Routes were cached
				return Route::$cache = TRUE;
			}
			else
			{
				// Routes were not cached
				return Route::$cache = FALSE;
			}
		}
	}

	/**
	 * Create a URL from a route name. This is a shortcut for:
	 *
	 *     echo URL::site(Route::get($name)->uri($params), $protocol);
	 *
	 * @param   string   route name
	 * @param   array    URI parameters
	 * @param   mixed   protocol string or boolean, adds protocol and domain
	 * @return  string
	 * @since   3.0.7
	 * @uses    URL::site
	 */
	public static function url($name, array $params = NULL, $protocol = NULL)
	{
		$route = Route::get($name);

		// Create a URI with the route and convert it to a URL
		if ($route->is_external())
			return Route::get($name)->uri($params);
		else
			return URL::site(Route::get($name)->uri($params), $protocol);
	}

	/**
	 * Returns the compiled regular expression for the route. This translates
	 * keys and optional groups to a proper PCRE regular expression.
	 *
	 *     $compiled = Route::compile(
	 *        '<controller>(/<action>(/<id>))',
	 *         array(
	 *           'controller' => '[a-z]+',
	 *           'id' => '\d+',
	 *         )
	 *     );
	 *
	 * @return  string
	 * @uses    Route::REGEX_ESCAPE
	 * @uses    Route::REGEX_SEGMENT
	 */
	public static function compile($uri, array $regex = NULL)
	{
		if ( ! is_string($uri))
			return;

		// The URI should be considered literal except for keys and optional parts
		// Escape everything preg_quote would escape except for : ( ) < >
		$expression = preg_replace('#'.Route::REGEX_ESCAPE.'#', '\\\\$0', $uri);

		if (strpos($expression, '(') !== FALSE)
		{
			// Make optional parts of the URI non-capturing and optional
			$expression = str_replace(array('(', ')'), array('(?:', ')?'), $expression);
		}

		// Insert default regex for keys
		$expression = str_replace(array('<', '>'), array('(?P<', '>'.Route::REGEX_SEGMENT.')'), $expression);

		if ($regex)
		{
			$search = $replace = array();
			foreach ($regex as $key => $value)
			{
				$search[]  = "<$key>".Route::REGEX_SEGMENT;
				$replace[] = "<$key>$value";
			}

			// Replace the default regex with the user-specified regex
			$expression = str_replace($search, $replace, $expression);
		}

		return '#^'.$expression.'$#uD';
	}

	/**
	 * @var  callback     The callback method for routes
	 */
	protected $_callback;

	/**
	 * @var  string  route URI
	 */
	protected $_uri = '';

	/**
	 * @var  array
	 */
	protected $_regex = array();

	/**
	 * @var  array
	 */
	protected $_defaults = array('action' => 'index', 'host' => FALSE);

	/**
	 * @var  string
	 */
	protected $_route_regex;

	/**
	 * Creates a new route. Sets the URI and regular expressions for keys.
	 * Routes should always be created with [Route::set] or they will not
	 * be properly stored.
	 *
	 *     $route = new Route($uri, $regex);
	 *
	 * The $uri parameter can either be a string for basic regex matching or it
	 * can be a valid callback or anonymous function (php 5.3+). If you use a
	 * callback or anonymous function, your method should return an array
	 * containing the proper keys for the route. If you want the route to be
	 * "reversable", you need pass the route string as the third parameter.
	 *
	 *     $route = new Route(function($uri)
	 *     {
	 *     	if (list($controller, $action, $param) = explode('/', $uri) AND $controller == 'foo' AND $action == 'bar')
	 *     	{
	 *     		return array(
	 *     			'controller' => 'foobar',
	 *     			'action' => $action,
	 *     			'id' => $param,
	 *     		);
	 *     	},
	 *     	'foo/bar/<id>'
	 *     });
	 *
	 * @param   mixed    route URI pattern or lambda/callback function
	 * @param   array    key patterns
	 * @return  void
	 * @uses    Route::_compile
	 */
	public function __construct($uri = NULL, $regex = NULL)
	{
		if ($uri === NULL)
		{
			// Assume the route is from cache
			return;
		}

		if ( ! is_string($uri) AND is_callable($uri))
		{
			$this->_callback = $uri;
			$this->_uri = $regex;
			$regex = NULL;
		}
		elseif ( ! empty($uri))
		{
			$this->_uri = $uri;
		}

		if ( ! empty($regex))
		{
			$this->_regex = $regex;
		}

		// Store the compiled regex locally
		$this->_route_regex = Route::compile($uri, $regex);
	}

	/**
	 * Provides default values for keys when they are not present. The default
	 * action will always be "index" unless it is overloaded here.
	 *
	 *     $route->defaults(array(
	 *         'controller' => 'welcome',
	 *         'action'     => 'index'
	 *     ));
	 * 
	 * If no parameter is passed, this method will act as a getter.
	 *
	 * @param   array  key values
	 * @return  $this or array
	 */
	public function defaults(array $defaults = NULL)
	{
		if ($defaults === NULL)
		{
			return $this->_defaults;
		}

		$this->_defaults = $defaults;

		return $this;
	}

	/**
	 * Tests if the route matches a given URI. A successful match will return
	 * all of the routed parameters as an array. A failed match will return
	 * boolean FALSE.
	 *
	 *     // Params: controller = users, action = edit, id = 10
	 *     $params = $route->matches('users/edit/10');
	 *
	 * This method should almost always be used within an if/else block:
	 *
	 *     if ($params = $route->matches($uri))
	 *     {
	 *         // Parse the parameters
	 *     }
	 *
	 * @param   string  URI to match
	 * @return  array   on success
	 * @return  FALSE   on failure
	 */
	public function matches($uri)
	{
		if ($this->_callback)
		{
			$closure = $this->_callback;
			$params = call_user_func($closure, $uri);

			if ( ! is_array($params))
				return FALSE;
		}
		else
		{
			if ( ! preg_match($this->_route_regex, $uri, $matches))
				return FALSE;

			$params = array();
			foreach ($matches as $key => $value)
			{
				if (is_int($key))
				{
					// Skip all unnamed keys
					continue;
				}

				// Set the value for all matched keys
				$params[$key] = $value;
			}
		}

		foreach ($this->_defaults as $key => $value)
		{
			if ( ! isset($params[$key]) OR $params[$key] === '')
			{
				// Set default values for any key that was not matched
				$params[$key] = $value;
			}
		}

		return $params;
	}

	/**
	 * Returns whether this route is an external route
	 * to a remote controller.
	 *
	 * @return  boolean
	 */
	public function is_external()
	{
		return ! in_array(Arr::get($this->_defaults, 'host', FALSE), Route::$localhosts);
	}

	/**
	 * Generates a URI for the current route based on the parameters given.
	 *
	 *     // Using the "default" route: "users/profile/10"
	 *     $route->uri(array(
	 *         'controller' => 'users',
	 *         'action'     => 'profile',
	 *         'id'         => '10'
	 *     ));
	 *
	 * @param   array   URI parameters
	 * @return  string
	 * @throws  Kohana_Exception
	 * @uses    Route::REGEX_Key
	 */
	public function uri(array $params = NULL)
	{
		// Start with the routed URI
		$uri = $this->_uri;

		if (strpos($uri, '<') === FALSE AND strpos($uri, '(') === FALSE)
		{
			// This is a static route, no need to replace anything

			if ( ! $this->is_external())
				return $uri;

			// If the localhost setting does not have a protocol
			if (strpos($this->_defaults['host'], '://') === FALSE)
			{
				// Use the default defined protocol
				$params['host'] = Route::$default_protocol.$this->_defaults['host'];
			}
			else
			{
				// Use the supplied host with protocol
				$params['host'] = $this->_defaults['host'];
			}

			// Compile the final uri and return it
			return rtrim($params['host'], '/').'/'.$uri;
		}

		while (preg_match('#\([^()]++\)#', $uri, $match))
		{
			// Search for the matched value
			$search = $match[0];

			// Remove the parenthesis from the match as the replace
			$replace = substr($match[0], 1, -1);

			while (preg_match('#'.Route::REGEX_KEY.'#', $replace, $match))
			{
				list($key, $param) = $match;

				if (isset($params[$param]))
				{
					// Replace the key with the parameter value
					$replace = str_replace($key, $params[$param], $replace);
				}
				else
				{
					// This group has missing parameters
					$replace = '';
					break;
				}
			}

			// Replace the group in the URI
			$uri = str_replace($search, $replace, $uri);
		}

		while (preg_match('#'.Route::REGEX_KEY.'#', $uri, $match))
		{
			list($key, $param) = $match;

			if ( ! isset($params[$param]))
			{
				// Look for a default
				if (isset($this->_defaults[$param]))
				{
					$params[$param] = $this->_defaults[$param];
				}
				else
				{
					// Ungrouped parameters are required
					throw new Kohana_Exception('Required route parameter not passed: :param', array(
						':param' => $param,
					));
			}
			}

			$uri = str_replace($key, $params[$param], $uri);
		}

		// Trim all extra slashes from the URI
		$uri = preg_replace('#//+#', '/', rtrim($uri, '/'));

		if ($this->is_external())
		{
			// Need to add the host to the URI
			$host = $this->_defaults['host'];

			if (strpos($host, '://') === FALSE)
			{
				// Use the default defined protocol
				$host = Route::$default_protocol.$host;
			}

			// Clean up the host and prepend it to the URI
			$uri = rtrim($host, '/').'/'.$uri;
		}

		return $uri;
	}

} // End Route
