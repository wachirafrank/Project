<form class="" action="" method="post">
  <input type="hidden" name="joke[id]" value="<?=$joke['id'] ?? ''; ?>">
  <label for="joketext">Type Your Joke Here:</label>
  <textarea name="joke[joketext]" id="joketext" rows="8" cols="80"><?=$joke['joketext'] ?? '';?></textarea>
  <input type="submit" name="" value="Update">
</form>
