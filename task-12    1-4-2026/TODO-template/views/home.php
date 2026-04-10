<?php
 require_once "inc/header.php";

require_once "helpers/function.php";
$sql = "SELECT * FROM tasks ORDER BY id DESC";
$result = mysqli_query($con, $sql);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!-- Page Header -->
<div class="page-header">
  <div class="container">
    <h1 class="mb-0">
      <i class="fas fa-list-check me-3"></i>Todo List Management
    </h1>
    <p class="mb-0 mt-2 opacity-75">Manage your tasks efficiently and stay organized</p>
  </div>
</div>

<!-- Main Content -->
<div class="container main-content">
  <div class="table-container">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th><i class="fas fa-hashtag me-2"></i>ID</th>
            <th><i class="fas fa-tasks me-2"></i>Task</th>
            <th><i class="fas fa-flag me-2"></i>Priority</th>
            <th><i class="fas fa-calendar me-2"></i>Created At</th>
            <th><i class="fas fa-cogs me-2"></i>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tasks as $key => $task): ?>


            <tr>
              <td><?= $key + 1 ?></td>
              <td>
                <div class="d-flex align-items-center">
                  <?= $task['title'] ?>
                </div>
              </td>
              <td>
                <span class="badge bg-<?= priority($task['priority']) ?>">
                  <i class="fas fa-exclamation me-1"></i><?= $task['priority'] ?>
                </span>
              </td>
              <td>
                <small class="text-muted">
                  <i class="fas fa-clock me-1"></i>
                  <?= $task['create_at'] ?>
                </small>
              </td>
              <td>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $task['id'] ?>&page=update_task" class="btn btn-sm btn-warning action-btn">
                  <i class="fas fa-edit me-1"></i>Edit
                </a>
                <form class="d-inline" action="handelers/delete_task.php" method='POST'>
                  <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-danger action-btn">
                    <i class="fas fa-trash me-1"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          <!-- <tr>
            <td>2</td>
            <td>
              <div class="d-flex align-items-center">
                Review code pull requests
              </div>
            </td>
            <td>
              <span class="badge bg-warning">
                <i class="fas fa-exclamation me-1"></i>medium
              </span>
            </td>
            <td>
              <small class="text-muted">
                <i class="fas fa-clock me-1"></i>
                2024-01-15 11:45:00
              </small>
            </td>
            <td>
              <a href="update_task.html" class="btn btn-sm btn-warning action-btn">
                <i class="fas fa-edit me-1"></i>Edit
              </a>
              <form class="d-inline" action="#" method="post">
                <input type="hidden" name="task_id" value="2">
                <button type="submit" class="btn btn-sm btn-danger action-btn">
                  <i class="fas fa-trash me-1"></i>Delete
                </button>
              </form>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>
              <div class="d-flex align-items-center">
                Update team meeting notes
              </div>
            </td>
            <td>
              <span class="badge bg-success">
                <i class="fas fa-exclamation me-1"></i>low
              </span>
            </td>
            <td>
              <small class="text-muted">
                <i class="fas fa-clock me-1"></i>
                2024-01-15 14:20:00
              </small>
            </td>
            <td>
              <a href="update_task.html" class="btn btn-sm btn-warning action-btn">
                <i class="fas fa-edit me-1"></i>Edit
              </a>
              <form class="d-inline" action="#" method="post">
                <input type="hidden" name="task_id" value="3">
                <button type="submit" class="btn btn-sm btn-danger action-btn">
                  <i class="fas fa-trash me-1"></i>Delete
                </button>
              </form>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td>
              <div class="d-flex align-items-center">
                Fix responsive design issues
              </div>
            </td>
            <td>
              <span class="badge bg-danger">
                <i class="fas fa-exclamation me-1"></i>high
              </span>
            </td>
            <td>
              <small class="text-muted">
                <i class="fas fa-clock me-1"></i>
                2024-01-15 16:00:00
              </small>
            </td>
            <td>
              <a href="update_task.html" class="btn btn-sm btn-warning action-btn">
                <i class="fas fa-edit me-1"></i>Edit
              </a>
              <form class="d-inline" action="#" method="post">
                <input type="hidden" name="task_id" value="4">
                <button type="submit" class="btn btn-sm btn-danger action-btn">
                  <i class="fas fa-trash me-1"></i>Delete
                </button>
              </form>
            </td>
          </tr>
          <tr>
            <td>5</td>
            <td>
              <div class="d-flex align-items-center">
                Prepare presentation slides
              </div>
            </td>
            <td>
              <span class="badge bg-warning">
                <i class="fas fa-exclamation me-1"></i>medium
              </span>
            </td>
            <td>
              <small class="text-muted">
                <i class="fas fa-clock me-1"></i>
                2024-01-16 09:15:00
              </small>
            </td>
            <td>
              <a href="update_task.html" class="btn btn-sm btn-warning action-btn">
                <i class="fas fa-edit me-1"></i>Edit
              </a>
              <form class="d-inline" action="#" method="post">
                <input type="hidden" name="task_id" value="5">
                <button type="submit" class="btn btn-sm btn-danger action-btn">
                  <i class="fas fa-trash me-1"></i>Delete
                </button>
              </form>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require_once "inc/footer.php";?>
