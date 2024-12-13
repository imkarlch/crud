<?php
// Create database connection using config file
include_once("config.php");

// Initialize search query
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = mysqli_real_escape_string($mysqli, $_POST['search_query']);
}

// Fetch all users data from database
$query = "SELECT * FROM users";
if (!empty($search_query)) {
    $query .= " WHERE name LIKE '%" . $search_query . "%'";
}
$query .= " ORDER BY id DESC";
$result = mysqli_query($mysqli, $query);
?>

<html>
<head>
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<div class="container"> <br>
    <div class="btn-group"> 
        <a href="create.php" class="btn btn-primary active" aria-current="page">Home</a>
        <a href="add.php" class="btn btn-outline-success">Add New User</a>
    </div>
</div>

<br>
<div class="container">
    <h2 align="center">Dashboard</h2>
    <br/><br/>
    <!-- Search Form -->
    <form method="post" action="" class="d-flex mb-3">
        <input type="text" name="search_query" class="form-control me-2" placeholder="Search by name" value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit" name="search" class="btn btn-outline-primary">Search</button>
    </form>
</div>

<div class="container">
    <table class='table table-bordered table-striped'>
        <thead>
        <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class='btn btn-primary'>Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class='btn btn-danger' onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
