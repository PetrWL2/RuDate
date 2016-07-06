<?
class RuDate
{
    /**
     * Месяц в родительном падеже
     * @var array
     */
    protected $arGenitiveMonths = array(
        '01' => 'января',
        '02' => 'февраля',
        '03' => 'марта',
        '04' => 'апреля',
        '05' => 'мая',
        '06' => 'июня',
        '07' => 'июля',
        '08' => 'августа',
        '09' => 'сентября',
        '10' => 'октября',
        '11' => 'ноября',
        '12' => 'декабря',
    );

    protected $sToday = 'Сегодня';

    protected $sYesterday = 'Вчера';

    protected $obDate = null;

    protected $iDiffTimestamp = null;

    public static function create($sDate)
    {
        return new RuDate($sDate);
    }

    public function __construct($sDate)
    {
        $this->obDate = new DateTime($sDate);
        $this->setDiff();

    }

    public function format($sFormat = 'text')
    {
       if ($sFormat == 'text') {

           $sDate = $this->getTextFormat();

       } else {

           $sDate = $this->obDate->format($sFormat);

       }

       return  $sDate;

    }

    /**
     * Возвращает дату в текстовом формате
     * Примеры:
     * Сегодня в 12:33
     * Вчера в 12:44
     * 21 июня в 15:05
     */
    private function getTextFormat()
    {
        if ($this->isToday()) {

            $sDate = $this->obDate->format( $this->sToday . ' в H:i');

        } else if ($this->isYesterday()) {

            $sDate = $this->obDate->format( $this->sYesterday . ' в H:i');

        } else {

            $sDate = $this->obDate->format('d ' . $this->getGenitiveMonth() . ' в H:i');

        }

        return $sDate;
    }

    private function setDiff()
    {
        $this->iDiffTimestamp = (time() - $this->obDate->getTimestamp());
    }

    private function isToday()
    {
        if ($this->iDiffTimestamp < 24*60*60) {
            return true;
        } else {
            return false;
        }
    }

    private function isYesterday()
    {
        if ($this->iDiffTimestamp > 24*60*60 && $this->iDiffTimestamp < 2*24*60*60) {
            return true;
        } else {
            return false;
        }
    }

    private function getGenitiveMonth()
    {
        $sMonth = $this->arGenitiveMonths[ $this->obDate->format('m') ];
        return $sMonth;
    }

}
