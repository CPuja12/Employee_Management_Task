<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header  class = "bg-primary">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <h1 style="text-align:center ; color : white"> User Login Page </h1>
            </div>
        </div>
    </header>

<div class="container mt-5">
    <h1>Edit Data of Employees</h1>
    <form action="<?= site_url('user/update'); ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($row['id']) ?>">
        
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= esc($row['name']) ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= esc($row['email']) ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?= esc($row['password']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

    <footer class="bg-dark text-white text-center text-lg-start mt-5">
        <div class="text-center p-3 bg-secondary">
        <span style="color:blue">&copy;2025</span> Employee Management System.
    </div>
    </footer>
</body>
</html>
