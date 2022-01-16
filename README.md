# php-html-tags

[![github action status](https://github.com/hexlet-components/php-html-tags/workflows/PHP%20CI/badge.svg)](../../actions)

Functions for working with HTML tags.

## Examples

```php
<?php

use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;
use function Php\Html\Tags\HtmlTags\toString;
use function Php\Html\Tags\HtmlTags\addChild;
use function Php\Html\Tags\HtmlTags\hasChildren;
use function Php\Html\Tags\HtmlTags\getName;
use function Php\Html\Tags\HtmlTags\getValue;

$p = node('p', 'paragraph');
$ul = node('ul');
$ul2 = addChild($ul, node('li', 'body'));
$ul3 = addChild($ul2, node('li', 'another body'));
$dom1 = make();
$dom2 = append($dom1, $p);
$dom3 = append($dom2, $ul3);

toString($dom3);
// '<p>paragraph</p><ul><li>body</li><li>another body</li></ul>';

getName($p); // 'p'
getValue($p); // 'paragraph'
hasChildren($p); // false
```

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/assets/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-html-tags)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-html-tags).
