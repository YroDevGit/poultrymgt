<?php
include '../../../includes/database.php';
$db6 = new Database();
$gg = $_GET['type'];

if($gg==1){


                      $seq = "select * from notes order by date desc limit 5";
                      $resx = mysqli_query($db6->connect(),$seq);
                      while($cox = mysqli_fetch_array($resx)){

                       ?>
                      
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <?php echo $cox[0]; ?>
                              
                            </label>
                          </div>
                        </td>
                        <td>
                          <p class="title"><?php echo $cox[1]; ?></p>
                          <p class="text-muted"><?php echo $cox[2]; ?></p>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" onclick="
var conf = confirm('Are you sure to delete ');
if(conf==true){
  deleteNotes(<?php echo $cox[0]; ?>);
}
else{

}
                          " data-original-title="Edit Task">
                            <i class="tim-icons icon-trash-simple"></i>
                          </button>
                        </td>
                      </tr>
                    <?php }

}
if($gg==2){
  $title = stripString($_GET['title']);
  $cont = stripString($_GET['cont']);
  $sql = "insert into notes values(null,'$title','$cont',now())";

  if(mysqli_query($db6->connect(),$sql)){
    echo "Note added ✔️";
  }
}

if($gg==3){
  $id = $_GET['note_id'];
  $sql = "delete from notes where nid= $id";
  if(mysqli_query($db6->connect(),$sql)){
    echo "Note deleted 🚮";
  }
}

                     ?>



