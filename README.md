## I'm weird... don't be mad... I like being weird.

One of the issues that I have had quite a bit is the rapid evolution of the APIs for both OpenAI and Anthropic since there is no official PHP SDK.
Well, I stumbled on a solution, my friends :) Also, I'm happy to sday that this project I am going to talkk about is being actively developed.
Github: Swoole/Phpy
A library for inter-calling Python and PHP. You can use Python functions and libraries in PHP, or use PHP packages in Python.| Supports Linux/Windows/macOS Not support Python multithreading or async-io features
py2php
py2php is online utility that will auto-translate python code into PHP code.
Calling Python from PHP
Compile and install phpy.so as an extension, and append extension=phpy.so to php.ini.
PHP Example:
$os = PyCore::import("os");
echo $os->uname();
Transformers
$transformers = PyCore::import('transformers');
$AutoTokenizer = $transformers->AutoTokenizer;
$AutoModelForSequenceClassification = $transformers->AutoModelForSequenceClassification;

$os = PyCore::import('os');
$os->environ['https_proxy'] = getenv('https_proxy');

$tokenizer = $AutoTokenizer->from_pretrained("lxyuan/distilbert-base-multilingual-cased-sentiments-student");
$model = $AutoModelForSequenceClassification->from_pretrained("lxyuan/distilbert-base-multilingual-cased-sentiments-student");
Calling PHP from Python
Simply import it as a C++ Mudule.
Python Example:
import phpy
content = phpy.call('file_get_contents', 'test.txt')

o = phpy.Object('redis')
assert o.call('connect', '127.0.0.1', 6379)
rdata = phpy.call('uniqid')
assert o.call('set', 'key', rdata)
assert o.call('get', 'key') == rdata

It creates ZendVM and CPython VM in the process at the same time, and directly uses C functions to call each other in the process stack space.
The overhead is only the conversion of zval <-> PyObject structures, so the performance is very high.
In the benchmark test, we created a PyDict and executed PHP code and Python code to read and write 10 million times respectively.
The performance of phpy writing PyDict with PHP code is 14% higher than the native Python, and the read performance is 25% higher.
===
Ok, so there is an brief desription of the project. You DO have to install a PECL extension but it was super painless, even in WSL2.
The syntax isn't crazy straightforward but I was able to figure out it. Here are some examples.
Start a VSCode or Cursor project. I would recommend using Python 3.11 because 3.12 was acting weird for me.
Unfortunately, you cannot run a Python Environment (pyenv) but I didn't try Conda.
Composer
composer init
You shouldn end up with something like this for composer.json and a folder structure.
{
    "name": "swoolish/pystack",
    "version": "0.0.1",
    "description": "PHP/Python hybrid AI inference framework",
    "type": "project",
    "require": {
        "swoole/phpy": "^1.0",
    },
    "license": "MIT",
    "autoload": {
        "psr-4": {
            "pyStack\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Dat Vanilla Nilla",
            "email": "mynilla@gmail.com"
        }
    ],
    "minimum-stability": "dev"
}
Now run composer update
composer update
composer dump-autoload
I had an issue passing the API Keys as strings so use Environment Variables
export OPENAI_API_KEY=<Your API Key>
export ANTHROPIC_API_KEY=<Your API Key>
src/Clients/Anthropic.php
<?php

declare(strict_types=1);

namespace pyStack\App\Clients;

class Anthropic
{
    private $client;
    private $anthropic;

    public function __construct()
    {
        
$this
->anthropic = \PyCore::import('anthropic');
        
$this
->client = 
$this
->anthropic->Anthropic();
    }

    public function createMessage(string $content, string $model = "claude-3-5-sonnet-20240620", int $maxTokens = 8192, string $role = "user", bool $stream = false): string
    {
        $message = 
$this
->client->messages->create(
            model: $model,
            max_tokens: $maxTokens,
            stream: $stream,
            messages: new \PyList([
                new \PyDict([
                    "role" => $role,
                    "content" => $content,
            ])])
        );

        return \PyCore::scalar($message->content[0]->text);
    }
}
src/Clients/OpenAI.php
<?php

declare(strict_types=1);

namespace pyStack\App\Clients;

class OpenAI
{
    private $openai;
    private $client;

    public function __construct()
    {
        $this->openai = \PyCore::import('openai');
        $this->client = $this->openai->OpenAI();
    }

