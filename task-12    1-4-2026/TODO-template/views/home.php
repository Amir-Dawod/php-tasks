<?php
require_once "inc/header.php";
require_once "helper/helper.php";
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
                <span class="badge bg-<?= priorityBadge($task['priority']) ?>">
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
                <form class="d-inline" action="actions/delete_task.php" method='post'>
                  <input type="hidden" name="task_id" value="<?= $task['id'] ?>">

                  <button type="submit" class="btn btn-sm btn-danger action-btn">
                    <i class="fas fa-trash me-1"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>


<?php require_once "inc/footer.php"; ?>