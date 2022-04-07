<form 
  id="login" 
  class="position-absolute top-50 start-50 translate-middle p-3 border border-3 rounded-3"
  method="post" 
  action="/admin/login">
  <label class="form-label" for="login-input">
    Login:
  </label>
  <input 
    id="login-input"
    class="form-control" 
    type="text" 
    name="login"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    title="Login: admin"
    required>
  <div class="invalid-feedback">Wrong login!</div>
  <label class="form-label" for="password-input">
    Password:
  </label>
  <input 
    id="password-input"
    class="form-control" 
    type="password" 
    name="password"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    title="Password: admin"
    required>
  <div class="invalid-feedback">Wrong password!</div>
  <input
    class="mt-3 btn btn-primary" 
    type="submit" 
    value="Submit">
</form>