<?php
session_start();
require ('connect.php');

/*display values in screen function*/
/*to be deleted: Used in development*/
function dd($values)
{
echo "<pre>",print_r($values, true), "</pre";
    die();


}

/*execute queries function*/
function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt ->bind_param($types, ... $values);
    $stmt->execute();
    return $stmt;

}

/*select all function */

function selectAll($table, $conditions = [])
{
    global $conn;

    $sql = "SELECT * from $table";
    if(empty($conditions)){
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }else{
        //return records that match conditions provided...
        //$sql = "SELECT * from users where firstname = 'David' and admin = '1'";
        $i = 0;
        foreach ($conditions as $key => $value){
            if ($i === 0){
                $sql = $sql . " WHERE $key = ?";
            } else{
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }


}


/*select one function*/
function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * from $table";
    //return records that match conditions provided...
    //$sql = "SELECT * from users where firstname = 'David' and admin = '1'";
    $i = 0;
    foreach ($conditions as $key => $value){
        if ($i === 0){
            $sql = $sql . " WHERE $key = ?";
        } else{
            $sql = $sql . " AND $key = ?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;


}

/*create items function*/
function create($table, $data)
{
    global $conn;
    /*default methods of inserting queries
    $sql = 'INSERT INTO users(admin,first_name,second_name,national_id,phone_number,email,password) VALUES (? ,? ,? ,? ,? ,? ,? )';
    $sql = 'INSERT INTO users SET admin = ?,first_name=?,second_name=?,national_id=?,phone_number=?,email=?,password=?';

    //note the question marks are place holders where values are to be injected.


    */
    $sql = " INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value){
        if ($i === 0){
            $sql = $sql . " $key = ?";
        } else{
            $sql = $sql . ", $key = ?";
        }
        $i++;

    }

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;


}

/*update function*/
function update($table, $id, $data)
{
    global $conn;
    //$sql = "UPDATE users SET admin = ?,first_name=?,second_name=?,national_id=?,phone_number=?,email=?,password=? WHERE id=?"

    $sql = " UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value)
    {
        if ($i === 0){
            $sql = $sql . " $key=?";
        }else{
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;//adds key value to the data to be updated
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;



}

/*delete function*/
function delete($table, $id)
{
    global $conn;
    //$sql = "DELETE FROM users where id = ?";
    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = executeQuery($sql,['id' => $id]);
    return $stmt->affected_rows;
}

function getPostsAdmin()
{
    global $conn;
    //SELECT * FROM posts WHERE published = 1;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id ORDER BY id DESC ";
    $stmt = mysqli_query($conn,$sql);;
    $records = $stmt->fetch_all(MYSQLI_ASSOC);
    return $records;
}

//display total records
function totalNumber($table, $conditions = [])
{
        global $conn;

        $sql = "SELECT * from $table";
        if(empty($conditions)){
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $total = count($records);
            return $total;
        }else{
            //return records that match conditions provided...
            //$sql = "SELECT * from users where firstname = 'David' and admin = '1'";
            $i = 0;
            foreach ($conditions as $key => $value){
                if ($i === 0){
                    $sql = $sql . " WHERE $key = ?";
                } else{
                    $sql = $sql . " AND $key = ?";
                }
                $i++;
            }
            $stmt = executeQuery($sql, $conditions);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $total = count($records);
            return $total;
        }

}

//owl carousel
function owlSlider()
{
    global $conn;
    //SELECT * FROM posts WHERE published = 1;
    $sql = "SELECT p.*, t.name FROM posts AS p JOIN topics AS t ON p.topic_id=t.id WHERE p.published=? ORDER BY id DESC ";
    $sql = $sql . " lIMIT 15";
    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

//search post
function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    //SELECT * FROM posts WHERE published = 1;
    $sql = "SELECT p.*, t.name FROM posts AS p JOIN topics AS t ON p.topic_id=t.id WHERE p.published=? AND p.title LIKE ? OR p.body LIKE ? ";
    $sql = $sql . " ORDER BY id DESC";
    $stmt = executeQuery($sql, ['published' => 1, 'title' =>$match, 'body'=>$match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function similarPosts( $table, $s_id )
{
    global $conn;
    //SELECT * FROM posts WHERE published = 1;
    $sql = "SELECT * FROM $table WHERE published=1 AND topic_id=? ORDER BY id DESC ";
    $sql = $sql . " LIMIT 7";
    $stmt = executeQuery($sql, ['id' => $s_id ]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

/*get topic posts*/
/*user select function*/
function getPostsByTopicId($topic_id)
{
    global $conn;
    //SELECT * FROM posts WHERE published = 1 AND topic_id= $topic_id;
    $sql = "SELECT p.*, t.name FROM posts AS p JOIN topics AS t ON p.topic_id=t.id WHERE p.published=? AND topic_id=? ORDER BY id DESC";
    $stmt = executeQuery($sql, ['published' => 1 , 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPostsById($id)
{
    global $conn;
    //SELECT * FROM posts WHERE published = 1 AND topic_id= $topic_id;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE id=?";
    $stmt = executeQuery($sql, ['id' => $id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

//comments
function comments( $id )
{
    global $conn;
    //SELECT * FROM posts WHERE published = 1;
    $sql = "SELECT c.*, p.username,p.title FROM comments AS c JOIN posts AS p ON c.post_id=p.id WHERE c.user_id=? ORDER BY id DESC ";
/*    $sql = $sql . " lIMIT 15";*/
    $stmt = executeQuery($sql, ['user_id' => $id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


