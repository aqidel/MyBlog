<div class="admin-wrap">
  <div class="control-block">
    <a class="control-link" href="/admin">
      <div class="admin-btn">Create post</div>
    </a>
    <a class="control-link" href="/admin/posts">
      <div class="admin-btn">List of posts</div>
    </a>
    <a class="control-link" href="/admin/logout">
      <div class="admin-btn">Logout</div>
    </a>
  </div>
  <div class="form-block">
    <form id="admin-form" action="/admin/add" method="post">
      <div class="mb-2">
        <label class="form-label" for="header-input">
          Header:
        </label>
        <input
          id="header-input"
          class="form-control"
          type="text"
          name="header"
          required>
      </div>
      <div class="mb-2">
        <label class="form-label" for="text-input">
          Text:
        </label>
        <textarea id="text-input" class="form-control" name="text" required></textarea>
      </div>
      <div class="mb-2">
        <label class="form-label" for="file-input">
          Upload image:
        </label>
        <input
          id="file-input"
          class="form-control"
          type="file">
      </div>
      <input
        class="btn btn-primary" 
        type="submit"
        value="Submit">
    </form>
  </div>
</div>