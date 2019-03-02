<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/jokes.css">
    <title><?=$title;?></title>
  </head>

  <body>
    <header>
      <h1>Internet Jokes DB</h1>
    </header>
    <nav>
      <ul>

        <li><a href="/">Home</a></li>
        <li><a href="/joke/list">List</a></li>
        <li><a href="/joke/edit">Add a new  Joke</a></li>
      </ul>
    </nav>
<main>
  <?=$output?>
</main>

<footer>
  &copy; IJDB 2019
</footer>
  </body>
</html>
