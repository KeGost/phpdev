<?php 

function find_all_workers() 
{
    global $db;

    $sql = "SELECT * FROM worker ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_worker_by_id($id) 
{
    global $db;

    $sql = "SELECT * FROM worker ";
    $sql .= "WHERE id=" . $id;
    $result = mysqli_query($db, $sql);
    $worker = mysqli_fetch_assoc($result);
    return $worker;
}

function delete_worker($id) 
{
    global $db;

    $sql = "DELETE FROM worker ";
    $sql .="WHERE id='" . $id . "' ";
    $sql .="LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function insert_worker($name, $age, $salary)
{
    global $db;

    $sql = "INSERT INTO worker ";
    $sql .="(name, age, salary)";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "', ";
    $sql .= "'" . $age . "', ";
    $sql .= "'" . $salary . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if ($result) {
        return true;
    }else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_worker($name, $age, $salary, $id)
{
    global $db;
    
    $sql = "UPDATE worker SET ";
    $sql .= "name='" . $name . "', ";
    $sql .= "age='" . $age . "', ";
    $sql .= "salary='" . $salary . "' ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    }else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}