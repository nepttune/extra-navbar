# Extra navbar 

:heavy_plus_sign: Bonus navbar component

## Introduction

This package contains component designed for generating static Bootstrap 4 navbar.

## Dependencies

- [nepttune/base-requirements](https://github.com/nepttune/base-requirements)
- [nepttune/base-components](https://github.com/nepttune/base-components)

## How to use

- Register `\Nepttune\Component\IConfigNavbarFactory` as service in cofiguration file, inject it into presenter, write `createComponent` method and use macro `{control}` in template file.
  - Just as any other component.
  - You need to pass array configuration to factory service.
- Modify parameters to accomplish your needs.

Parameter array has to follow format of following example. There is some clarifying description.

- `settings` is representation of menu items with following options.
  - `dest` - Link destination. Can be array, to create expandable sub-menu.
  - `name` - Displayed name.
  - `role` - Role required for user to have in order to display this link. (OPTIONAL)
  - `class` - HTML class added to the link element. When `dest` is an array, class is added to every link. (OPTIONAL)
- `category` and `ingredient` are representation of dropdown options with following options.
  - `dest` - Link destination.
  - `name` - Displayed name.
  - `role` - Role required for user to have in order to display this link. (OPTIONAL)
  - `class` - HTML class added to the link element. (OPTIONAL)
- If `brand` key exists, it is used as brand (header) item with following options.
  - `dest` - Link destination.
  - `name` - Displayed name.
  - `image` - Header image.

### Example configuration

```
services:
    configNavbar:
        implement: Nepttune\Component\IConfigNavbarFactory
        arguments:
          - '%configNavbar%'
parameters:
    configNavbar:
        brand:
            name: 'Brand'
            image: '/www/images/brand.png'
            dest: 'Default:default'
        settings:
            name: 'Settings'
            dest:
                category:
                    name: 'Category'
                    dest: 'Category:default'
                ingredient:
                    name: 'Ingredient'
                    dest: 'Ingredient:default'
```
Which renders as following HTML.
```
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="/www/images/brand.png" width="30" height="30" alt="Brand">
        Brand
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown"><span
        class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-settings" data-toggle="dropdown">
                    Dropdown link
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/category/">Category</a>
                  <a class="dropdown-item" href="/ingredient/">Ingredient</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
```
