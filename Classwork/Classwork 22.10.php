<?php

function formatMessage(string $text, string  $fillSymbol = "#", int $outputLength = 40): string
{
	if(strlen($text))
	{
		$text = substr($text, 0,10) . "...";
	};
	$result = str_repeat($fillSymbol, $outputLength) . "\n";
	$result .= str_pad($text, $outputLength, $fillSymbol, STR_PAD_BOTH) . "\n";
	$result .= str_repeat($fillSymbol, $outputLength) . "\n";
	return $result;
};

$text = "text";
echo formatMessage($text);
// region Numbers

function calculateTips(int $cost): int
{
	$tipPercent = random_int(0, 100);

	return $cost * ($tipPercent / 100);

}
function generateTips($cost, $iterations): array
{
	$tips = [];

	For ($i = 0;$i<$iterations;$i++)
	{
		$tips[] = calculateTips($cost);
	};
	return $tips;
};

$tips = generateTips(1000, 100);
$minTip = min($tips);
$maxTip = max($tips);
echo "Min tip is - {$minTip}" . "\n";
echo "Max tip is - {$maxTip}" . "\n";

// endregion

$todos = [
	[
		"id" => 1,
		"title" => "read a book",
		"completed" => false
	],
	[
		"id" => 2,
		"title" => "wash dished",
		"completed" => true
	],
	[
		"id" => 3,
		"title" => "wash floors",
		"completed" => false
	]
];
// region Arrays

function getTodoByName(array $todos,string $name)
{
	$key = array_search($name, array_column($todos,"title"), true);
	if($key === false)
	{
		return false;
	}
	return $todos[$key];
}

$result = getTodoByName($todos, "Walk the dog");

function getTodosByStatus(array $todos, bool $status): array
{
	return array_filter($todos, function ($todo) use ($status) {
		return $todo['completed'] === $status;
	});
	$result = getTodoByName($todos, "Walk the dog");
};


var_dump($result);
// endregion


// region Dates

function getDaysUntil(string $date): int
{
	$seconds = strtotime($date);
	$secondsNow = time();

	$diff = $seconds - $secondsNow;
	if ($diff < 0)
	{
		return 0;
	}

	$secondsInDays = 60 * 60 * 24;
	return round($diff/$secondsInDays);
}

$result = getDaysUntil("29.10.2021");
echo "$result days left";







// endregion
