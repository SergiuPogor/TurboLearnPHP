<?php

// Function to pad a string to a specific length
function padString(string $input, int $length, string $padString = ' ', int $padType = STR_PAD_RIGHT): string {
    return str_pad($input, $length, $padString, $padType);
}

$originalString = "PHP";
$paddedString = padString($originalString, 10, '*', STR_PAD_BOTH);
echo $paddedString; // Output: ***PHP****

$data = [
    'Name' => 'Alice',
    'Role' => 'Developer'
];

foreach ($data as $key => $value) {
    echo padString($key, 15) . padString($value, 20) . PHP_EOL;
}

// Example: Aligning data for report generation
class ReportGenerator
{
    private int $fieldLength;

    public function __construct(int $fieldLength)
    {
        $this->fieldLength = $fieldLength;
    }

    public function formatLine(string $label, string $value): string
    {
        return padString($label, $this->fieldLength) . padString($value, $this->fieldLength);
    }
}

$report = new ReportGenerator(20);
echo $report->formatLine("Employee Name", "John Doe") . PHP_EOL;
echo $report->formatLine("Department", "Engineering") . PHP_EOL;

?>