<div class="main-wrap">
  <div class="header">
    <h1>My Blog</h1>
    <div class="flex-wrap">
      <div class="avatar"></div>
      <div class="flex-inner-wrap">
        <p>Light blog app by Ed Nuriev.</p>
        <p>Go to <a href="/admin">admin</a> to create or delete posts.</p>
      </div>
    </div>
  </div>
  <!-- Posts feed's part -->
  <?php foreach ($pagination['posts'] as $post): ?>
    <article class="post">
      <h1 class="post-header">
        <?= $post['header'] ?>
      </h1>
      <p class="date">
        <?= $post['date'] ?>
      </p>
      <img class="post-img" src=<?= "../../static/img/" . $post['id'] . ".jpg" ?> alt="some cat's image"/>
      <p class="post-text">
        <?= $post['text'] ?>
      </p>
      <a href=<?= "/delete?post=" . $post['id'] ?>>
        <button class="btn btn-primary mb-2">Delete post</button>
      </a>
    </article>
  <?php endforeach; ?>
  <!-- Pagination part -->
  <ul class="pagination mt-3">
    <li class="<?= $pagination['current_page'] - 1 == 0 ? "page-item disabled" : "page-item" ?>">
      <a class="page-link" 
         href= <?= "/?page=" . $pagination['current_page'] - 1 ?> >
         Previous
      </a>
    </li>
    <?php for ($i = 1; $i <= $pagination['pages']; $i++): ?>
      <li class="<?= $pagination['current_page'] == $i ? "page-item active" : "page-item" ?>">
        <a class="page-link" href= <?= "/?page=" . $i ?> >
          <?= $i ?>
        </a>
      </li>
    <?php endfor; ?>
    <li class="<?= $pagination['current_page'] == $pagination['pages'] ? "page-item disabled" : "page-item" ?>">
      <a class="page-link" 
         href= <?= "/?page=" . $pagination['current_page'] + 1 ?> >
         Next
      </a>
    </li>
  </ul>
</div>