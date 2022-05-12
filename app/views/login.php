<form 
  id="login" 
  class="position-absolute top-50 start-50 translate-middle p-3 border border-3 rounded-3"
  method="post" 
  action="/admin/login">
  <label class="form-label" for="login-input">Login:</label>
  <input 
    id="login-input"
    class="form-control" 
    type="text" 
    name="login"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    title="Login: admin"
    required>
  <label class="form-label" for="password-input">Password:</label>
  <input 
    id="password-input"
    class="form-control mb-2" 
    type="password" 
    name="password"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    title="Password: admin"
    required>
  <div>
    <?php require 'app/views/error.php' ?>
  </div>
  <div class="d-flex mt-3">
    <input class="btn btn-primary" type="submit" value="Submit">
    <a href="/">
      <input class="btn btn-secondary ms-2" type="button" value="Main page">
    </a>
  </div>
</form>