<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Video {
    /** @var int $width ширина видео */
    protected $width;
    /** @var int $height высота видео */
    protected $height;
    /** @var string $src путь к файлу видео */
    protected $src;
    /** @var int $duration отображаемая длительность видео  */
    protected $duration;
    /** @var string $title заголовок видеоблока */
    protected $title;
    /** @var string $image путь к картинке */
    protected $image;
    /** @var string $header установка заголовка к видео */
    protected $header;

    /**
     * Video constructor.
     * @param int $width
     * @param int $height
     * @param string $src
     * @param int $duration
     * @param string|null $image
     * @param null $header
     * @param null $title
     */
    public function __construct(int $width=null,int $height=null,string $src=null, int $duration=null,string $image=null,$header=null,$title=null) {
        $this->width = $width;
        $this->height = $height;
        $this->src = $src;
        $this->duration = $duration;
        $this->image = $image;
        $this->header = $header;
        $this->title = $title;
    }

    /**
     * Установка ширина видео
     * @param int $width
     * @return Video
     */
    public function setWidth(int $width): Video
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Установка высоты видео
     * @param int $height
     * @return Video
     */
    public function setHeight(int $height): Video
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Указаение url к источнику видео
     * @param string $src
     * @return Video
     */
    public function setSrc(string $src): Video
    {
        $this->src = $src;
        return $this;
    }

    /**
     * Указание отображаемой длительность видео
     * @param int $duration
     * @return Video
     */
    public function setDuration(int $duration): Video
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * указание заголовока видеоблока
     * @param string $title
     * @return Video
     */
    public function setTitle(string $title): Video
    {
        $this->title = $title;
        return $this;
    }

    /**
     * URL к превью видео
     * @param string $image
     * @return Video
     */
    public function setImage(string $image): Video
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Указание заголовка виедо
     * @param string $header
     * @return Video
     */
    public function setHeader(string $header): Video
    {
        $this->header = $header;
        return $this;
    }

    protected function getVideoWithoutWrap(){
        return '<video width="'.$this->width.'" height="'.$this->height.'"><source src="'.$this->src.'" type="video/mp4" data-duration="'.$this->duration.'" '.($this->title?'data-title="'.$this->title.'"':'').'/></video>'
        .($this->image?'<img src="'.$this->image.'"/>':'')
        .($this->header?'<figcaption>'.$this->header.'</figcaption>':'');
    }

    public function __toString() {
        return '<figure>'.$this->getVideoWithoutWrap().'</figure>';
    }


}
