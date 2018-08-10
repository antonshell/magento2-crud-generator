# {{{vendor}}} {{{module_name}}} module

{{{vendor}}} Magento 2 module that implements {{{module_name}}} feature.

# Install

1 . Setup module - copy module folder to app/code/{{{vendor}}}

Module folder is 

```
{{{module_name}}}
```

2 . Enable module

```
bin/magento module:enable {{{module_name_underscore}}}
```

3 . Clean cache etc.

```
php bin/magento cache:clean
bin/magento setup:upgrade
```