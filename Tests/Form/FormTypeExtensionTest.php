<?php

/*
 * This file is part of the FilterBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\FilterBundle\Tests\Form;

use Bukashk0zzz\FilterBundle\Tests\Fixtures\User;
use Bukashk0zzz\FilterBundle\Tests\Fixtures\UserType;

/** @noinspection LongInheritanceChainInspection
 *
 * Test the FormTypeExtension
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 */
class FormTypeExtensionTest extends AbstractFormTypeExtension
{
    /**
     * Test form type extension
     * @throws \Symfony\Component\Form\Exception\AlreadySubmittedException
     * @throws \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException if any given option is not applicable to the given type
     */
    public function testType()
    {
        $user = new User();
        $form = $this->factory->create(UserType::class, $user);
        $form->submit([
            'name' => '     Test name <p>test</p> bla <br> bla',
            'about' => 'Test <p>about</p>     ',
        ]);
        static::assertSame('Test name test bla <br> bla', $user->getName());
        static::assertSame('Test about', $form->getData()->getAbout());
    }
}
