<?php

include_once "../../src/autoload.php";

class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
			],
			'filled but empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				]
			],
			'filled but only one empty' => [
				[
					'Name' => 'Petr',
					'PersonalAcc' => '131313',
					'BankName' => 'Sber',
					'BIC' => 'Big bang',
					'CorrespAcc' => '',
				]
			],
			'filled but with invalid type' => [
				[
					'Name' => true,
					'PersonalAcc' => '131313',
					'BankName' => 'Sber',
					'BIC' => 'Big bang',
					'CorrespAcc' => '12312',
				]
			],'filled but with invalid length' => [
				[
					'Name' => 'Andrew',
					'PersonalAcc' => '131313',
					'BankName' => 'Sber',
					'BIC' => '1234678910',
					'CorrespAcc' => '12312',
				]
			],

		];
	}

	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 */
	public function testValidateFail(array $fields): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();

		static::assertFalse($result->isSuccess());
	}

	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$dataGenerator
			->setName('Name')
			->setBIC('BIC')
			->setBankName('BankName')
			->setCorrespondentAccount('CorrespondentAccount')
			->setPersonalAccount('CorrespondentAccount')
		;

		$result = $dataGenerator->validate();

		static::assertTrue($result->isSuccess());
	}

	public function testGetData(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=', $data);
	}

}
