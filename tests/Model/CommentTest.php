<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\NewsBundle\Tests\Model;

use PHPUnit\Framework\TestCase;
use Sonata\NewsBundle\Model\Comment;
use Sonata\NewsBundle\Model\PostInterface;

class ModelTest_Comment extends Comment
{
    public function getId()
    {
    }
}

class CommentTest extends TestCase
{
    public function testSettersGetters()
    {
        $date = new \DateTime();

        $comment = new ModelTest_Comment();
        $comment->setCreatedAt($date);
        $comment->setEmail('email@example.org');
        $comment->setMessage('My message');
        $comment->setName('My name');
        $comment->setPost($post = $this->createMock(PostInterface::class));
        $comment->setStatus(1);
        $comment->setUpdatedAt($date);
        $comment->setUrl('http://www.example.org');

        $this->assertSame($date, $comment->getCreatedAt());
        $this->assertSame('email@example.org', $comment->getEmail());
        $this->assertSame('My message', $comment->getMessage());
        $this->assertSame('My name', $comment->getName());
        $this->assertInstanceOf(PostInterface::class, $post);
        $this->assertSame($post, $comment->getPost());
        $this->assertSame(1, $comment->getStatus());
        $this->assertSame($date, $comment->getUpdatedAt());
        $this->assertSame('http://www.example.org', $comment->getUrl());
    }
}
