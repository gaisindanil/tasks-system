
<div class="tasks-list">
<div class="container">
<div class="row">
<div class="tasks-title mt-4 mb-3">
<h2>Список задач</h2>
</div>

<div style="width:100%">
<table id="tasks-list" class="table table-striped" data-page-length="3">
  <thead>
    <tr>
      <th scope="col" data-orderable="false">#</th>
      <th scope="col">Имя пользователя</th>
      <th scope="col">Email</th>
      <th scope="col" data-orderable="false">Задача</th>
	  <th scope="col">Статус</th>
<? echo $logged_in ? '<th scope="col" data-orderable="false"></th>' : null ?> 
    </tr>
  </thead>

  <tbody>
  <?php foreach($data as $row):?>
    <tr>
      <th scope="row"><?=$row['id'];?></th>
      <td><?=$row['user_name'];?></td>
      <td><?=$row['email'];?></td>
      <td><?=$row['text'];?></td>
      <td><? if($row['status'] == '1'):?>
      <span class="badge badge-success">Выполнен <?php if($row['admin_update'] == '1'):?>| отредактировано администратором<?php endif;?></span>
      
      <?php else: ?><span class="badge badge-warning">Не выполнено</span><?php endif;?>	 </td>
      <? if($logged_in): ?>
      <td>
      <a class="text-warning" href="/update-task/<?=$row['id']?>.html" title="Редактировать задачу"><i class="far fa-edit"></i></a>
      <? echo $row['status'] === '0' ? '<a class="text-success" href="/task-completed/'.$row['id'].'.html" title="Отметить выполненным"><i class="fas fa-check-square"></i></a>' : null ?>
      </td>
      <?php endif;?>

    </tr>
  <?php endforeach;?>
  </tbody>
    

</table>
</div>


	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/af-2.3.5/b-1.6.2/fh-3.1.7/r-2.2.5/sc-2.0.2/sp-1.1.1/datatables.min.js"></script>


	<script>
$(document).ready(function () {
$('#tasks-list').DataTable({
	"language": {"url": "/public/Russian.json"},
	"bLengthChange" : false,
  "order": [[0,"desc"]],
  "searching": false
	
});
});
</script>
