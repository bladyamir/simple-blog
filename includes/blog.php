<?php

class Blog {

	public $database;

	public function __construct($db)
	{
		$this->database = $db;
	}

	public function get_posts()
	{
		$posts = $this->database->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
		$posts_array = array();
		if($posts->num_rows > 0) {
			while($post = $posts->fetch_object()) {
				$posts_array[] = $post;
			}
		}
		return $posts_array;
	}

	public function add_post($data)
	{
		$this->database->query("INSERT INTO blog_posts (title, content, author, created_at) VALUES ('{$data['title']}', '{$data['content']}', '{$data['author']}', '{$data['created_at']}')");
	}
}
?>