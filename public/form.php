<?php
include_once('../includes/config.php');
include_once('../includes/blog.php');

if($_POST) {

  $title = $db->real_escape_string($_POST['title']);
  $content = $db->real_escape_string($_POST['content']);
  $author = $db->real_escape_string($_POST['author']);
  $timestamp = date('Y-m-d H:i:s');

  $blog = new Blog($db);

  $blog->add_post(array('title' => $title, 'content' => $content, 'author' => $author, 'created_at' => $timestamp));

  header('Location: /');
  exit;
}
?>
  <form id="signup" action="" method="POST"> 
    <ul id="section-tabs">
      <li class="current active"><span>1.</span> Details</li>
      <li><span>2.</span> Content</li>
      <li><span>3.</span> Done</li>
    </ul>
  <div id="fieldsets">
    <fieldset class="current">
      <label for="title">Title:</label>
      <input name="title" type="title" class="required" />
      <label for="author">Author:</label>
      <input name="author" type="author" class="required" />
    </fieldset>
    <fieldset class="next">
      <label for="content">Content:</label>
      <textarea name="content" class="required"></textarea>
    </fieldset>
    <fieldset class="next">
      Press submit to add this post :)
    </fieldset>

    <a class="btn" id="next">Next Section?</a>
    <input type="submit" class="btn">
  </div>
</form>
<?php
include_once('layout/footer.php');
?>