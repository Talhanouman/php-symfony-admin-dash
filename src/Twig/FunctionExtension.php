<?php


namespace App\Twig;

use App\Service\ConfigBag;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FunctionExtension extends AbstractExtension
{
    /**
     * @var ConfigBag
     */
    private $bag;

    public function __construct(ConfigBag $bag)
    {
        $this->bag = $bag;
    }

    /**
     * Create Twig Function.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('title', [$this, 'title']),
            new TwigFunction('inArray', [$this, 'inArray']),
            new TwigFunction('pathInfo', [$this, 'pathInfo']),
        ];
    }

    /**
     * Return Panel Title.
     *
     * @param $title
     * @param bool $parent
     *
     * @return mixed
     */
    public function title($title, $parent = true)
    {
        return !$parent ? $title : str_replace(['&T', '&P'], [$title, $this->bag->get('head_title')], $this->bag->get('head_title_pattern'));
    }

    /**
     * Checks if a value exists in an array.
     *
     * @param $needle
     */
    public function inArray($needle, array $haystack): bool
    {
        return \in_array(mb_strtolower($needle), $haystack, false);
    }

    /**
     * Information about a file path.
     *
     * @param string $options
     */
    public function pathInfo(string $path, $options = 'extension'): string
    {
        return pathinfo($path)[mb_strtolower($options)];
    }
}
