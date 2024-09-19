<?php

namespace Tests\Unit;

use App\Services\FromActionService;
use PHPUnit\Framework\TestCase;

class FromActionServiceTest extends TestCase
{
    private FromActionService $fromActionService;
    protected function setUp(): void
    {
        parent::setUp();

        $this->fromActionService = new FromActionService();
    }

    public function test_form_action()
    {
        $stub1 = $this->fromActionService->nameAction("павел");
        $stub2 = $this->fromActionService->nameAction("пАвел");
        $stub3 = $this->fromActionService->nameAction("паВел");
        $stub4 = $this->fromActionService->nameAction("пАВЕЛ");

        $this->assertEquals("Павел", $stub1);
        $this->assertEquals("Павел", $stub2);
        $this->assertEquals("Павел", $stub3);
        $this->assertEquals("Павел", $stub4);
    }
}
