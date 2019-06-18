<?php

namespace poo;
require 'DbConnect.php';
require 'Article.php';

ini_set('display_errors', 'on');
error_reporting(E_ALL);


class ArticleManager
{
    protected $_db;

    public function __construct()
    {
        $db = new DbConnect();
        $this->_db = $db->getDb();
    }

    public function getArticles() {
        $stm = $this->_db->query('SELECT * FROM article');
        return $stm->fetchAll();
    }

    function addArticle(Article $article) {

        $stm = $this->_db->prepare('INSERT INTO article(titre, auteur, message) 
                    VALUES (:titre, :auteur, :message)');

        $titre = $article->getTitre();
        $auteur = $article->getAuteur();
        $message = $article->getMessage();

        $stm->bindParam(':titre', $titre);
        $stm->bindParam(':auteur', $auteur);
        $stm->bindParam(':message', $message);

        $stm->execute();

    }

    function updateArticle(Article $article) {

        $sql = 'UPDATE article SET titre=:titre, auteur=:auteur, message=:message WHERE id=:id';
        $stm = $this->_db->prepare($sql);

        $titre = $article->getTitre();
        $auteur = $article->getAuteur();
        $message = $article->getMessage();
        $id = $article->getId();

        $stm->bindParam(':titre', $titre);
        $stm->bindParam(':auteur', $auteur);
        $stm->bindParam(':message', $message);
        $stm->bindParam(':id', $id);
        $stm->execute();

    }

    function getArticle($id) {
        $stm = $this->_db->prepare('SELECT * FROM article WHERE id=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch();
    }

    function deleteArticle($id) {
        $stm = $this->_db->prepare('DELETE FROM article WHERE id =:id');
        $stm->bindParam(':id', $id);
        $stm->execute();
    }
}
