<?php

namespace ModuleBZ\YandexTurbo;

class Item {
    /** @var bool Является ли данная страница turbo */
    protected $is_turbo = true;
    /** @var string URL страницы сайта, для которой нужно сформировать Турбо‑страницу. */
    protected $link = '';
    /** @var string URL страницы-источника, который можно передать в Яндекс.Метрику. */
    protected $turbo_source = '';
    /** @var string Заголовок страницы, который можно передать в Яндекс.Метрику. */
    protected $turbo_topic = '';
    /** @var string Время публикации в формате RFC-822. */
    protected $pub_date;
    /** @var string  Автор статьи, размещенной на странице. */
    protected $author = '';
    /** @var bool  */
    protected $is_related_infinity = false;
    /** @var array Вы можете разместить ссылки на другие ресурсы или настроить отображение бесконечной ленты статей.  */
    protected $related = [];
    /** @var array Дополнительная информация о странице. Используется для связывания контентной информации на основной и Турбо‑странице сайта. */
    protected $metrics_breadcrumbs = [];
    /**
     * @link https://yandex.ru/support/metrica/publishers/schema-org/microdata.html#microdata__identifier-desc
     * @var string  schema_identifier — идентификатор, который указан на основной странице.
     */
    protected $metric_yandex_schema_identifier = '';
    /** @var string конетнт статьи */
    protected $content;
    /** @var string Заголовок h1 */
    protected $header_h1;
    /** @var string Заголовок h2 */
    protected $header_h2;
    /** @var string картинка для заголовка*/
    protected $header_img;
    /** @var array меню для заголовка*/
    protected $header_menu = [];

    /**
     * @param string $h1
     * @return $this
     */
    public function setHeaderH1(string $h1){$this->header_h1 = $h1; return $this;}

    /**
     * @param string $h2
     * @return $this
     */
    public function setHeaderH2(string $h2){$this->header_h2 = $h2; return $this;}

    /**
     * @param string $img
     * @return $this
     */
    public function setHeaderImg(string $img){$this->header_img = $img; return $this;}

    /**
     * @param string $url
     * @param string $name
     * @return $this
     */
    public function addHeaderMenu(string $url,string $name){$this->header_menu[] = [$url,$name]; return $this;}

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content){$this->content = $content; return $this;}

    /**
     * @param string $id
     * @return $this
     */
    public function addMetricsYandexSchemaIdentifier($id){ $this->metric_yandex_schema_identifier = $id; return $this; }

    /**
     * @param string $url
     * @param string $name
     * @return $this
     */
    public function addMetricsBreadcrumb($url,$name){ $this->metrics_breadcrumbs[] = [$url,$name]; return $this; }

    /**
     * @param bool $is_turbo
     * @return $this
     */
    public function setIsTurbo($is_turbo) {$this->is_turbo = $is_turbo; return $this;}

    /**
     * @param $is_related_infinity
     * @return $this
     */
    public function setRelatedInfinity($is_related_infinity) {$this->is_related_infinity = $is_related_infinity; return $this;}

    /**
     * @param string $link
     * @return $this
     */
    public function setLink($link){$this->link = $link; return $this;}

    /**
     * @param string $url
     * @param string $name
     * @param string $img
     * @return $this
     */
    public function addRelated($url,$name,$img=''){ $this->related[] = [$url,$name,$img]; return $this; }

    /**
     * @param string $source
     * @return $this
     */
    public function setTurboSource($source) {$this->turbo_source = $source; return $this;}

    /**
     * @param string $topic
     * @return $this
     */
    public function setTurboTopic($topic) {$this->turbo_topic = $topic; return $this;}

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor($author) {$this->author = $author; return $this;}

    /**
     * @param int $time
     * @return $this
     */
    public function setPubDate(int $time) { $this->pub_date = $time; return $this; }

    /**
     * @return string
     */
    private function metricsToString(){
        $res = '';
        if($this->metric_yandex_schema_identifier){
            $res = '<metrics>'
                .'<yandex schema_identifier="'.$this->metric_yandex_schema_identifier.'">'
                    .'<breadcrumblist>'
                        .implode('',array_map(function($v){return '<breadcrumb url="'.$v[0].'" text="'.$v[1].'"/>';},$this->metrics_breadcrumbs))
                    .'</breadcrumblist>'
                .'</yandex>'
            .'</metrics>';
        }
        return $res;
    }

    /**
     * @return string
     */
    private function relatedToString(){
        $res = '';
        if($this->related){
            $res = '<yandex:related'.($this->is_related_infinity?' type="infinity"':'').'>';
            foreach ($this->related as $v){
                $res .= '<link'.($v[0]?' url="'.$v[0].'"':'').($v[2]?' img="'.$v[2].'"':'').'>'.$v[1].'</link>';
            }
            $res .= '</yandex:related>';
        }
        return $res;
    }

    /**
     * @return string
     */
    private function headerToString(){
        return '<header>'
                    .(($c = $this->header_h1)?'<h1>'.$c.'</h1>':'')
                    .(($c = $this->header_h2)?'<h2>'.$c.'</h2>':'')
                    .(($c = $this->header_img)?'<figure><img src="'.$c.'"></figure>':'')
                    .(($c = $this->header_menu)?'<menu>'.implode(array_map(function($v){return '<a href="'.$v[0].'">'.$v[1].'</a>';},$this->header_menu)).'</menu>':'')
                .'</header>';
    }

    public function __toString() {
        return '<item'.($this->is_turbo?' turbo="true"':'').'>'
            .(($c = $this->author)?'<author>'.$c.'</author>':'')
            .(($c = $this->turbo_source)?'<turbo:source>'.$c.'</turbo:source>':'')
            .(($c = $this->turbo_topic)?'<turbo:topic>'.$c.'</turbo:topic>':'')
            .(($c = $this->link)?'<link>'.$c.'</link>':'')
            .(($c = $this->pub_date)?'<pubDate>'.date(DATE_RFC822,$c).'</pubDate>':'')
            .$this->relatedToString()
            .$this->metricsToString()
            .'<turbo:content><![CDATA['.$this->headerToString().$this->content.']]></turbo:content></item>';
    }

}
