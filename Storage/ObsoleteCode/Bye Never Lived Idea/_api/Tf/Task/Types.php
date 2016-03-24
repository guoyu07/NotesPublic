<?php
namespace Tf\Task;

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

final class TransactionEnum {
  const CHORES = 1;
  const SECURITY = 2;
  const BOND = 3;
  const FREE_MARKET = 4;
  static public $__names = array(
    1 => 'CHORES',
    2 => 'SECURITY',
    3 => 'BOND',
    4 => 'FREE_MARKET',
  );
}

final class BiddingSortEnum {
  const NONE = 0;
  static public $__names = array(
    0 => 'NONE',
  );
}

final class PrivacyEnum {
  const LOWEST = 1;
  const LOWER = 2;
  const LOW = 3;
  const MIDLOW = 4;
  const MIDDLE = 5;
  const MIDHIGH = 6;
  const HIGH = 7;
  const HIGHER = 8;
  const HIGHEST = 9;
  static public $__names = array(
    1 => 'LOWEST',
    2 => 'LOWER',
    3 => 'LOW',
    4 => 'MIDLOW',
    5 => 'MIDDLE',
    6 => 'MIDHIGH',
    7 => 'HIGH',
    8 => 'HIGHER',
    9 => 'HIGHEST',
  );
}

final class BiddingOrderEnum {
  const NONE = 0;
  const PRICE = 1;
  const PRICE_DESC = 2;
  const SHARES = 3;
  const SHARES_DESC = 4;
  const DEADLINE = 5;
  const DEADLINE_DESC = 6;
  const BIDDERS = 7;
  const BIDDERS_DESC = 8;
  const WINNDERS = 9;
  const WINNDERS_DESC = 10;
  const DISTANCE = 11;
  static public $__names = array(
    0 => 'NONE',
    1 => 'PRICE',
    2 => 'PRICE_DESC',
    3 => 'SHARES',
    4 => 'SHARES_DESC',
    5 => 'DEADLINE',
    6 => 'DEADLINE_DESC',
    7 => 'BIDDERS',
    8 => 'BIDDERS_DESC',
    9 => 'WINNDERS',
    10 => 'WINNDERS_DESC',
    11 => 'DISTANCE',
  );
}

final class BidOrderEnum {
  const DEFAUT = 0;
  const TIME = 1;
  const TIME_DESC = 2;
  const BID_SECURITY = 3;
  const DELIVER_TIME = 4;
  const DELIVER_TIME_DESC = 5;
  const DISTANCE = 6;
  static public $__names = array(
    0 => 'DEFAUT',
    1 => 'TIME',
    2 => 'TIME_DESC',
    3 => 'BID_SECURITY',
    4 => 'DELIVER_TIME',
    5 => 'DELIVER_TIME_DESC',
    6 => 'DISTANCE',
  );
}

class CoordSt {
  static $_TSPEC;

