<?php
declare(strict_types=1);

namespace Tests\SharedKernel\Domain;

use Domain\Exception\InvalidEmailException;
use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\Email;

class EmailTest extends TestCase
{
    public function testConstruction(): void
    {
        $email = new Email('test@email.com');
        self::assertEquals('test@email.com', (string) $email);
        $email = new Email('test2@email.com');
        self::assertEquals('test2@email.com', $email->jsonSerialize());
    }

    public function testShouldFail(): void
    {
        $this->expectException(InvalidEmailException::class);
        $email = new Email('wrongmail.com');
    }
}
