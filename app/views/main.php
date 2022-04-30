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
  <?php foreach ($data as $row): ?>
    <article class="post">
      <h1 class="post-header">
        <?= $row['header'] ?>
      </h1>
      <p class="date">
        <?= $row['date'] ?>
      </p>
      <img class="post-img" src=<?= "../../static/img/" . $row['id'] . ".jpg" ?> alt="some cat's image"/>
      <p class="post-text">
        <?= $row['text'] ?>
      </p>
      <a href=<?= "/delete?post=" . $row['id'] ?>>
        <button class="btn btn-primary mb-2">Delete post</button>
      </a>
    </article>
  <?php endforeach;?>
</div>