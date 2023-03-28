<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] ."/mvc/Model/Connect/Database.php"; 
    $db = new Database(); 
    $conn = $db->getDatabase();
    $sql = "SELECT * FROM post JOIN cate ON post.post_id = cate.cate_id;";
    $result = $conn->query($sql); 
?>
//get table
<?php
<div class="row-content">
                <table border='1' class="table">
                    <tr class="tr">
                        <th>Post Id</th>
                        <th>Cate</th>
                        <th>Title</th>
                        <th>Satus</th>
                        <th>Url Key</th>
                        <th>Action</th>
                    </tr>
                    <?php   
                        while($row = $result->fetch_assoc())
                        {
                            echo "<tr>";   
                                echo "<td>" . $row['post_id'] . "</td>";  
                                echo "<td>" . $row['cate_name'] . "</td>"; 
                                echo "<td>" . $row['title'] . "</td>";   
                                echo "<td>" . $row['post_status'] . "</td>";
                                echo "<td>" . $row['url_key'] . "</td>";
                                echo "<td>" ."<a href='#'>". $row['post_action']."</a>"."</td>";
                            echo "</tr>";
                        }    
                        $conn->close();
                    ?>
                </table>
            </div>
?>
