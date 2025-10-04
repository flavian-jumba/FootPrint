<?php
// Simple PHP file in the public directory
echo "<h1>PHP Test File in Public Directory</h1>";
echo "<p>If you can see this, PHP is working in the public directory.</p>";
echo "<p>Current time: " . date("Y-m-d H:i:s") . "</p>";
echo "<p><a href='/api/test.php'>Test PHP in API directory</a></p>";
echo "<p><a href='/'>Return to home</a></p>";