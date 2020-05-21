<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Comment {

    /** @var string $author автор */
    protected $author;
    /** @var string $avatar_url ссылка на аватарку */
    protected $avatar_url;
    /** @var string $subtitle подзаголовок  */
    protected $subtitle;
    /** @var string $header заголовок комментария */
    protected $header;
    /** @var string $content контент комментария */
    protected $content;
    /** @var Comments $comments массив подкомментариев */
    protected $comments;

    /**
     * Comment constructor.
     * @param string $author
     * @param string $avatar_url
     * @param string $subtitle
     * @param string $header
     * @param string $content
     * @param Comments|null $comments
     */
    public function __construct(string $author = '', string $avatar_url = '', string $subtitle = '', string $header = '', string $content = '',Comments $comments = null)
    {
        $this->author = $author;
        $this->avatar_url = $avatar_url;
        $this->subtitle = $subtitle;
        $this->header = $header;
        $this->content = $content;
        $this->comments = $comments;
    }

    /**
     * Установка автора комментария
     * @param string $author
     * @return Comment
     */
    public function setAuthor(string $author): Comment
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Установка ссылки на аватарку
     * @param string $avatar_url
     * @return Comment
     */
    public function setAvatarUrl(string $avatar_url): Comment
    {
        $this->avatar_url = $avatar_url;
        return $this;
    }

    /**
     * Установка подзаголовка
     * @param string $subtitle
     * @return Comment
     */
    public function setSubtitle(string $subtitle): Comment
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * Указание заголовка комментария
     * @param string $header
     * @return Comment
     */
    public function setHeader(string $header): Comment
    {
        $this->header = $header;
        return $this;
    }

    /**
     * Установка контента комментария
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Добавление подкомментариев
     * @param Comments $comments
     * @return Comment
     */
    public function setComments(Comments $comments): Comment
    {
        $this->comments = $comments;
        return $this;
    }




    public function __toString() {
        if($this->comments) $this->comments->setUrl('');
        return
        '<div data-block="comment"'
            .($this->author?' data-author="'.$this->author.'"':'')
            .($this->avatar_url?' data-avatar-url="'.$this->avatar_url.'"':'')
            .($this->subtitle?' data-subtitle="'.$this->subtitle.'"':'')
            .'>'
                .'<div data-block="content">'.($this->header?'<header>'.$this->header.'</header>':'').$this->content.'</div>'
                .($this->comments?$this->comments:'')
        .'</div>';
    }


}
