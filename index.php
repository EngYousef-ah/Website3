<?php
session_start();
include 'db_connection.php';
try {
    if (!empty($_COOKIE['user'])) {
        $stmt2 = $conn->prepare('SELECT id FROM users WHERE username = ?');
        $stmt2->execute([$_COOKIE['user']]);
        $userid = $stmt2->fetchColumn();

        if ($userid) {
            $stmt = $conn->prepare("SELECT * FROM clients WHERE userid = ?");
            $stmt->execute([$userid]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = [];
        }
    } else {
        $results = [];
    }
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/style.css">

</head>

<body>

    <?php
    include_once("header.php");
    ?>

    <!--StartTabel-->
    <section class="intro">
        <div class="bg-image h-100" style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/044/280/984/small_2x/stack-of-books-on-a-brown-background-concept-for-world-book-day-photo.jpg')">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card bg-dark shadow-2-strong">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-borderless mb-5">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Created-At</th>
                                                    <th scope="col">Edit / Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($results as $result): ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($result['id']); ?></td>
                                                        <td><?= htmlspecialchars($result['name']); ?></td>
                                                        <td><?= htmlspecialchars($result['email']); ?></td>
                                                        <td><?= htmlspecialchars($result['phone']); ?></td>
                                                        <td><?= htmlspecialchars($result['address']); ?></td>
                                                        <td><?= htmlspecialchars($result['created_at']); ?></td>
                                                        <td>
                                                            <a href="edit.php?id=<?= htmlspecialchars($result['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                            <a href="delete.php?id=<?= htmlspecialchars($result['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?php if (empty($_COOKIE['user'])): ?>
                                            <p class="text-center text-white mt-3">You must create an account and log in to view results specific to each user.</p>
                                        <?php elseif (empty($results) && !empty($_COOKIE['user'])): ?>
                                            <p class="text-center text-white mt-3">No records found for this user.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--EndTabel-->
    <!--StartFooter-->
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2024. All rights reserved.
        </div>
        <!-- Copyright -->

    </div>
    <!--EndFooter-->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>