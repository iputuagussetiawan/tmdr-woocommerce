# Change Log

## Version 0.1.6 - 14/10/2023

### changelog.md

    - standarise writing

### layout.scss

    - remove bootstrap component
    - change `@import` to `@use` for _init-bootstrap.scss

### _init_bootstrap.scss

    - add all bootstrap component

---

## Version 0.1.5 - 17/10/2023

### functions-custom.php

    - added `show_debug_helper()` function

### functions-plugin.php

    - added Wordfence as a recommended plugin
    
### functions-theme-setup.php

    - add new admin color scheme

### header.php

    - add `show_debug_console()` example

### tmdr-admin-color-scheme.scss

    - new file added

### template-parts/debug-console.php

    - new file added

---

## Version 0.1.4 - 03/10/2023

### funcstions.php

    - fix file path

---

## Version 0.1.3 - 15/09/2023

### function-style-script.php

    - fix google font integration

### functions-theme-setup.php

    - add javascript to change language switcher palcement on login page

---

## Version 0.1.2 - 07/09/2023

### change-log.md

    - add `change-log.md` file

---

## Version 0.1.1 - 07/09/2023

### style.css

    - add `Starter Version`

### functions-acf.php

    - update comment
    - change `TMDR Theme Setting` option page -> `Theme Setting`
    - change `TMDR Theme Setting` menu slug from `tmdr-theme-setting` -> `theme-setting`
    - change `General Setting` option sub-page -> `Login `
    - change `Login Image` input field name -> `Login Background Image`

### functions-custom.php

    - add `add_admin_menu_separator` function

### functions-theme-setup.php

    - update ACF integration for background image

### _init-bootstrap.scss

    - add Bootstrap Nav scss component

### _mixin.scss

    - update elypsis mixin

### tmdr-admins.scss

    - change `%loginLogoSetting` height -> max-height
    - change `%loginLogoSetting` background-size cover -> contain
    - add `%loginLogoSetting` background-position center

### header.php

    - add class `navbar-nav` to menu `ul`
    - change `item_wrap` -> `items_wrap`