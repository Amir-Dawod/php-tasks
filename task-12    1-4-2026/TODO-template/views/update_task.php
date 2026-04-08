<?php
require_once "inc/header.php";

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM tasks WHERE id=$id";
  $result = mysqli_query($con, $sql);
  $task = mysqli_fetch_assoc($result);
}

?>
<!-- Page Header -->
<div class="page-header">
  <div class="container">
    <h1 class="mb-0">
      <i class="fas fa-edit me-3"></i>Update Task
    </h1>
    <p class="mb-0 mt-2 opacity-75">Modify your existing task details and keep everything up to date</p>
  </div>
</div>

<!-- Main Content -->
<div class="container main-content">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= $_SERVER['PHP_SELF']?>?page=home">
          <i class="fas fa-home me-1"></i>Dashboard
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?= $_SERVER['PHP_SELF']?>?page=home">Tasks</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Update Task</li>
    </ol>
  </nav>
  <div class="form-container">
    <!-- Task Info Badge -->
    <div class="task-info-badge">
      <h6><i class="fas fa-info-circle me-2"></i>Task Information</h6>
      <div class="row">
        <div class="col-md-6">
          <small><strong>Task ID:</strong> #<?= $task['id'] ?></small>
        </div>
        <div class="col-md-6">
          <small><strong>Created:</strong> <?= $task['create_at'] ?></small>
        </div>
      </div>
    </div>

    <div class="text-center mb-4">
      <i class="fas fa-edit task-icon"></i>
      <h2 class="mb-0">Update Task</h2>
      <p class="text-muted">Modify the details below to update your task</p>
    </div>

    <form action="actions/edit_task.php" method="post">
      <div class="mb-4">
        <label for="taskInput" class="form-label">
          <i class="fas fa-tasks me-2"></i>Task Description
        </label>
        <input
          type="text"
          class="form-control"
          id="taskInput"
          name="title"
          placeholder="Enter a clear and descriptive task..."
          maxlength="255"
          value="<?= $task['title'] ?>" />
        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
        <div class="form-text">
          <i class="fas fa-info-circle me-1"></i>
          Describe what needs to be done clearly and concisely
        </div>
      </div>

      <div class="mb-4">
        <label for="taskPriority" class="form-label">
          <i class="fas fa-flag me-2"></i>Priority Level
        </label>
        <select class="form-control" name="priority" id="taskPriority">
          <option value="">Select priority level</option>
          <option value="high" <?= $task['priority'] == "high" ? "selected" : "" ?>>High Priority</option>
          <option value="medium" <?= $task['priority'] == "medium" ? "selected" : "" ?>>Medium Priority</option>
          <option value="low" <?= $task['priority'] == "low" ? "selected" : "" ?>>Low Priority</option>

        </select>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="<?= $_SERVER['PHP_SELF']?>?page=home" class="btn btn-secondary me-md-2">
          <i class="fas fa-times me-2"></i>Cancel
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save me-2"></i>Update Task
        </button>
      </div>
    </form>
  </div>
</div>

<?php require_once "inc/footer.php"; ?>