<?php
class upload {
    public function add_Post()
    {
        $conn = $this->getDatabase();

        //$post_id = $_REQUEST['post_id'];
        $title = $_REQUEST['title'];
        $post_status = $_REQUEST['post_status'];

        //image
        $img_name = $_FILES['post_image']['name'];
        $img_size = $_FILES['post_image']['size'];
        $tmp_name = $_FILES['post_image']['tmp_name'];
        $error = $_FILES['post_image']['error'];

        $content = $_REQUEST['content'];
        $url_key = $_REQUEST['url_key'];
        $related_post = $_REQUEST['related_post'];
        $sort_order = $_REQUEST['sort_order'];
        $create_at = $_REQUEST['create_at'];
        $update_at = $_REQUEST['update_at'];
        $post_action = $_REQUEST['post_action'];

        if ($error === 0) {
            if ($img_size > 999999) {
                $em = "Sorry, your file is too large.";
                header("Location: index.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid(true) . '.' . $img_ex_lc;
                    $img_upload_path = 'mvc/assets/image/post/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    $sql = "INSERT INTO post (title, post_status, post_image, content, url_key, related_post, sort_order, create_at, update_at, post_action) VALUES ('$title', '$post_status', '$new_img_name', '$content', '$url_key', '$related_post', '$sort_order', '$create_at', '$update_at', '$post_action')";
                    $result = mysqli_query($conn, $sql,);

                    if ($result) {
                        echo "<script type='text/javascript'>alert('insert data successfully');</script>";
                    } else {
                        echo "ERROR: Hush! Sorry $sql. " . $conn->error;
                    }

                } else {
                    $em = "You can't upload files of this type";
                    header("Location: index.php?error=$em");
                }
            }
        } else {
            $em = "unknown error occurred!";
            header("Location: index.php?error=$em");
        }
        $conn->close();
    }
}
 
?>
