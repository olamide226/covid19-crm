<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cbr_log".
 *
 * @property int $id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property int $mobilenumber
 * @property string $gender
 * @property string $dateofbirth
 * @property string $address
 * @property string $emailaddress
 * @property string $state
 * @property string $lga
 * @property string $maritalstatus
 * @property string $occupation
 * @property int $beneficiaryid
 * @property string $programname
 * @property string $interventionname
 * @property string $identitytype
 * @property int $age
 * @property string $bvn
 * @property string $bankname
 * @property string $accountnumber
 */
class Cbr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cbr_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mobilenumber', 'beneficiaryid', 'age'], 'integer'],
            [['dateofbirth','alternatemobilenumber'], 'safe'],
            [['firstname', 'middlename', 'lastname', 'state', 'occupation', 'programname', 'interventionname', 'identitytype'], 'string', 'max' => 100],
            [['gender', 'accountnumber'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 1000],
            [['emailaddress', 'lga'], 'string', 'max' => 300],
            [['maritalstatus', 'bankname'], 'string', 'max' => 50],
            [['bvn'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'mobilenumber' => 'Mobilenumber',
            'alternatemobilenumber' => 'Alter Mobile number',
            'gender' => 'Gender',
            'dateofbirth' => 'Dateofbirth',
            'address' => 'Address',
            'emailaddress' => 'Emailaddress',
            'state' => 'State',
            'lga' => 'Lga',
            'maritalstatus' => 'Maritalstatus',
            'occupation' => 'Occupation',
            'beneficiaryid' => 'Beneficiaryid',
            'programname' => 'Programname',
            'interventionname' => 'Interventionname',
            'identitytype' => 'Identitytype',
            'age' => 'Age',
            'bvn' => 'Bvn',
            'bankname' => 'Bankname',
            'accountnumber' => 'Accountnumber',
        ];
    }
}