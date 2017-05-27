<?php

namespace Bolt\Twig\Extension;

use Bolt\Twig\Runtime;
use Twig_Extension as Extension;
use Twig_Filter as TwigFilter;
use Twig_Test as TwigTest;

/**
 * Text functionality Twig extension.
 *
 * @internal
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class TextExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        $safe = ['is_safe' => ['html']];

        return [
            // @codingStandardsIgnoreStart
            new TwigFilter('json_decode',    [Runtime\TextRuntime::class, 'jsonDecode']),
            new TwigFilter('localedatetime', [Runtime\TextRuntime::class, 'localeDateTime'], $safe),
            new TwigFilter('preg_replace',   [Runtime\TextRuntime::class, 'pregReplace']),
            new TwigFilter('safestring',     [Runtime\TextRuntime::class, 'safeString'], $safe),
            new TwigFilter('slug',           [Runtime\TextRuntime::class, 'slug']),
            // @codingStandardsIgnoreEnd
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getTests()
    {
        return [
            new TwigTest('json', [Runtime\TextRuntime::class, 'testJson']),
        ];
    }
}