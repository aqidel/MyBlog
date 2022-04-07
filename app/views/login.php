<form 
  id="login" 
  class="p-3 border border-3 rounded-3"
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
    aria-describedby="login-help-block"
    required>
  <div class="invalid-feedback">Wrong login!</div>
  <div id="login-help-block" class="form-text">Login: admin</div>
  <label class="form-label" for="password-input">
    Password:
  </label>
  <input 
    id="password-input"
    class="form-control" 
    type="password" 
    name="password"
    aria-describedby="password-help-block"
    required>
  <div class="invalid-feedback">Wrong password!</div>
  <div id="password-help-block" class="form-text">Password: admin</div>
  <input
    class="btn btn-primary" 
    type="submit" 
    value="Submit">
</form>