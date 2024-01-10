<?php
// list_handler.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_list'])) {
    $newListItem = $_POST['new_list_item'];
    // Handle adding the new list item (this could involve database operations or other processing)

    // For demonstration purposes, let's print the new list item
    echo "<li><a href='#'>$newListItem</a></li>";
    exit(); // Terminate the script
}
?>