    public function createMessage(string $content, string $model = "gpt-4o", int $maxTokens = 4096, string $role = "user", bool $stream = false): string
    {
        $message = $this->client->chat->completions->create(messages: new \PyList([new \PyDict([
            "role" => $role,
            "content" => $content,
        ])]), model: $model);

        return \PyCore::scalar($message->choices[0]->message->content);
    }
}
/index.php
<?php

require 'vendor/autoload.php';

use pyStack\App\Clients\OpenAI;
use pyStack\App\Clients\Anthropic;

$claude = new Anthropic();

$gpt4o = new OpenAI();

try {
    $response = $claude->createMessage(
        "Is it possible to run Python from PHP?"
    );
    echo "Anthropic:\n\n";
    PyCore::print($response);
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}

try {
    $response = $gpt4o->createMessage(
        "Is it possible to run Python from PHP?"
    );
    echo "\n\nOpenAI:\n\n";
    PyCore::print($response);
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
RUN IT
php index.php
Anthropic:
Yes, it is possible to run Python from PHP. There are several ways to accomplish this:
Using exec() or shell_exec(): You can use PHP's exec() or shell_exec() functions to execute Python scripts as separate processes:Note: This method requires that Python is installed on the server and accessible via the command line.$output = shell_exec('python /path/to/your/script.py'); echo $output;
Using system(): Similar to exec(), you can use the system() function:$result = system('python /path/to/your/script.py', $retval);
Using proc_open(): For more control over the process, you can use proc_open():$descriptorspec = array(    0 => array("pipe", "r"),    1 => array("pipe", "w"),    2 => array("pipe", "w") ); $process = proc_open('python /path/to/your/script.py', $descriptorspec, $pipes);
Using libraries: There are libraries available that allow you to embed Python within PHP:
PHP-Python: A PHP extension that embeds Python
P2P (PHP to Python): A library for calling Python from PHP
Using web services: You can create a Python web service (e.g., using Flask or Django) and call it from PHP using HTTP requests.
Using a message queue: Implement a message queue system where PHP sends tasks to a queue, and a Python worker processes them.
Each method has its own advantages and drawbacks in terms of performance, security, and complexity. The choice depends on your specific use case and requirements.
Remember to consider security implications when executing external scripts, especially if user input is involved. Always sanitize and validate any input used in script execution to prevent potential security vulnerabilities.
OpenAI:
Yes, it is possible to run Python scripts from PHP. There are several methods you can use to achieve this. Here are a few common ones:
1. Using exec() or shell_exec()
You can use PHP's built-in exec() or shell_exec() functions to execute Python scripts from within PHP.
Example using exec():
<?php
$pythonScript = 'path_to_your_python_script.py';
$output = [];
$return_var = 0;

exec("python3 " . escapeshellarg($pythonScript), $output, $return_var);

if ($return_var !== 0) {
    echo 'Error executing Python script';
} else {
    echo 'Python script output: ' . implode("\n", $output);
}
?>
Example using shell_exec():
<?php
$pythonScript = 'path_to_your_python_script.py';
$output = shell_exec("python3 " . escapeshellarg($pythonScript));

if ($output === null) {
    echo 'Error executing Python script';
} else {
    echo 'Python script output: ' . $output;
}
?>
2. Using the system() function
The system() function is similar to exec(), but it outputs the result directly to the browser.
Example using system():
<?php
$pythonScript = 'path_to_your_python_script.py';
system("python3 " . escapeshellarg($pythonScript));
?>
3. Using the popen() function
The popen() function can be used to open a process for input/output.
Example using popen():
<?php
$pythonScript = 'path_to_your_python_script.py';
$handle = popen("python3 " . escapeshellarg($pythonScript), "r");

if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    pclose($handle);
} else {
    echo 'Error executing Python script';
}
?>
4. Using proc_open()
For more complex interactions, you can use the proc_open() function, which provides a richer set of options for process management.
Example using proc_open():
<?php
$pythonScript = 'path_to_your_python_script.py';
$descriptorspec = [
    0 => ['pipe', 'r'],  // stdin is a pipe that the child will read from
    1 => ['pipe', 'w'],  // stdout is a pipe that the child will write to
    2 => ['pipe', 'w']   // stderr is a pipe that the child will write to
];

$process = proc_open('python3 ' . escapeshellarg($pythonScript), $descriptorspec, $pipes);

if (is_resource($process)) {
    // Read script output
    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    // Read script errors
    $error = stream_get_contents($pipes[2]);
    fclose($pipes[2]);

    // Close process
    $return_value = proc_close($process);

    if ($return_value != 0) {
        echo "Python script error: $error";
    } else {
        echo "Python script output: $output";
    }
}
?>
BOOM it worked :)
