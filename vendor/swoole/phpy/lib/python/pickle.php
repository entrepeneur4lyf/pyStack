<?php
namespace python;

/**
Create portable serialized representations of Python objects.

See module copyreg for a mechanism for registering custom picklers.
See module pickletools source for extensive comments.

Classes:

    Pickler
    Unpickler

Functions:

    dump(object, file)
    dumps(object) -> string
    load(file) -> object
    loads(bytes) -> object

Misc variables:

    __version__
    format_version
    compatible_formats

*/
class pickle{
    /**
    * @return pickle 
    */
    public static function import()
    {
        return \PyCore::import('pickle');
    }
    public $DEFAULT_PROTOCOL = 4;
    public $DUP = 2;
    public $HIGHEST_PROTOCOL = 5;
    public $POP = 0;
    public $POP_MARK = 1;
    public $maxsize = 9223372036854775807;

    public $ADDITEMS = "�";
    public $APPEND = "a";
    public $APPENDS = "e";
    public $BINBYTES = "B";
    public $BINBYTES8 = "�";
    public $BINFLOAT = "G";
    public $BINGET = "h";
    public $BININT = "J";
    public $BININT1 = "K";
    public $BININT2 = "M";
    public $BINPERSID = "Q";
    public $BINPUT = "q";
    public $BINSTRING = "T";
    public $BINUNICODE = "X";
    public $BINUNICODE8 = "�";
    public $BUILD = "b";
    public $BYTEARRAY8 = "�";
    public $DICT = "d";
    public $EMPTY_DICT = "}";
    public $EMPTY_LIST = "]";
    public $EMPTY_SET = "�";
    public $EMPTY_TUPLE = ")";
    public $EXT1 = "�";
    public $EXT2 = "�";
    public $EXT4 = "�";
    public $FALSE = "I00\n";
    public $FLOAT = "F";
    public $FRAME = "�";
    public $FROZENSET = "�";
    public $GET = "g";
    public $GLOBAL = "c";
    public $INST = "i";
    public $INT = "I";
    public $LIST = "l";
    public $LONG = "L";
    public $LONG1 = "�";
    public $LONG4 = "�";
    public $LONG_BINGET = "j";
    public $LONG_BINPUT = "r";
    public $MARK = "(";
    public $MEMOIZE = "�";
    public $NEWFALSE = "�";
    public $NEWOBJ = "�";
    public $NEWOBJ_EX = "�";
    public $NEWTRUE = "�";
    public $NEXT_BUFFER = "�";
    public $NONE = "N";
    public $OBJ = "o";
    public $PERSID = "P";
    public $PROTO = "�";
    public $PUT = "p";
    public $PyStringMap = null;
    public $READONLY_BUFFER = "�";
    public $REDUCE = "R";
    public $SETITEM = "s";
    public $SETITEMS = "u";
    public $SHORT_BINBYTES = "C";
    public $SHORT_BINSTRING = "U";
    public $SHORT_BINUNICODE = "�";
    public $STACK_GLOBAL = "�";
    public $STOP = ".";
    public $STRING = "S";
    public $TRUE = "I01\n";
    public $TUPLE = "t";
    public $TUPLE1 = "�";
    public $TUPLE2 = "�";
    public $TUPLE3 = "�";
    public $UNICODE = "V";
    public $_HAVE_PICKLE_BUFFER = true;
    public $__name__ = "pickle";
    public $__package__ = "";
    public $format_version = "4.0";

    public $FunctionType = null;
    public $PickleBuffer = null;
    public $PickleError = null;
    public $Pickler = null;
    public $PicklingError = null;
    public $Unpickler = null;
    public $UnpicklingError = null;
    public $_Framer = null;
    public $_Pickler = null;
    public $_Stop = null;
    public $_Unframer = null;
    public $_Unpickler = null;
    public $_compat_pickle = null;
    public $_extension_cache = null;
    public $_extension_registry = null;
    public $_inverted_registry = null;
    public $_tuplesize2code = null;
    public $bytes_types = null;
    public $codecs = null;
    public $compatible_formats = null;
    public $dispatch_table = null;
    public $io = null;
    public $islice = null;
    public $partial = null;
    public $re = null;
    public $sys = null;

    public function _dump($obj, $file, $protocol = null)
    {
    }

    public function _dumps($obj, $protocol = null)
    {
    }

    public function _getattribute($obj, $name)
    {
    }

    public function _load($file)
    {
    }

    public function _loads($s)
    {
    }

    public function _test()
    {
    }

    public function decode_long($data)
    {
    }

    public function dump($obj, $file, $protocol = null)
    {
    }

    public function dumps($obj, $protocol = null)
    {
    }

    public function encode_long($x)
    {
    }

    public function load($file)
    {
    }

    public function loads($data)
    {
    }

    public function unpack($format, $buffer)
    {
    }

    public function whichmodule($obj, $name)
    {
    }

}
