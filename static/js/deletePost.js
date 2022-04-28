async function deletePost(id) {
  await fetch(`/delete?${id}`);
}
