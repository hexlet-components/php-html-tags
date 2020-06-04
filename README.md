# php-html-tags

Functions for working with HTML tags.

## Examples

```php
<?php

use function PhpHtmlTags\HtmlTags\make;
use function PhpHtmlTags\HtmlTags\append;
use function PhpHtmlTags\HtmlTags\node;
use function PhpHtmlTags\HtmlTags\toString;
use function PhpHtmlTags\HtmlTags\addChild;
use function PhpHtmlTags\HtmlTags\hasChildren;

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

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/hexletguides.github.io/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-eloquent-blog)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=php-eloquent-blog).