
<?php
    include "dbconnection.php";
    $action = $_GET['action'] ?? '';
    if ($action == 'add_post') {

        //Get raw JSON data
        $data = json_decode(file_get_contents("php://input"), true);

        // Extract values
        $userId = $data['userId'];
        $title = $data['title'];
        $content = $data['content'];

        //Pass to function
        $istrue = add_post($conn, $userId, $title, $content);
    }
    if ($action == 'get_posts') {
        $posts = getAllUserPost($conn, 1);
        while ($row = mysqli_fetch_assoc($posts)) {
           echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['content']}</td> 
                <td><button class='btn btn-primary editBtn' data-id='{$row['id']}' data-title='{$row['title']}'
                        data-content='{$row['content']}'>Edit</button></td>
                <td><button class='btn btn-danger deleteBtn' data-id='{$row['id']}'>Delete</button></td>
            </tr>";
        }
    }
    if ($action == 'get_dashposts') {
        $posts = getAllPost($conn);
        while ($row = mysqli_fetch_assoc($posts)) {
           echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td><button class='btn btn-danger deletePost' data-id='{$row['id']}'>Delete</button></td>
            </tr>";
        }
    }
    if($action == 'get_count') {
        $count = getCount($conn);
        echo $count;
        exit;
    }
    if($action == 'get_userCount') {
        $result = getAllUser($conn);
        $count = mysqli_num_rows($result);
        echo $count;
        exit;
    }
    if ($action == 'add_user') {

        //Get raw JSON data
        $data = json_decode(file_get_contents("php://input"), true);

        // Extract values
        $email = $data['email'];
        $name = $data['name'];

        //Pass to function
        $istrue = addUser($conn, $email, $name);
    }
    
    if ($action == 'get_users') {
        $users = getAllUser($conn);
        while ($row = mysqli_fetch_assoc($users)) {
           echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td> 
                <td><button class='btn btn-primary editUserBtn' data-id='{$row['id']}' data-name='{$row['name']}'
                        data-email='{$row['email']}'>Edit</button></td>
                <td><button class='btn btn-danger deleteUserBtn' data-id='{$row['id']}'>Delete</button></td>
            </tr>";
        }
    }
    if ($action == 'update_post') {

        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        $title = $data['title'];
        $content = $data['content'];

        $query = "UPDATE tbl_post 
                SET title='$title', content='$content' 
                WHERE id=$id";

        mysqli_query($conn, $query);
    }
    
    if ($action == 'update_user') {

        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];

        $query = "UPDATE tbl_user 
                SET name='$name', email='$email' 
                WHERE id=$id";

        mysqli_query($conn, $query);
    }
    
    if ($action == 'delete_post') {

        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        deletePost($conn, $id);
    }
    if ($action == 'delete_user') {

        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        deleteUser($conn, $id);
    }

?>