  public $lat = null;
  public $lon = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'lat',
          'type' => TType::DOUBLE,
          ),
        2 => array(
          'var' => 'lon',
          'type' => TType::DOUBLE,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['lat'])) {
        $this->lat = $vals['lat'];
      }
      if (isset($vals['lon'])) {
        $this->lon = $vals['lon'];
      }
    }
  }

  public function getName() {
    return 'CoordSt';
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
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lat);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lon);
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
    $xfer += $output->writeStructBegin('CoordSt');
    if ($this->lat !== null) {
      $xfer += $output->writeFieldBegin('lat', TType::DOUBLE, 1);
      $xfer += $output->writeDouble($this->lat);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->lon !== null) {
      $xfer += $output->writeFieldBegin('lon', TType::DOUBLE, 2);
      $xfer += $output->writeDouble($this->lon);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

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

class BiddingSt {
  static $_TSPEC;

  public $id = null;
  public $biddee = null;
  public $transaction = null;
  public $sorts = null;
  public $unit_price = null;
  public $shares = 1;
  public $bond = 0;
  public $winners = 0;
  public $bidders = 0;
  public $title = null;
  public $keywords = null;
  public $description = null;
  public $text = null;
  public $time_now = null;
  public $deadline = null;
  public $state = null;
  public $lon = 0;
  public $lat = 0;
  public $privacy = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        16 => array(
          'var' => 'id',
          'type' => TType::I64,
          ),
        1 => array(
          'var' => 'biddee',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'transaction',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'sorts',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'unit_price',
          'type' => TType::I64,
          ),
        5 => array(
          'var' => 'shares',
          'type' => TType::BYTE,
          ),
        6 => array(
          'var' => 'bond',
          'type' => TType::I64,
          ),
        7 => array(
          'var' => 'winners',
          'type' => TType::I64,
          ),
        8 => array(
          'var' => 'bidders',
          'type' => TType::I64,
          ),
        9 => array(
          'var' => 'title',
          'type' => TType::STRING,
          ),
        10 => array(
          'var' => 'keywords',
          'type' => TType::STRING,
          ),
        11 => array(
          'var' => 'description',
          'type' => TType::STRING,
          ),
        12 => array(
          'var' => 'text',
          'type' => TType::STRING,
          ),
        13 => array(
          'var' => 'time_now',
          'type' => TType::I64,
          ),
        14 => array(
          'var' => 'deadline',
          'type' => TType::I64,
          ),
        15 => array(
          'var' => 'state',
          'type' => TType::BYTE,
          ),
        80 => array(
          'var' => 'lon',
          'type' => TType::DOUBLE,
          ),
        81 => array(
          'var' => 'lat',
          'type' => TType::DOUBLE,
          ),
        99 => array(
          'var' => 'privacy',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['id'])) {
        $this->id = $vals['id'];
      }
      if (isset($vals['biddee'])) {
        $this->biddee = $vals['biddee'];
      }
      if (isset($vals['transaction'])) {
        $this->transaction = $vals['transaction'];
      }
      if (isset($vals['sorts'])) {
        $this->sorts = $vals['sorts'];
      }
      if (isset($vals['unit_price'])) {
        $this->unit_price = $vals['unit_price'];
      }
      if (isset($vals['shares'])) {
        $this->shares = $vals['shares'];
      }
      if (isset($vals['bond'])) {
        $this->bond = $vals['bond'];
      }
      if (isset($vals['winners'])) {
        $this->winners = $vals['winners'];
      }
      if (isset($vals['bidders'])) {
        $this->bidders = $vals['bidders'];
      }
      if (isset($vals['title'])) {
        $this->title = $vals['title'];
      }
      if (isset($vals['keywords'])) {
        $this->keywords = $vals['keywords'];
      }
      if (isset($vals['description'])) {
        $this->description = $vals['description'];
      }
      if (isset($vals['text'])) {
        $this->text = $vals['text'];
      }
      if (isset($vals['time_now'])) {
        $this->time_now = $vals['time_now'];
      }
      if (isset($vals['deadline'])) {
        $this->deadline = $vals['deadline'];
      }
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['lon'])) {
        $this->lon = $vals['lon'];
      }
      if (isset($vals['lat'])) {
        $this->lat = $vals['lat'];
      }
      if (isset($vals['privacy'])) {
        $this->privacy = $vals['privacy'];
      }
    }
  }

  public function getName() {
    return 'BiddingSt';
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
        case 16:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->id);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->biddee);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->transaction);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->sorts);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->unit_price);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->shares);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->bond);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->winners);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->bidders);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 9:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->title);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 10:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->keywords);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 11:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->description);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 12:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->text);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 13:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->time_now);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 14:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->deadline);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 15:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 80:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lon);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 81:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lat);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 99:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->privacy);
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
    $xfer += $output->writeStructBegin('BiddingSt');
    if ($this->biddee !== null) {
      $xfer += $output->writeFieldBegin('biddee', TType::STRING, 1);
      $xfer += $output->writeString($this->biddee);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->transaction !== null) {
      $xfer += $output->writeFieldBegin('transaction', TType::I32, 2);
      $xfer += $output->writeI32($this->transaction);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->sorts !== null) {
      $xfer += $output->writeFieldBegin('sorts', TType::I32, 3);
      $xfer += $output->writeI32($this->sorts);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->unit_price !== null) {
      $xfer += $output->writeFieldBegin('unit_price', TType::I64, 4);
      $xfer += $output->writeI64($this->unit_price);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->shares !== null) {
      $xfer += $output->writeFieldBegin('shares', TType::BYTE, 5);
      $xfer += $output->writeByte($this->shares);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->bond !== null) {
      $xfer += $output->writeFieldBegin('bond', TType::I64, 6);
      $xfer += $output->writeI64($this->bond);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->winners !== null) {
      $xfer += $output->writeFieldBegin('winners', TType::I64, 7);
      $xfer += $output->writeI64($this->winners);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->bidders !== null) {
      $xfer += $output->writeFieldBegin('bidders', TType::I64, 8);
      $xfer += $output->writeI64($this->bidders);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->title !== null) {
      $xfer += $output->writeFieldBegin('title', TType::STRING, 9);
      $xfer += $output->writeString($this->title);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->keywords !== null) {
      $xfer += $output->writeFieldBegin('keywords', TType::STRING, 10);
      $xfer += $output->writeString($this->keywords);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->description !== null) {
      $xfer += $output->writeFieldBegin('description', TType::STRING, 11);
      $xfer += $output->writeString($this->description);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->text !== null) {
      $xfer += $output->writeFieldBegin('text', TType::STRING, 12);
      $xfer += $output->writeString($this->text);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->time_now !== null) {
      $xfer += $output->writeFieldBegin('time_now', TType::I64, 13);
      $xfer += $output->writeI64($this->time_now);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->deadline !== null) {
      $xfer += $output->writeFieldBegin('deadline', TType::I64, 14);
      $xfer += $output->writeI64($this->deadline);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::BYTE, 15);
      $xfer += $output->writeByte($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->id !== null) {
      $xfer += $output->writeFieldBegin('id', TType::I64, 16);
      $xfer += $output->writeI64($this->id);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->lon !== null) {
      $xfer += $output->writeFieldBegin('lon', TType::DOUBLE, 80);
      $xfer += $output->writeDouble($this->lon);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->lat !== null) {
      $xfer += $output->writeFieldBegin('lat', TType::DOUBLE, 81);
      $xfer += $output->writeDouble($this->lat);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->privacy !== null) {
      $xfer += $output->writeFieldBegin('privacy', TType::I32, 99);
      $xfer += $output->writeI32($this->privacy);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class BiddingListSt {
  static $_TSPEC;

  public $biddee = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'biddee',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['biddee'])) {
        $this->biddee = $vals['biddee'];
      }
    }
  }

  public function getName() {
    return 'BiddingListSt';
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
            $xfer += $input->readString($this->biddee);
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
    $xfer += $output->writeStructBegin('BiddingListSt');
    if ($this->biddee !== null) {
      $xfer += $output->writeFieldBegin('biddee', TType::STRING, 1);
      $xfer += $output->writeString($this->biddee);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class PriceRangeSt {
  static $_TSPEC;

  public $min = null;
  public $max = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'min',
          'type' => TType::I64,
          ),
        2 => array(
          'var' => 'max',
          'type' => TType::I64,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['min'])) {
        $this->min = $vals['min'];
      }
      if (isset($vals['max'])) {
        $this->max = $vals['max'];
      }
    }
  }

  public function getName() {
    return 'PriceRangeSt';
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
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->min);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->max);
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
    $xfer += $output->writeStructBegin('PriceRangeSt');
    if ($this->min !== null) {
      $xfer += $output->writeFieldBegin('min', TType::I64, 1);
      $xfer += $output->writeI64($this->min);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->max !== null) {
      $xfer += $output->writeFieldBegin('max', TType::I64, 2);
      $xfer += $output->writeI64($this->max);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class BiddingListPSt {
  static $_TSPEC;

  public $biddee = null;
  public $transaction = null;
  public $order = null;
  public $price = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'biddee',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'transaction',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'order',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'price',
          'type' => TType::STRUCT,
          'class' => '\Tf\Task\PriceRangeSt',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['biddee'])) {
        $this->biddee = $vals['biddee'];
      }
      if (isset($vals['transaction'])) {
        $this->transaction = $vals['transaction'];
      }
      if (isset($vals['order'])) {
        $this->order = $vals['order'];
      }
      if (isset($vals['price'])) {
        $this->price = $vals['price'];
      }
    }
  }

  public function getName() {
    return 'BiddingListPSt';
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
            $xfer += $input->readString($this->biddee);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->transaction);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->order);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRUCT) {
            $this->price = new \Tf\Task\PriceRangeSt();
            $xfer += $this->price->read($input);
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
    $xfer += $output->writeStructBegin('BiddingListPSt');
    if ($this->biddee !== null) {
      $xfer += $output->writeFieldBegin('biddee', TType::STRING, 1);
      $xfer += $output->writeString($this->biddee);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->transaction !== null) {
      $xfer += $output->writeFieldBegin('transaction', TType::I32, 2);
      $xfer += $output->writeI32($this->transaction);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->order !== null) {
      $xfer += $output->writeFieldBegin('order', TType::I32, 3);
      $xfer += $output->writeI32($this->order);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->price !== null) {
      if (!is_object($this->price)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('price', TType::STRUCT, 4);
      $xfer += $this->price->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class BidSt {
  static $_TSPEC;

  public $id = null;
  public $bidding_id = null;
  public $bidder = null;
  public $quotation = null;
  public $bid_security = null;
  public $delivery_time = null;
  public $text = null;
  public $time_now = null;
  public $state = null;
  public $lon = null;
  public $lat = null;
  public $privacy = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        10 => array(
          'var' => 'id',
          'type' => TType::I64,
          ),
        1 => array(
          'var' => 'bidding_id',
          'type' => TType::I64,
          ),
        2 => array(
          'var' => 'bidder',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'quotation',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'bid_security',
          'type' => TType::I32,
          ),
        5 => array(
          'var' => 'delivery_time',
          'type' => TType::I64,
          ),
        6 => array(
          'var' => 'text',
          'type' => TType::STRING,
          ),
        7 => array(
          'var' => 'time_now',
          'type' => TType::I64,
          ),
        8 => array(
          'var' => 'state',
          'type' => TType::BYTE,
          ),
        80 => array(
          'var' => 'lon',
          'type' => TType::DOUBLE,
          ),
        81 => array(
          'var' => 'lat',
          'type' => TType::DOUBLE,
          ),
        99 => array(
          'var' => 'privacy',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['id'])) {
        $this->id = $vals['id'];
      }
      if (isset($vals['bidding_id'])) {
        $this->bidding_id = $vals['bidding_id'];
      }
      if (isset($vals['bidder'])) {
        $this->bidder = $vals['bidder'];
      }
      if (isset($vals['quotation'])) {
        $this->quotation = $vals['quotation'];
      }
      if (isset($vals['bid_security'])) {
        $this->bid_security = $vals['bid_security'];
      }
      if (isset($vals['delivery_time'])) {
        $this->delivery_time = $vals['delivery_time'];
      }
      if (isset($vals['text'])) {
        $this->text = $vals['text'];
      }
      if (isset($vals['time_now'])) {
        $this->time_now = $vals['time_now'];
      }
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['lon'])) {
        $this->lon = $vals['lon'];
      }
      if (isset($vals['lat'])) {
        $this->lat = $vals['lat'];
      }
      if (isset($vals['privacy'])) {
        $this->privacy = $vals['privacy'];
      }
    }
  }

  public function getName() {
    return 'BidSt';
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
        case 10:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->id);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->bidding_id);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->bidder);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->quotation);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->bid_security);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->delivery_time);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->text);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->time_now);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 80:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lon);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 81:
          if ($ftype == TType::DOUBLE) {
            $xfer += $input->readDouble($this->lat);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 99:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->privacy);
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
    $xfer += $output->writeStructBegin('BidSt');
    if ($this->bidding_id !== null) {
      $xfer += $output->writeFieldBegin('bidding_id', TType::I64, 1);
      $xfer += $output->writeI64($this->bidding_id);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->bidder !== null) {
      $xfer += $output->writeFieldBegin('bidder', TType::STRING, 2);
      $xfer += $output->writeString($this->bidder);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->quotation !== null) {
      $xfer += $output->writeFieldBegin('quotation', TType::I32, 3);
      $xfer += $output->writeI32($this->quotation);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->bid_security !== null) {
      $xfer += $output->writeFieldBegin('bid_security', TType::I32, 4);
      $xfer += $output->writeI32($this->bid_security);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->delivery_time !== null) {
      $xfer += $output->writeFieldBegin('delivery_time', TType::I64, 5);
      $xfer += $output->writeI64($this->delivery_time);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->text !== null) {
      $xfer += $output->writeFieldBegin('text', TType::STRING, 6);
      $xfer += $output->writeString($this->text);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->time_now !== null) {
      $xfer += $output->writeFieldBegin('time_now', TType::I64, 7);
      $xfer += $output->writeI64($this->time_now);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::BYTE, 8);
      $xfer += $output->writeByte($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->id !== null) {
      $xfer += $output->writeFieldBegin('id', TType::I64, 10);
      $xfer += $output->writeI64($this->id);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->lon !== null) {
      $xfer += $output->writeFieldBegin('lon', TType::DOUBLE, 80);
      $xfer += $output->writeDouble($this->lon);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->lat !== null) {
      $xfer += $output->writeFieldBegin('lat', TType::DOUBLE, 81);
      $xfer += $output->writeDouble($this->lat);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->privacy !== null) {
      $xfer += $output->writeFieldBegin('privacy', TType::I32, 99);
      $xfer += $output->writeI32($this->privacy);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class BidListPSt {
  static $_TSPEC;

  public $bidding_id = null;
  public $id_offset = null;
  public $order = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        2 => array(
          'var' => 'bidding_id',
          'type' => TType::I64,
          ),
        3 => array(
          'var' => 'id_offset',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'order',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['bidding_id'])) {
        $this->bidding_id = $vals['bidding_id'];
      }
      if (isset($vals['id_offset'])) {
        $this->id_offset = $vals['id_offset'];
      }
      if (isset($vals['order'])) {
        $this->order = $vals['order'];
      }
    }
  }

  public function getName() {
    return 'BidListPSt';
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
        case 2:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->bidding_id);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->id_offset);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->order);
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
    $xfer += $output->writeStructBegin('BidListPSt');
    if ($this->bidding_id !== null) {
      $xfer += $output->writeFieldBegin('bidding_id', TType::I64, 2);
      $xfer += $output->writeI64($this->bidding_id);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->id_offset !== null) {
      $xfer += $output->writeFieldBegin('id_offset', TType::I32, 3);
      $xfer += $output->writeI32($this->id_offset);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->order !== null) {
      $xfer += $output->writeFieldBegin('order', TType::I32, 4);
      $xfer += $output->writeI32($this->order);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

$GLOBALS['task_CONSTANTS']['SSO_COOKIE_NAME'] = array(
  "signInfo" => "sso_sign_info",
  "sessId" => "sso_sess_id",
);


