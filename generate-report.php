<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "Guest";
    $message = $_POST["message"] ?? "No message";

    // Unique filename using timestamp
    $filename = "report_" . time() . ".pdf";

    // Escape arguments
    $name_arg = escapeshellarg($name);
    $message_arg = escapeshellarg($message);
    $file_arg = escapeshellarg($filename);

    $python = '"C:\Program Files\Python313\python.exe"';
    $script = '"C:\xampp\htdocs\ecommerce\scripts\report_generator.py"';

    $command = "$python $script $name_arg $message_arg $file_arg";
    shell_exec($command);

    echo "<p>PDF generated successfully.</p>";
    echo "<a href='reports/$filename' target='_blank'>Download PDF</a>";
} else {
?>
<form method="POST">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Message: <input type="text" name="message" required></label><br>
    <button type="submit">Generate PDF</button>
</form>
<?php } ?>
