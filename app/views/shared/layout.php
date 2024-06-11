<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master test Layout !</title>
</head>

<body>
<h1>Category List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            
                <?php foreach ($arr as $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($category['id']); ?></td>
                        <td><?php echo htmlspecialchars($category['name']); ?></td>
                        <td><?php echo htmlspecialchars($category['description']); ?></td>
                        <td><?php echo htmlspecialchars($category['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($category['updated_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            
                <tr>
                    <td colspan="5">No categories found</td>
                </tr>
            
        </tbody>
    </table>
</body>

</html>