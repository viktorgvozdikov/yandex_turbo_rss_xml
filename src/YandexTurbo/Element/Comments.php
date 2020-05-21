<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Comments {

    /** @var string $url ссылка на добавление комментариев */
    protected $url;
    /** @var Comment[] $comments массив комментариев  */
    protected $comments = [];

    /**
     * Comments constructor.
     * @param string $url
     */
    public function __construct(string $url = '') {
        $this->url = $url;
    }

    /**
     * Установка ссылки на добавление комментариев
     * @param string $url
     * @return Comments
     */
    public function setUrl(string $url): Comments
    {
        $this->url = $url;
        return $this;
    }



    /**
     * Добавление комментария
     * @param Comment $comment
     * @return $this
     */
    function addComment(Comment $comment){
        $this->comments[] = $comment;
        return $this;
    }

    public function __toString() {
        return '<div data-block="comments" '.($this->url?'data-url="'.$this->url.'"':'').'>'.implode("",$this->comments).'</div>';
    }
}
