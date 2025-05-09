<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header  class = "bg-primary">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <h1 style="text-align:center ; color : white ; "> Employee Login Page </h1>
            </div>
        </div>
    </header>


    <div class="container mt-5">
    <h1 style="text-align:center ; text-decoration:underline">Insert Data</h1>
    <form action="<?= site_url('user/insert'); ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary" onclick="clickHandle1()">Submit</button>
    </form>

    <br><br>
    <h4><a href="<?= base_url('user/show'); ?>">List Of All Employees</a></h4>

    <script>
        function clickHandle1(){
            alert("Registration done successfully");
        }
    </script>

    <footer class="bg-dark text-white text-center text-lg-start mt-5">
        <div class="text-center p-3 bg-secondary">
        <span style="color:blue">&copy;2025</span> Employee Management System.
    </div>
    </footer>
</div>
</body>
</html>
