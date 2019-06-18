<?php


namespace poo;
require 'DbConnect.php';
require 'Article.php';


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

        $stm->bindParam(':titre', $article->getTitre());
        $stm->bindParam(':auteur', $article->getAuteur());
        $stm->bindParam(':message', $article->getMessage());

        $stm->execute();

    }

    function updateArticle($dbh, $article) {

        $titre = isset($article['titre']) ? $article['titre'] : 'titre vide';
        $auteur = isset($article['auteur']) ? $article['auteur'] : 'auteur inconnu';
        $message = isset($article['message']) ? $article['message'] : 'message vide';
        $id = isset($article['id']) ? $article['id'] : 0;

        $stm = $dbh->prepare('UPDATE article SET titre=?, auteur=?, message=? WHERE id=?');
        $stm->execute(array(
            $titre,
            $auteur,
            $message,
            $id
        ));

    }

    function deleteArticle($dbh, $id) {
        $stm = $dbh->prepare('DELETE FROM article WHERE id = ?');
        $stm->execute(array($id));
    }

}

$am = new ArticleManager();

$article = new Article([
    'titre' => 'premier titre',
    'auteur' => 'Un auteur',
    'message' => 'Un message pas comme les autres'
]);

$am->addArticle($article);