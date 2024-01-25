<?php
session_start();
$_SESSION['activel'] = "6";
if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}
include 'includes/database.php';
include 'includes/action.php';
function showFeed($feedid){
    $sql = "select * from feedpurchase where feedpurchase_id = $feedid";
    $quer = setQuery($sql);
    $ret = "";
    if($cx = getData($quer)){
        $ret = $cx['feedname'];
    }
    return $ret;
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include "partials/_head.php";?>
<body id="body">
    <div class="container">
        <!-- top navbar -->
        <?php include "partials/_top_navbar.php";?>
        <main>
            <div class="main__container">
                <table>
                    <thead>
                        <th>Consumed On</th>
                        <th>Quantity Consumed</th>
                        <th>Feed</th>
               
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                    <?php
                        // calling viewMethod() method
                        $myrow = $feedConsumptionObject->viewMethod("FeedConsumption");
                        foreach($myrow as $row){
                            // breaking point
                            ?>
                            <tr>
                                <td><?php echo $row['ConsDate'];?></td>
                                <td><?php echo $row['Quantity'];?></td>
                                <td><?php echo showFeed($row['feed']);?></td>
                                
                                <td>
                                    <a class="edit_btn" href="feedConsumption.php?feedconsupdate=1&id=<?php echo $row["FeedConsumption_ID"]; ?>">Edit</a>
                                </td>
                                <td>
                                    <a class="del_btn" href="includes/action.php?feedconsdelete=1&id=<?php echo $row["FeedConsumption_ID"]; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
                
                <?php
                    if(isset($_GET["feedconsupdate"])){
                        // Get the Employee_ID for the employee record to be edited
                        $id = $_GET["id"] ?? null;
                        $where = array("FeedConsumption_ID" => $id);
                        // Call the selectEmployee method that displays the record to be edited
                        $row = $feedConsumptionObject->selectMethod("FeedConsumption", $where);
                        ?>
                            <form action="includes/action.php" method="post">
                                <div class="input-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </div>
                                <div class="input-group">
                                    <label for="">Date</label>
                                    <input type="date" name="ConsDate" value="<?php echo $row["ConsDate"]; ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Feed</label>
                                    <select name="feed">
                                        <?php
                                        $sql = "select * from feedpurchase";
                                        $quer = setQuery($sql);
                                        while($col = getData($quer)){
                                            ?>
                                            <option value="<?php echo $col['FeedPurchase_ID']; ?>"><?php echo $col['feedname']; ?></option>
                                            <?php
                                        }


                                         ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="">Quantity</label>
                                    <input type="number" step="any" name="Quantity" value="<?php echo $row["Quantity"]; ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Price</label>
                                    <input type="number" step="any" name="Price" style="display: none;" value="0" required>
                                </div>
                                
                                <div class="input-group">
                                    <button type="submit" name="feedconsedit" class="btn" value="">Update</button>
                                </div>
                            </form>
                        <?php
                    }else{
                        ?>
                            <form action="includes/action.php" method="post">
                                <div class="input-group">
                                    <label for="">Date</label>
                                    <input type="date" name="ConsDate" value="<?php echo mysqlDate(); ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Feed</label>
                                    <select name="feed">
                                        <?php
                                        $sql = "select * from feedpurchase";
                                        $quer = setQuery($sql);
                                        while($col = getData($quer)){
                                            ?>
                                            <option value="<?php echo $col['FeedPurchase_ID']; ?>"><?php echo $col['feedname']; ?></option>
                                            <?php
                                        }


                                         ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="">Quantity</label>
                                    <input type="number" step="any" name="Quantity" value="" required>
                                </div>
                                <div class="input-group" style="display: none;">
                                    <label for="">Price</label>
                                    <input type="number" step="any" name="Price" value="0" required>
                                </div>
                               
                                <div class="input-group">
                                    <button type="submit" name="feedconssave" class="btn">Save</button>
                                </div>
                            </form>
                        <?php
                    }
                        ?>
            </div>
        </main>
        <!-- sidebar nav -->
        <?php include "partials/_side_bar.php";?>
    </div>
    <script src="script.js"></script>
</body>
</html>