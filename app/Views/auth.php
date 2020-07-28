<div class="tasks-create">
<div class="container">
<div class="row">
<div class="col-12">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Авторизация</li>
  </ol>
</nav>

<?= \Config\Services::validation()->listErrors(); ?>
<? if(isset($errorMessage)):?>
<div class="alert alert-danger" role="alert">
<?=$errorMessage;?>
</div>
<?php endif;?>


<form method="POST">

<div class="form-group">
    <label for="InputLogin">Логин</label>
    <input type="text" class="form-control"  name="login" id="InputLogin" required>
  </div>

  <div class="form-group">
    <label for="InputPassword">Пароль</label>
    <input type="password" class="form-control"  name="password" id="InputPassword" required>
  </div>
 
 
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>


</div>
</div>
</div>
</div>