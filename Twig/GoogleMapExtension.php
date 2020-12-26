<?php

/*
 * This file is part of the Fungio Google Map bundle package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Fungio\GoogleMapBundle\Twig;

use Fungio\GoogleMap\Map;
use Fungio\GoogleMapBundle\Helper\TemplateHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Fungio google map twig extension.
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class GoogleMapExtension extends AbstractExtension
{
    /** @var \Fungio\GoogleMapBundle\Helper\TemplateHelper */
    protected $templateHelper;

    /**
     * Create the google map twig extension.
     *
     * @param \Fungio\GoogleMapBundle\Helper\TemplateHelper $templateHelper The template helper.
     */
    public function __construct(TemplateHelper $templateHelper)
    {
        $this->templateHelper = $templateHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $mapping = array(
            'google_map'           => 'renderMap',
            'google_map_container' => 'renderHtmlContainer',
            'google_map_css'       => 'renderStylesheets',
            'google_map_js'        => 'renderJavascripts',
        );

        $functions = array();
        foreach ($mapping as $twig => $local) {
            $functions[] = new TwigFunction($twig, array($this, $local), array('is_safe' => array('html')));
        }

        return $functions;
    }

    /**
     * Renders the google map.
     *
     * @param \Fungio\GoogleMap\Map $map The map.
     *
     * @return string The html output.
     */
    public function renderMap(Map $map)
    {
        return $this->templateHelper->renderMap($map);
    }

    /**
     * Renders the google map html container.
     *
     * @param \Fungio\GoogleMap\Map $map The map.
     *
     * @return string The html output.
     */
    public function renderHtmlContainer(Map $map)
    {
        return $this->templateHelper->renderHtmlContainer($map);
    }

    /**
     * Renders the google map stylesheets.
     *
     * @param \Fungio\GoogleMap\Map $map The map.
     *
     * @return string The html output.
     */
    public function renderStylesheets(Map $map)
    {
        return $this->templateHelper->renderStylesheets($map);
    }

    /**
     * Renders the google map javascripts.
     *
     * @param \Fungio\GoogleMap\Map $map The map.
     *
     * @return string The html output.
     */
    public function renderJavascripts(Map $map)
    {
        return $this->templateHelper->renderJavascripts($map);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fungio_google_map';
    }
}
