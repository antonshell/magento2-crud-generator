# Magento 2 crud generator

Generates simple crud for magento 2

# Install & Configure

1 . Clone repository

```
git clone https://github.com/antonshell/magento2-crud-generator.git
```

2 . Edit config

```
cp _config.php.dist _config.php
nano _config.php
```

```php
<?php

return [
    'outPath' => '/path_to_magento_installation/app/code/Antonshell/Poster'
];
```

3 . Edit variables

```
cp _variables.php.dist _variables.php
nano _variables.php
```

```php
<?php

return [
    'vendor' => 'Antonshell',
    'module_name' => 'Posts',
    'module_name_underscore' => 'Antonshell_Posts',
    'view_path' => 'posts',
    'entity' => 'Post',
    'view_path_ucf' => 'Posts',
    'entity_lower' => 'post',
    'setup_version' => '1.0.0',
    'table_name' => 'company_filter',
];
```

4 . Create module dir

```
mkdir -p /path_to_magento_installation/app/code/Antonshell/Posts
```

5 . Generate module

```
php generate.php
```

# On magento side

1 . Ensure module is generated inside directory

```
cd /path_to_magento_installation/
ls -al /path_to_magento_installation/app/code/Antonshell/Posts
```

2 . Enable module

```
bin/magento module:enable Antonshell_Posts
```

3 . Run console commands

```
sudo php bin/magento setup:upgrade
sudo php bin/magento setup:di:compile
```