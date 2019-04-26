<?php

/**
 * This file is part of Nepttune (https://www.peldax.com)
 *
 * Copyright (c) 2018 Václav Pelíšek (info@peldax.com)
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <https://www.peldax.com>.
 */

declare(strict_types = 1);

namespace Nepttune\Component;

final class ConfigNavbar extends \Nette\Application\UI\Control
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
    
    public function render() : void
    {
        $this->beforeRender();
        $this->template->setFile(__DIR__ . '/ConfigNavbar.latte');
        $this->template->render();
    }
}
