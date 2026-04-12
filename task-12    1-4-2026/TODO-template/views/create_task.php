<?php require_once "inc/header.php"; ?>

<!-- Page Header -->
<div class="page-header">
  <div class="container">
    <h1 class="mb-0">
      <i class="fas fa-plus-circle me-3"></i>Create New Task
    </h1>
    <p class="mb-0 mt-2 opacity-75">Add a new task to your todo list and stay organized</p>
  </div>
</div>

<!-- Main Content -->
<div class="container main-content">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php $_SERVER['PHP_SELF'] ?>?page=home">
          <i class="fas fa-home me-1"></i>Dashboard
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?php $_SERVER['PHP_SELF'] ?>?page=home">Tasks</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Create Task</li>
    </ol>
  </nav>

  <div class="form-container">
    <div class="text-center mb-4">
      <i class="fas fa-plus-circle task-icon"></i>
      <h2 class="mb-0">Add New Task</h2>
      <p class="text-muted">Fill in the details below to create a new task</p>
    </div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>?page=create_handle_task" method="post">
      <div class="mb-4">
        <label for="taskInput" class="form-label">
          <i class="fas fa-tasks me-2"></i>Task Description
        </label>
        <input
          type="text"
          class="form-control"
          id="taskInput"
          name="title"
          placeholder="Enter a clear and descriptive task..." />
        <div class="form-text">
          <i class="fas fa-info-circle me-1"></i>
          Describe what needs to be done clearly and concisely
        </div>
        <?php if (isset($_SESSION['errors']['title'])): ?>
          <?= showMessage('title') ?>

        <?php endif; ?>
      </div>

      <div class="mb-4">
        <label for="taskPriority" class="form-label">
          <i class="fas fa-flag me-2"></i>Priority Level
        </label>
        <select class="form-control" name="priority" id="taskPriority">
          <option value="">Select priority level</option>
          <option value="high">High Priority</option>
          <option value="medium">Medium Priority</option>
          <option value="low">Low Priority</option>
        </select>
      </div>
      <?php if (isset($_SESSION['errors']['priority'])): ?>
        <?= showMessage('priority') ?>

      <?php endif; ?>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="index.html" class="btn btn-secondary me-md-2">
          <i class="fas fa-times me-2"></i>Cancel
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-plus me-2"></i>Add Task
        </button>
      </div>
    </form>
  </div>
</div>

<?php require_once "inc/footer.php"; ?>