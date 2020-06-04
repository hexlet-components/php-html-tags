<?php

namespace PhpHtmlTags\HtmlTags;

use function PhpPairs\Pairs\cons;
use function PhpPairs\Pairs\car;
use function PhpPairs\Pairs\cdr;
use function PhpPairs\Pairs\isPair;
use function PhpPairsData\Lists\reverse;
use function PhpPairsData\Lists\l;
use function PhpPairsData\Lists\cons as consLists;
use function PhpPairsData\Lists\isEmpty;
use function PhpPairsData\Lists\head;
use function PhpPairsData\Lists\tail;
use function PhpPairsData\Lists\map as mapLists;
use function PhpPairsData\Lists\filter as filterLists;
use function PhpPairsData\Lists\reduce as reduceLists;

/**
 * Make a list of nodes
 * @example
 * make(node('span', 'hello'), node('span', 'world'));
 */
function make(...$elements)
{
    return reverse(l(...$elements));
}

/**
 * Append node to a list of nodes
 * @example
 * $dom = make();
 * append($dom, node('h2', 'hello, world'));
 *
 */
function append($dom, $element)
{
    return consLists($element, $dom);
}

/**
 * Make a node
 * @example
 * node('h2', 'hello, world');
 * node('div', l(node('p', 'one'), node('p', 'two')));
 */
function node($tag, $mix = null)
{
    return cons($tag, $mix);
}

/**
 * Get node's name
 * @example
 * getName(node('p', 'hello, world')); // p
 */
function getName($element)
{
    return car($element);
}

/**
 * Get node's value
 * @example
 * getValue(node('p', 'hello, world')); // hello, world
 */
function getValue($element)
{
    return cdr($element);
}

/**
 * Check if node is tag
 * @example
 * is('h3', node('h3', 'hexlet')); // true
 * is('h3', node('h6', 'hexlet')); // false
 */
function is($tagName, $element)
{
    return $tagName === getName($element);
}

/**
 * Check if node has children
 * @example
 * hasChildren(node('h3', 'hexlet')); // false
 * hasChildren(node('div', l(node('p', 'wow')))); // true
 */
function hasChildren($element)
{
    return isPair(cdr($element));
}

/**
 * Get node's children
 * @example
 * $children = l(node('p', 'wow'), node('p', 'hey'));
 * children(node('div', $children)); // [('p', 'wow'), ('p', 'hey')]
 */
function children($element)
{
    return cdr($element);
}

/**
 * Add child to node
 * @example
 * $node = node('div');
 * addChild($node, node('p', 'html tags'));
 */
function addChild($element, $child)
{
    return consLists(
        getName($element),
        consLists($child, children($element)),
    );
}

/**
 * Convert list of nodes to string
 * @example
 * $tags = make(node('p', 'text'), node('p', 'text2'));
 * toString($tags); // <p>text</p><p>text2</p>
 */
function toString($elements)
{
    if ($elements === null) {
        return '';
    }

    $element = head($elements);
    $tag = getName($element);
    $body = hasChildren($element) ? toString(children($element)) : getValue($element);
    $recursive = toString(tail($elements));
    return "{$recursive}<{$tag}>{$body}</{$tag}>";
}

/**
 * Map a list of nodes
 * @example
 * map($dom, function ($element) {
 *     if (is('h2', $element)) {
 *         return node('h3', getValue($element));
 *     }
 *     return $element;
 * });
 */
function map($elements, $func)
{
    return mapLists($elements, $func);
}

/**
 * Filter a list of nodes
 * @example
 * filter($dom, fn($element) => is('h2', $element));
 */
function filter($elements, $func)
{
    return filterLists($elements, $func);
}

/**
 * Reduce a list of nodes
 * @example
 * reduce($dom, fn($element, $acc) => $acc + 1, 0);
 */
function reduce($elements, $func, $init)
{
    return reduceLists($elements, $func, $init);
}
