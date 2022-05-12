<?php if (isset($_SESSION['error_text'])): ?>
  <div id="error_modal" class="alert alert-danger d-flex justify-content-between" role="alert">
    <span>
      <?php echo $_SESSION['error_text'] ?>
    </span>
    <button type="button" class="close" aria-label="Close" onclick="close_error()">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php unset($_SESSION['error_text']) ?>
<?php endif; ?>