<?

/**
 * Class that sends out emails
 *
 * @author abrasseu
 */
class Jedarchive_Mail extends Jedarchive_Base
{
    protected $_from;
    protected $_to;
    protected $_subject;
    protected $_view;
    protected $_viewParams;

    public function getFrom() {return $this->_from;}
    public function getTo() {return $this->_to;}
    public function getSubject() {return $this->_subject;}
    public function getView() {return $this->_view;}
    public function getViewParams() {return $this->_viewParams;}

    public function setFrom($from) {$this->_from = $from; return $this;}
    public function setTo($to) {$this->_to = $to; return $this;}
    public function setSubject($subject) {$this->_subject = $subject; return $this;}
    public function setView($view) {$this->_view = $view; return $this;}
    public function setViewParams($viewParams) {$this->_viewParams = $viewParams; return $this;}

    public function __construct($view)
    {
        $this->_view = $view;
        $this->_i18n = new Jedarchive_I18n();
        $this->_i18n->setSection('mail');
    }

    /**
     * 
     * @throws Exception
     */
    public function send()
    {
        $lang = $this->getI18n()->getCurrent();
        $file = APPLICATION_PATH . '/views/mails/' . $this->_view . '/' . $lang . '.php';

        if (!file_exists($file)) {
            $lang = $this->getI18n()->getDefault();
            $file = APPLICATION_PATH . '/views/mails/' . $this->_view . '/' . $lang . '.php';
        }
        if (!file_exists($file)) {
            throw new Exception('no mail view found '.$this->_view);
        }
        $this->getI18n()->setCurrent($lang);

        $view = new Jedarchive_View($file);
        $view->setVariables($this->getViewParams());

        $headers = "From: " . $this->_from . "\r\n";

        mail($this->_to, $this->getI18n()->getTranslation($this->_subject), $view->render(), $headers);
    }
}