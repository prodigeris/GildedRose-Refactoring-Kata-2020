<?php

declare(strict_types=1);

use App\ResultGenerator;
use PHPUnit\Framework\TestCase;

class ResultGeneratorTest extends TestCase
{
    private array $expectedResult;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->expectedResult = json_decode(file_get_contents('fixtures/results.txt'), true, 512,
            JSON_THROW_ON_ERROR);
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @test
     */
    public function should_generate_same_results(): void
    {
        // given
        $generatedDays = count($this->expectedResult);

        // when
        $actualResult = ResultGenerator::generate($generatedDays);

        // then
        $this->assertEquals($this->expectedResult, $actualResult);
    }
}
