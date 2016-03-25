<?php
namespace Tf\Sso;

/**
 * Autogenerated by Thrift Compiler (0.9.1)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


final class ErrIdEnum {
  const ERR_UNKNOWN = 1;
  const ERR_SERVER = 2;
  const ERR_NOT_EXISTS = 3;
  const ERR_REPEATED = 4;
  const ERR_USER_INPUT = 5;
  const ERR_CAPTCHA = 6;
  const ERR_VERIFY = 7;
  const ERR_PERMISSION = 8;
  static public $__names = array(
    1 => 'ERR_UNKNOWN',
    2 => 'ERR_SERVER',
    3 => 'ERR_NOT_EXISTS',
    4 => 'ERR_REPEATED',
    5 => 'ERR_USER_INPUT',
    6 => 'ERR_CAPTCHA',
    7 => 'ERR_VERIFY',
    8 => 'ERR_PERMISSION',
  );
}

final class AccountTypeEnum {
  const USERNAME = 1;
  const PHONE = 2;
  const EMAIL = 3;
  static public $__names = array(
    1 => 'USERNAME',
    2 => 'PHONE',
    3 => 'EMAIL',
  );
}

class Err extends TException {
  static $_TSPEC;

  public $id = null;
  public $msg = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'id',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'msg',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['id'])) {
        $this->id = $vals['id'];
      }
      if (isset($vals['msg'])) {
        $this->msg = $vals['msg'];
      }
    }
  }

  public function getName() {
    return 'Err';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->id);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->msg);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Err');
    if ($this->id !== null) {
      $xfer += $output->writeFieldBegin('id', TType::I32, 1);
      $xfer += $output->writeI32($this->id);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msg !== null) {
      $xfer += $output->writeFieldBegin('msg', TType::STRING, 2);
      $xfer += $output->writeString($this->msg);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class SignInSt {
  static $_TSPEC;

  public $account = null;
  public $account_type = null;
  public $pwd = null;
  public $captcha = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'account',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'account_type',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'pwd',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'captcha',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['account'])) {
        $this->account = $vals['account'];
      }
      if (isset($vals['account_type'])) {
        $this->account_type = $vals['account_type'];
      }
      if (isset($vals['pwd'])) {
        $this->pwd = $vals['pwd'];
      }
      if (isset($vals['captcha'])) {
        $this->captcha = $vals['captcha'];
      }
    }
  }

  public function getName() {
    return 'SignInSt';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->account);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->account_type);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->pwd);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->captcha);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('SignInSt');
    if ($this->account !== null) {
      $xfer += $output->writeFieldBegin('account', TType::STRING, 1);
      $xfer += $output->writeString($this->account);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->account_type !== null) {
      $xfer += $output->writeFieldBegin('account_type', TType::I32, 2);
      $xfer += $output->writeI32($this->account_type);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->pwd !== null) {
      $xfer += $output->writeFieldBegin('pwd', TType::STRING, 3);
      $xfer += $output->writeString($this->pwd);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->captcha !== null) {
      $xfer += $output->writeFieldBegin('captcha', TType::STRING, 4);
      $xfer += $output->writeString($this->captcha);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class SignInfoSt {
  static $_TSPEC;

  public $username = null;
  public $email = null;
  public $phone = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'username',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'email',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'phone',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['username'])) {
        $this->username = $vals['username'];
      }
      if (isset($vals['email'])) {
        $this->email = $vals['email'];
      }
      if (isset($vals['phone'])) {
        $this->phone = $vals['phone'];
      }
    }
  }

  public function getName() {
    return 'SignInfoSt';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->username);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->email);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->phone);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('SignInfoSt');
    if ($this->username !== null) {
      $xfer += $output->writeFieldBegin('username', TType::STRING, 1);
      $xfer += $output->writeString($this->username);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->email !== null) {
      $xfer += $output->writeFieldBegin('email', TType::STRING, 2);
      $xfer += $output->writeString($this->email);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->phone !== null) {
      $xfer += $output->writeFieldBegin('phone', TType::STRING, 3);
      $xfer += $output->writeString($this->phone);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

$GLOBALS['sso_CONSTANTS']['SSO_COOKIE_NAME'] = array(
  "sessId" => "sso_sess_id",
  "signInfo" => "sso_sign_info",
);

