<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ActiveLinkComposer
{
    /**
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * @var string
     */
    private $activeClass = 'active';

    /**
     * @var string
     */
    private $template = ' class="{classes}"';

    /**
     * Create a new profile composer.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('link', $this);
    }

    public function checkActive($paths)
    {
        if($this->matches($paths , $this->request->decodedPath())){
            echo "active";
        }
    }

    /**
     * Determine if a link should be marked as active based on the provided route(s)
     * and return the class attribute. Optionally, you can override the template
     * to only return the class list or individual active state for the link.
     *
     * @param $routes string|array A single or list of routes to match against.
     * @param string $classes string A string of classes to be returned with the state.
     * @param null $activeClass string A string to override the $this->activeClass.
     * @param null $template string A string to override $this->template
     * @return string
     */
    public function activeRoute($routes, $classes = '', $activeClass = null, $template = null)
    {
        return $this->buildClassList(
            $routes, $this->request->route()->getName(), $classes, $activeClass, $template
        );
    }

    /**
     * Determine if a link should be marked as active based on the provided path(s)
     * and return the class attribute. Optionally, you can override the template
     * to only return the class list or individual active state for the link.
     *
     * @param $paths string|array A single or list of paths to match against.
     * @param string $classes string A string of classes to be returned with the state.
     * @param null $activeClass string A string to override the $this->activeClass.
     * @param null $template string A string to override $this->template
     * @return string
     */
    public function activePath($paths, $classes = '', $activeClass = null, $template = null)
    {
        return $this->buildClassList(
            $paths, $this->request->decodedPath(), $classes, $activeClass, $template
        );
    }

    /**
     * Determine if a link should be marked as active based on provided patterns(s)
     * and return the class attribute. Optionally, you can override the template
     * to only return the class list or individual active state for the link.
     *
     * @param $patterns string|array A single or list of patterns to match against.
     * @param $value string The string to match the patterns against.
     * @param string $classes string A string of classes to be returned with the state.
     * @param null $activeClass string A string to override the $this->activeClass.
     * @param null $template string A string to override $this->template
     * @return string
     */
    private function buildClassList($patterns, $value, $classes, $activeClass, $template)
    {
        if ($this->matches($patterns, $value)) {
            $classes = trim(implode(' ', [$classes, $activeClass ?: $this->activeClass]));
        }

        return str_replace('{classes}', $classes, $template ?: $this->template);
    }

    /**
     * Determine if any of the provided patterns match the given value.
     *
     * @param $patterns string|array A single or list of patterns to match against.
     * @param $value string The string to match the patterns against.
     * @return bool
     */
    private function matches($patterns, $value)
    {
        foreach ((array) $patterns as $pattern) {
            if (str_is($pattern, $value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Set the active class to be used on future calls.
     *
     * @param $activeClass
     * @return $this
     */
    public function class($activeClass)
    {
        $this->activeClass = $activeClass;

        return $this;
    }

    /**
     * Set the template to be used on future calls.
     *
     * @param $activeTemplate
     * @return $this
     */
    public function template($activeTemplate)
    {
        $this->template = $activeTemplate;

        return $this;
    }
}
