// Example usage of array_combine to pair arrays
$user_ids = [101, 102, 103];
$usernames = ['alice', 'bob', 'charlie'];

$user_data = array_combine($user_ids, $usernames);

print_r($user_data);
// Outputs:
// Array
// (
//     [101] => alice
//     [102] => bob
//     [103] => charlie
// )