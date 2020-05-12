<?php
include_once "PDO.php";

function GetOneCommentFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment WHERE id = " . $id);
  return $response->fetch();
}

function GetAllComments()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM comment ORDER BY created_at ASC");
  return $response->fetchAll();
}

function GetAllCommentsFromUserId($userId)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT comment.*, user.nickname "
      . "FROM comment LEFT JOIN user on (comment.user_id = user.id) "
      . "WHERE comment.user_id = $userId "
      . "ORDER BY comment.created_at ASC"
  );
  return $response->fetchAll();
}

function GetAllCommentsFromPostId($idPost)
{
  global $PDO;
  $response = $PDO->query(
    "SELECT comment.*, user.nickname from comment "
      . " INNER JOIN user on user.id = comment.user_id"
      . " WHERE comment.post_id = $idPost"

  );
  return $response->fetchAll();
};

function GetSearches()
{
  global $PDO;
  $response = $PDO->query(
    'SELECT post.* from post where post.content LIKE "" '
  );
};
