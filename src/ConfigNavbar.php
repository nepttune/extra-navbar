<?php

namespace Nepttune\Component;

final class ConfigNavbar extends BaseComponent
{
    /** @var array */
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    protected function beforeRender() : void
    {
        $this->template->background = isset($this->config['background']) ? $this->config['background'] : false;
        $this->template->breakpoint = isset($this->config['breakpoint']) ? $this->config['breakpoint'] : false;
        $this->template->brand = isset($this->config['brand']) ? $this->config['brand'] : false;
        $this->template->class = isset($this->config['class']) ? $this->config['class'] : false;
        $this->template->items = $this->config['items'];
    }
}
