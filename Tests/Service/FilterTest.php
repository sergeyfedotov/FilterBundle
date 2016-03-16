<?php

/*
 * This file is part of the FilterBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\FilterBundle\Tests\Service;

use Bukashk0zzz\FilterBundle\Service\Filter;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Cache\ArrayCache;

/**
 * Test the FilterTest
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 */
class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Service init test
     */
    public function testWrapper()
    {
        $filter = new Filter(new CachedReader(new AnnotationReader(), new ArrayCache()));

        //check if instance
        static::assertInstanceOf('Bukashk0zzz\FilterBundle\Service\Filter', $filter);
    }

    /**
     * Test Filter With Object that null
     */
    public function testFilterWithNullObject()
    {
        $filter = new Filter(new CachedReader(new AnnotationReader(), new ArrayCache()));
        $filter->filterEntity(null);
    }
}