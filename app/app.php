<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/rectangle.php";

    $app = new Silex\Application();

    $app->get("/", function(){
        return "Home";
    });

    $app->get("/new_rectangle", function(){
      return "
      <!DOCTYPE html>
      <html>
      <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
        <title>Make a rectangle!</title>
      </head>
      <body>
        <div class='container'>
            <h1>Geometry Checker</h1>
            <p>Enter the dimensions of your rectangle to see if it's
            a square.</p>
            <form action='/view_rectangle'>
              <div class='form-group'>
                <label for='length'>Enter the length:</label>
                <input id='length' name='length' class='form-control' type='number'>
              </div>
            <div class='form-group'>
                <label for='width'>Enter the width:</label>
                <input id='width' name='width' class='form-control' type'number'>
            </div>
            <button type='submit' class='btn-success'>Create!!!</button>
            </form>
          </div>
      </body>
      </html>
      ";
    });

$app->get("/view_rectangle", function() {
    $my_rectangle = new Rectangle($_GET['length'], $_GET['width']);
    $area = $my_rectangle->getArea();
    if ($my_rectangle->isSquare()) {
        return "<h1>Congratulations! You made a square! Its area is $area.</h1>";
    } else {
        return "<h1>Sorry! This isn't a square. Its area is $area.</h1>";
    }
});
    return $app;
?>
