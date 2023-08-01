<?php
class ShortLink extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{url}}';
    }

    public function insertLink($url)
    {
        Yii::app()->db->createCommand()->insert('{{url}}', array('Url' => $url, 'Md5Url' => md5($url)));
        return Yii::app()->db->getLastInsertId();
    }

    public static function alreadyExists($url)
    {
        return Yii::app()->db->createCommand()
            ->select("*")
            ->from("{{url}}")
            ->where("Md5Url=:Md5Url", array(
                "Md5Url" => md5($url),
            ))
            ->queryRow();
    }

    public static function increaseStat()
    {
        $ip = Yii::app()->request->userHostAddress;
        $day = date("Y-m-d");
        $sql = "INSERT INTO {{request_count}}
					SET 
						ip=:ip,
						day=:day,
						total=1
				ON DUPLICATE KEY UPDATE
						total=total+1";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ip", $ip, PDO::PARAM_STR);
        $command->bindParam(":day", $day, PDO::PARAM_STR);
        return $command->execute();
    }

    public static function updateLinkByID($id, $short)
    {
        return Yii::app()->db->createCommand()->update('{{url}}', array(
            "UrlShort" => $short
        ), "UrlID=:id", array("id" => $id));
    }

    public function getToday($count = true)
    {
        $today = date("Y-m-d");
        $start = $today . " 00:00:00";
        $finish = $today . " 23:59:59";
        $criteria = new CDbCriteria();
        $criteria->addBetweenCondition("Added", $start, $finish);
        return $count ? self::model()->count($criteria) : self::model()->findAll($criteria);
    }

    public function rules()
    {
        return array(
            array('Hits, UrlID, UrlShort, Added, Hits, Url', 'safe', 'on' => 'search'),
            array('Hits, Url', 'required', 'on' => 'update'),
            array('Hits', 'numerical', 'integerOnly' => true),
        );
    }

    public function beforeSave()
    {
        if (!parent::beforeSave()) {
            return false;
        }
        $this->Md5Url = md5($this->Url);
        return true;
    }

    public function attributeLabels()
    {
        return array(
            'Hits' => 'Total Hits count',
            'UrlShort' => 'Short URL',
            'Url' => 'Long URL',
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('UrlID', $this->UrlID);
        $criteria->compare('UrlShort', $this->UrlShort);
        $criteria->compare('Url', $this->Url, true);
        $criteria->compare('Hits', $this->Hits);
        $criteria->compare('Added', $this->Added);

        if (!Yii::app()->request->isAjaxRequest) {
            $criteria->order = 'Added DESC';
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('attributes' => array('UrlID', 'UrlShort', 'Hits', 'Added')),
        ));
    }

    public static function totalHits()
    {
        return Yii::app()->db->createCommand()->
        select('sum(Hits) as s')->
        from('{{url}}')->
        queryScalar();
    }

    public static function getRecent($limit)
    {
        return Yii::app()->db->createCommand()->
        select('*')->
        from('{{url}}')->
        order('Added DESC')->
        limit($limit)->
        queryAll();
    }

    public static function getTop($limit)
    {
        return Yii::app()->db->createCommand()->
        select('*')->
        from('{{url}}')->
        order('Hits DESC')->
        limit($limit)->
        queryAll();
    }

    public static function saveLongUrl($url)
    {
        $model = self::alreadyExists($url);
        if (!$model) {
            $id = self::model()->insertLink($url);
            $shortLink = CShortlink::shortByID($id);
            self::updateLinkByID($id, $shortLink);
            return Shortlink::model()->findByPk($id);
        } else {
            return $model;
        }
    }

    public static function getByShort($short)
    {
        $id = CShortlink::getID($short);
        return Shortlink::model()->findByPk($id);
    }

    public static function insertNewLink($url)
    {
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $model = self::saveLongUrl($url);
            self::increaseStat();
            $transaction->commit();
            return $model;
        } catch (Throwable $exception) {
            Yii::log($exception, CLogger::LEVEL_ERROR);
            $transaction->rollback();
            throw $exception;
        } catch (Exception $exception) {
            Yii::log($exception, CLogger::LEVEL_ERROR);
            $transaction->rollback();
            throw $exception;
        }
    }
}