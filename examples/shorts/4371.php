// Example demonstrating PHP iterators in a kids' Twinkle Tunes keyboard app
class TwinkleTunesKeyboard implements IteratorAggregate {
    private $notes = ['C', 'D', 'E', 'F', 'G', 'A', 'B'];

    public function getIterator() {
        return new ArrayIterator($this->notes);
    }
}

// Example usage
$tunes = new TwinkleTunesKeyboard();
foreach ($tunes as $note) {
    echo $note . " ";
}
// Output: C D E F G A B