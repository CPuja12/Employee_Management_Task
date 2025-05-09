<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Employee List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($table as $k): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= esc($k['name']); ?></td>
                <td><?= esc($k['email']); ?></td>
                <td><?= esc($k['password']); ?></td>
                <td><a href="<?= site_url('user/edit/' . $k['id']); ?>">Edit</a></td>
                <td><a href="<?= site_url('user/delete/' . $k['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

    
</body>
</html>
