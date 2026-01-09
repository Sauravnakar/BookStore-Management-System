<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Phase 2</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f9; text-align: center; padding-top: 50px; }
        .container { background: white; width: 50%; margin: auto; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .badge { padding: 10px 20px; border-radius: 5px; color: white; font-weight: bold; }
        .success { background-color: #28a745; }
        .error { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Book Store Management System</h1>
        <p>Phase 2: Development Status</p>
        <hr>
        <p>Web Server: <span class="badge success">Active</span></p>
        
        <p>Database Connection: 
            <?php if ($pdo): ?>
                <span class="badge success">Connected Successfully</span>
            <?php else: ?>
                <span class="badge error">Failed</span>
            <?php endif; ?>
        </p>
    </div>
</body>
</html>