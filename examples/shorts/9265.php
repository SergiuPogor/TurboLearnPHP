<?php
// Dynamic Dropdown with AJAX in PHP

// Example HTML for the dropdown
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown with AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mainDropdown').change(function() {
                const selectedValue = $(this).val();
                $.ajax({
                    url: 'fetch_data.php', // PHP script to fetch data
                    type: 'POST',
                    data: { id: selectedValue },
                    success: function(data) {
                        $('#dynamicDropdown').html(data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <select id="mainDropdown">
        <option value="">Select an option</option>
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
    </select>

    <select id="dynamicDropdown">
        <option value="">Select a sub-option</option>
    </select>
</body>
</html>

<?php
// fetch_data.php
// Fetching data based on the selected option

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    // Simulate fetching data from a database
    $data = [
        1 => ['Sub-option 1A', 'Sub-option 1B'],
        2 => ['Sub-option 2A', 'Sub-option 2B'],
        3 => ['Sub-option 3A', 'Sub-option 3B']
    ];

    if (array_key_exists($id, $data)) {
        foreach ($data[$id] as $option) {
            echo "<option value=\"$option\">$option</option>";
        }
    }
}
?>