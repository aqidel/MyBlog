<div class="admin-wrap">
  <div id="control-block">
    <a class="control-link" href="/">
      <div class="admin-btn">Main page</div>
    </a>
    <a class="control-link" href="/admin">
      <div class="admin-btn">Create post</div>
    </a>
    <a class="control-link" href="/admin/logout">
      <div class="admin-btn">Logout</div>
    </a>
  </div>
  <div id="form-block">
    <form id="admin-form" action="/admin/add" method="post" enctype="multipart/form-data">
      <?php require 'app/views/error.php' ?>
      <div class="mb-2">
        <label class="form-label" for="header-input">Header:</label>
        <input 
          id="header-input" 
          class="form-control" 
          type="text" 
          name="header"
          minlength="2"
          maxlength="30" 
          required>
      </div>
      <div class="mb-2">
        <label class="form-label" for="text-input">Text:</label>
        <textarea 
          id="text-input" 
          class="form-control" 
          name="text" 
          minlength="2"
          maxlength="200"
          required>
        </textarea>
      </div>
      <div class="mb-2">
        <label class="form-label" for="file-input">Upload image:</label>
        <input 
          id="file-input" 
          class="form-control" 
          type="file" 
          name="uploadFile" 
          required>
      </div>
      <input class="btn btn-primary" type="submit" value="Submit">
    </form>
  </div>
</div>