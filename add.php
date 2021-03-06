
<?php
$host = 'localhost'; // адрес сервера 
$database = 'rahim'; // имя базы данных
$user = 'mysql'; // имя пользователя
$password = 'mysql'; // пароль
$mysql = new mysqli($host,  $user, $password, $database);


$sqlCat = "SELECT id, name FROM category";
$result = $mysql->query($sqlCat);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel='stylesheet' href='css/main.css'>
</head>
<body>

<div class="container">

  <h1>Форма добавления товара</h1>

    <form enctype="multipart/form-data" method='POST'  action='check.php' class="form" >

      <div class="form-group">
        <input type="text" required name='name' placeholder='Имя'>
      </div>
      <div class="form-group">
        <input type="text" name='text' required placeholder='Описание'>
      </div>
      <div class="form-group">
        <textarea name='fulltext' placeholder='Полное описание'></textarea>
      </div>
      <div class="form-group">
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" />  Не загружается если присуствует эта строка. Массив files пустой-->
        <label for="">Изображения</label>
        <input type="file" name='userfile'>
      </div>

      <div class="form-group">

        <select name='category'>
        <?php while($row = $result->fetch_assoc()): ?>
            <option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
          <?php endwhile; ?>
        
        </select>

      </div>

      <div class="form-group">
          <input type="checkbox" checked name='status'> Опубликовать на сайте?
      </div>

      <div class="form-group">
        <button>
          <span>Добавить</span>
        </button>
      </div>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>