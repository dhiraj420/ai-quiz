<?php
require 'config.php';
$res=$conn->query("SELECT topic,score,created_at FROM quiz_results ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quiz History</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">Quiz History</h2>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Topic</th>
                                    <th>Score</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($r = $res->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $r['topic'] ?></td>
                                    <td><?= $r['score'] ?>/5</td>
                                    <td><?= $r['created_at'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-3">
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>