<div style="margin: 20px 10px 10px 10px;">
	<table class="table table-hover table-bordered">
		<thead class="thead-light">
			<tr>
				<th scope="col"><a href="/ILS/mvc2/index/index/users_name">Name</a>
				</th>
				<th scope="col"><a href="/ILS/mvc2/index/index/email">Email</a>
				</th>
				<th scope="col"><a href="/ILS/mvc2/index/index/roles_name">Role</a>
				</th>
  		</tr>
		</thead>
		<tbody>
			<?php
               $x=0;
               foreach ($tasks as $task) {
                    ?>
				<tr>
					<td>
							<?php echo $task['users_name']; ?>
					</td>
					<td>
						<?php echo $task['email']; ?>
					</td>
					<td>
						<?php echo $task['roles_name']; ?>
					</td>
	  		</tr>
				<?php
                }

              ?>
					<tbody>
	</table>
	<ul class='pagination'>
		<?php
$page = $_GET['page'];
if (empty($page)) {$page=1;}
  if ($page!=1){
	echo "<li class='page-item ".$active."'><a class='page-link' href=?page=1>First Page</a></li>";
  }
 for ($y=$page-2; $y<=$str_pag && $y<=$page+2 ; $y++){
	 if ($y>0){
	    if ($y==$page) {$active='active';} else {$active='';}
        echo "<li class='page-item ".$active."'><a class='page-link' href=?page=".$y.">".$y."</a></li>";
  }
}
    if ($page!=$str_pag){
	  echo "<li class='page-item ".$active."'><a class='page-link' href=?page=".$str_pag.">Last Page</a></li>";
    }
?>
	</ul>
</div>
