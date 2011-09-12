<?php

/**
 * BasesimpletwitterMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $message
 * @property datetime $created_at
 * @property simpletwitterUser $simpletwitterUser
 * 
 * @method integer              getUserId()            Returns the current record's "user_id" value
 * @method string               getMessage()           Returns the current record's "message" value
 * @method datetime             getCreatedAt()         Returns the current record's "created_at" value
 * @method simpletwitterUser    getSimpletwitterUser() Returns the current record's "simpletwitterUser" value
 * @method simpletwitterMessage setUserId()            Sets the current record's "user_id" value
 * @method simpletwitterMessage setMessage()           Sets the current record's "message" value
 * @method simpletwitterMessage setCreatedAt()         Sets the current record's "created_at" value
 * @method simpletwitterMessage setSimpletwitterUser() Sets the current record's "simpletwitterUser" value
 * 
 * @package    simpleTwitter
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesimpletwitterMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('simpletwitter_message');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('message', 'string', 140, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 140,
             ));
        $this->hasColumn('created_at', 'datetime', null, array(
             'type' => 'datetime',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('simpletwitterUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}