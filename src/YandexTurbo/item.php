<?

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
    /** @var string   */
    protected $metric_yandex_schema_identifier = '';

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


    protected function metricsToString(){
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
    protected function relatedToString(){
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
    protected function headerToString(){
        return '<header>
                        <h1>Ресторан «Полезный завтрак»</h1>
                        <h2>Вкусно и полезно</h2>
                        <figure>
                            <img src="https://avatars.mds.yandex.net/get-sbs-sd/403988/e6f459c3-8ada-44bf-a6c9-dbceb60f3757/orig">
                        </figure>
                        <menu>
                            <a href="http://example.com/page1.html">Пункт меню 1</a>
                            <a href="http://example.com/page2.html">Пункт меню 2</a>
                        </menu>
                    </header>';
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
            .'<turbo:content><![CDATA['.$this->headerToString().'
                    <p>Как хорошо начать день? Вкусно и полезно позавтракать!</p>
                    <p>Приходите к нам на завтрак. Фотографии наших блюд ищите <a href="#">на нашем сайте</a>.</p>
                    <h2>Меню</h2>
                    <figure>
                        <img src="https://avatars.mds.yandex.net/get-sbs-sd/369181/49e3683c-ef58-4067-91f9-786222aa0e65/orig">
                        <figcaption>Омлет с травами</figcaption>
                    </figure> 
                    <p>В нашем меню всегда есть свежие, вкусные и полезные блюда.</p>
                    <p>Убедитесь в этом сами.</p>
                    <button formaction="tel:+7(123)456-78-90" data-background-color="#5B97B0" data-color="white" data-primary="true">Заказать столик</button>
                    <div data-block="widget-feedback" data-stick="false">
                        <div data-block="chat" data-type="whatsapp" data-url="https://whatsapp.com"></div>
                        <div data-block="chat" data-type="telegram" data-url="http://telegram.com/"></div>
                        <div data-block="chat" data-type="vkontakte" data-url="https://vk.com/"></div>
                        <div data-block="chat" data-type="facebook" data-url="https://facebook.com"></div>
                        <div data-block="chat" data-type="viber" data-url="https://viber.com"></div>
                    </div>
                    <p>Наш адрес: <a href="#">Nullam dolor massa, porta a nulla in, ultricies vehicula arcu.</a></p>
                    <p>Фотографии — http://unsplash.com</p>
                ]]></turbo:content></item>';
    }

}
