<p><?=$totaljokes?> Joke(s) have been submitted to the Database</p>

<?php foreach($jokes as $joke): ?>
  <blockquote>
    <p>
      <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8'); ?>
      (by <a href="mailto:
      <?=htmlspecialchars($joke['email'], ENT_QUOTES,'UTF-8'); ?> ">
      <?=htmlspecialchars($joke['name'], ENT_QUOTES,'UTF-8'); ?>
      </a>)
      on <?php
      $date = new DateTime($joke['jokedate']);
      echo $date->format('jS F Y');
       ?>

      <a href="index.php?action=edit&id=<?=$joke['id'];?>">Edit</a>
      <form class="" action="index.php?action=delete" method="post">
        <input type="hidden" name="id" value="<?=$joke['id'];?>">
        <input type="submit" name="" value="Delete">
      </form>
    </p>
  </blockquote>
<?php endforeach; ?>
