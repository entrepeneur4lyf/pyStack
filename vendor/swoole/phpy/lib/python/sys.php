<?php
namespace python;

/**
This module provides access to some objects used or maintained by the
interpreter and to functions that interact strongly with the interpreter.

Dynamic objects:

argv -- command line arguments; argv[0] is the script pathname if known
path -- module search path; path[0] is the script directory, else ''
modules -- dictionary of loaded modules

displayhook -- called to show results in an interactive session
excepthook -- called to handle any uncaught exception other than SystemExit
  To customize printing in an interactive session or to install a custom
  top-level exception handler, assign other functions to replace these.

stdin -- standard input file object; used by input()
stdout -- standard output file object; used by print()
stderr -- standard error object; used for error messages
  By assigning other file objects (or objects that behave like files)
  to these, it is possible to redirect all of the interpreter's I/O.

last_type -- type of last uncaught exception
last_value -- value of last uncaught exception
last_traceback -- traceback of last uncaught exception
  These three are only available in an interactive session after a
  traceback has been printed.

Static objects:

builtin_module_names -- tuple of module names built into this interpreter
copyright -- copyright notice pertaining to this interpreter
exec_prefix -- prefix used to find the machine-specific Python library
executable -- absolute path of the executable binary of the Python interpreter
float_info -- a named tuple with information about the float implementation.
float_repr_style -- string indicating the style of repr() output for floats
hash_info -- a named tuple with information about the hash algorithm.
hexversion -- version information encoded as a single integer
implementation -- Python implementation information.
int_info -- a named tuple with information about the int implementation.
maxsize -- the largest supported length of containers.
maxunicode -- the value of the largest Unicode code point
platform -- platform identifier
prefix -- prefix used to find the Python library
thread_info -- a named tuple with information about the thread implementation.
version -- the version of this interpreter as a string
version_info -- version information as a named tuple
__stdin__ -- the original stdin; don't touch!
__stdout__ -- the original stdout; don't touch!
__stderr__ -- the original stderr; don't touch!
__displayhook__ -- the original displayhook; don't touch!
__excepthook__ -- the original excepthook; don't touch!

Functions:

displayhook() -- print an object to the screen, and save it in builtins._
excepthook() -- print an exception and its traceback to sys.stderr
exception() -- return the current thread's active exception
exc_info() -- return information about the current thread's active exception
exit() -- exit the interpreter by raising SystemExit
getdlopenflags() -- returns flags to be used for dlopen() calls
getprofile() -- get the global profiling function
getrefcount() -- return the reference count for an object (plus one :-)
getrecursionlimit() -- return the max recursion depth for the interpreter
getsizeof() -- return the size of an object in bytes
gettrace() -- get the global debug tracing function
setdlopenflags() -- set the flags to be used for dlopen() calls
setprofile() -- set the global profiling function
setrecursionlimit() -- set the max recursion depth for the interpreter
settrace() -- set the global debug tracing function
*/
class sys{
    /**
    * @return sys 
    */
    public static function import()
    {
        return \PyCore::import('sys');
    }
    public $api_version = 1013;
    public $hexversion = 51054064;
    public $maxsize = 9223372036854775807;
    public $maxunicode = 1114111;

    public $__name__ = "sys";
    public $__package__ = "";
    public $_base_executable = "/opt/anaconda3/bin/python3";
    public $_framework = "";
    public $_home = null;
    public $_stdlib_dir = "/opt/anaconda3/lib/python3.11";
    public $abiflags = "";
    public $base_exec_prefix = "/opt/anaconda3";
    public $base_prefix = "/opt/anaconda3";
    public $byteorder = "little";
    public $copyright = "Copyright (c) 2001-2023 Python Software Foundation.\nAll Rights Reserved.\n\nCopyright (c) 2000 BeOpen.com.\nAll Rights Reserved.\n\nCopyright (c) 1995-2001 Corporation for National Research Initiatives.\nAll Rights Reserved.\n\nCopyright (c) 1991-1995 Stichting Mathematisch Centrum, Amsterdam.\nAll Rights Reserved.";
    public $dont_write_bytecode = false;
    public $exec_prefix = "/opt/anaconda3";
    public $executable = "/opt/anaconda3/bin/python3";
    public $float_repr_style = "short";
    public $platform = "linux";
    public $platlibdir = "lib";
    public $prefix = "/opt/anaconda3";
    public $pycache_prefix = null;
    public $version = "3.11.5 (main, Sep 11 2023, 14:07:11) [GCC 11.2.0]";

    public $__stderr__ = null;
    public $__stdin__ = null;
    public $__stdout__ = null;
    public $_git = null;
    public $_xoptions = null;
    public $argv = null;
    public $builtin_module_names = null;
    public $flags = null;
    public $float_info = null;
    public $hash_info = null;
    public $implementation = null;
    public $int_info = null;
    public $meta_path = null;
    public $modules = null;
    public $orig_argv = null;
    public $path = null;
    public $path_hooks = null;
    public $path_importer_cache = null;
    public $stderr = null;
    public $stdin = null;
    public $stdlib_module_names = null;
    public $stdout = null;
    public $thread_info = null;
    public $version_info = null;
    public $warnoptions = null;

    public function __displayhook__($object)
    {
    }

    public function __excepthook__($exctype, $value, $traceback)
    {
    }

    public function __interactivehook__()
    {
    }

    public function __unraisablehook__($unraisable)
    {
    }

    public function _clear_type_cache()
    {
    }

    public function _current_exceptions()
    {
    }

    public function _current_frames()
    {
    }

    public function _debugmallocstats()
    {
    }

    public function _getframe($depth = 0)
    {
    }

    public function _getquickenedcount()
    {
    }

    public function addaudithook($hook)
    {
    }

    public function call_tracing($func, $args)
    {
    }

    public function displayhook($object)
    {
    }

    public function exc_info()
    {
    }

    public function excepthook($exctype, $value, $traceback)
    {
    }

    public function exception()
    {
    }

    public function exit($status = null)
    {
    }

    public function get_asyncgen_hooks()
    {
    }

    public function get_coroutine_origin_tracking_depth()
    {
    }

    public function get_int_max_str_digits()
    {
    }

    public function getallocatedblocks()
    {
    }

    public function getdefaultencoding()
    {
    }

    public function getdlopenflags()
    {
    }

    public function getfilesystemencodeerrors()
    {
    }

    public function getfilesystemencoding()
    {
    }

    public function getprofile()
    {
    }

    public function getrecursionlimit()
    {
    }

    public function getrefcount($object)
    {
    }

    public function getswitchinterval()
    {
    }

    public function gettrace()
    {
    }

    public function intern($string)
    {
    }

    public function is_finalizing()
    {
    }

    public function set_coroutine_origin_tracking_depth($depth)
    {
    }

    public function set_int_max_str_digits($maxdigits)
    {
    }

    public function setdlopenflags($flags)
    {
    }

    public function setrecursionlimit($limit)
    {
    }

    public function setswitchinterval($interval)
    {
    }

    public function unraisablehook($unraisable)
    {
    }

}
