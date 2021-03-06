<?php

namespace ModuleBZ\YandexTurbo;

use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\Ad;
use ModuleBZ\YandexTurbo\Element\Audio;
use ModuleBZ\YandexTurbo\Element\Button;
use ModuleBZ\YandexTurbo\Element\CallbackForm;
use ModuleBZ\YandexTurbo\Element\Cards;
use ModuleBZ\YandexTurbo\Element\Carousel;
use ModuleBZ\YandexTurbo\Element\Comments;
use ModuleBZ\YandexTurbo\Element\Feed;
use ModuleBZ\YandexTurbo\Element\Feedback;
use ModuleBZ\YandexTurbo\Element\Fold;
use ModuleBZ\YandexTurbo\Element\Form;
use ModuleBZ\YandexTurbo\Element\Gallery;
use ModuleBZ\YandexTurbo\Element\Histogram;
use ModuleBZ\YandexTurbo\Element\Image;
use ModuleBZ\YandexTurbo\Element\InPage;
use ModuleBZ\YandexTurbo\Element\Rating;
use ModuleBZ\YandexTurbo\Element\Search;
use ModuleBZ\YandexTurbo\Element\Share;
use ModuleBZ\YandexTurbo\Element\Slider;
use ModuleBZ\YandexTurbo\Element\Video;

class Content {
    protected $content = [];

    /**
     * Функция добавление контента. Это полезно для добавления повторяющихся наборов блоков
     * @param Content $content
     * @return $this
     */
    function addContent(Content $content) { $this->content[] = $content; return $this; }
    /**
     * Добавление простого html в страницу
     * @link https://yandex.ru/dev/turbo/doc/rss/elements/typography-docpage/
     * @param string $html
     * @return $this
     */
    function addHtml(string $html = ''){ $this->content[] = $html; return $this; }

    /**
     * Добавление картинки, с заголовком или без
     * @param Image $image
     * @return $this
     */
    function addImage(Image $image){
        $this->content[] = $image;
        return $this;
    }

    /**
     * Добавление галереи
     * @param Gallery $gallery
     * @return $this
     */
    function addGallery(Gallery $gallery){
        $this->content[] = $gallery;
        return $this;
    }

    /**
     * Добавление слайдера в галерею
     * @param Slider $slider
     * @return $this
     */
    function addSlider(Slider $slider){
        $this->content[] = $slider;
        return $this;
    }


    /**
     * Добавление видео
     * @param Video $video
     * @return $this
     */
    function addVideo(Video $video){
        $this->content[] = $video;
        return $this;
    }

    /**
     * Добавление аккордиона
     * @param Accordion $accordion
     * @return $this
     */
    function addAccordion(Accordion $accordion){
        $this->content[] = $accordion;
        return $this;
    }

    /**
     * Добавляем аудио
     * @param Audio $audio
     * @return $this
     */
    function addAudio(Audio $audio){
        $this->content[] = $audio;
        return $this;
    }

    /**
     * Добавление списка карточек
     * @param Cards $cards
     * @return $this
     */
    function addCards(Cards $cards){
        $this->content[] = $cards;
        return $this;
    }

    /**
     * Добавление карусели
     * @param Carousel $carousel
     * @return $this
     */
    function addCarousel(Carousel $carousel){
        $this->content[] = $carousel;
        return $this;
    }

    /**
     * Добавление блок с текстом "читать подробнее"
     * @param Fold $fold
     * @return $this
     */
    function addFold(Fold $fold){
        $this->content[] = $fold;
        return $this;
    }

    /**
     * Добавление блока "Читайте также"
     * @param Feed $feed
     * @return $this
     */
    function addFeed(Feed $feed){
        $this->content[] = $feed;
        return $this;
    }

    /**
     * Добавляем рекламу яндекса
     * @param Ad $ad
     * @return $this
     */
    function addAd(Ad $ad){
        $this->content[] = $ad;
        return $this;
    }

    /**
     * Добавляем InPage рекламу
     * @param InPage $inPage
     * @return $this
     */
    function addInPage(InPage $inPage){
        $this->content[] = $inPage;
        return $this;
    }

    /**
     * Добавления поле ввода поиска
     * @param Search $search
     * @return $this
     */
    function addSearch(Search $search) {
        $this->content[] = $search;
        return $this;
    }

    /**
     * Добавление рейтинга
     * @param Rating $rating
     * @return $this
     */
    function addRating(Rating $rating){
        $this->content[] = $rating;
        return $this;
    }


    /**
     * Добавление кнопки
     * @param Button $button
     * @return $this
     */
    function addButton(Button $button){
        $this->content[] = $button;
        return $this;
    }

    /**
     * Функция добавления формы обратной связи
     * @param CallbackForm $callbackForm
     * @return $this
     */
    function addCallbackForm(CallbackForm $callbackForm){
        $this->content[] = $callbackForm;
        return $this;
    }

    /**
     * Добавление гистоагрмы
     * @param Histogram $histogram
     * @return $this
     */
    function addHistogram(Histogram $histogram){
        $this->content[] = $histogram;
        return $this;
    }

    /**
     * Добавление комментариев
     * @param Comments $comments
     * @return $this
     */
    function addComments(Comments $comments){
        $this->content[] = $comments;
        return $this;
    }

    /**
     * Добавление кнопок обратной связи
     * @param Feedback $feedback
     * @return $this
     */
    function addFeedback(Feedback $feedback){
        $this->content[] = $feedback;
        return $this;
    }

    /**
     * Добавление динамической формы
     * @param Form $form
     * @return $this
     */
    function addForm(Form $form){
        $this->content[] = $form;
        return $this;
    }

    /**
     * Добавлание блока "поделиться". По умолчанию все кнопки включены
     * @param Share $share
     * @return $this
     */
    function addShare(Share $share = null){
        $this->content[] = $share ? $share : new Share();
        return $this;
    }


    public function __toString() {
        return implode("",$this->content);
    }

}
