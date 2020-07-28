<div class="tasks-create">
<div class="container">
<div class="row">
<div class="col-12">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Редактирование задачи #<?=$data['id'];?></li>
  </ol>
</nav>

<?= \Config\Services::validation()->listErrors(); ?>

<form method="POST">
<div class="form-group">
    <label for="selectStatus">Статус</label>
    <select class="form-control" name="status" id="selectStatus">
    <option value="1">Выполнено</option>
    <option value="0"<? if($data['status'] == '0'):?>selected<?php endif;?>>Ожидает выполнения</option>
    </select>
  </div>

<div class="form-group">
    <label for="InputName">Имя пользователя</label>
    <input type="text" class="form-control"  name="name" id="InputName" disabled value="<?=$data['user_name'];?>">
  </div>
  <div class="form-group">
    <label for="InputEmail">Email адрес</label>
    <input type="email" class="form-control" name="email" id="InputEmail" aria-describedby="emailHelp" disabled value="<?=$data['email'];?>">
    <small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
  </div>

  <div class="form-group">
    <label for="InputTask">Задача</label>
    <textarea class="form-control" name="text" id="InputTask" rows="4" required><?=$data['text'];?></textarea> 
   </div>
 
 
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>


</div>
</div>
</div>
</div>