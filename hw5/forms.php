<?php

class MyFiles
{
    private $contents;
    private $filename;
    private $usertext;
    private $action;

    function MyFiles()
    {
        $this->try_open();
    }

    private function try_open()
    {
        try
        {
            $this->contents = null;
            $this->open();
            echo 'File opened without errors.<br>';
        }
        catch (Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }

    private function open()
    {
        if ($_GET['action'] == "Write" && file_exists($_GET['filename']))
        {
            throw new Exception("Write command - File already exists.<br>");
        }
        elseif ($_GET['action'] == "Read" && !file_exists($_GET['filename']))
        {
            throw new Exception("Read command - File does not exist.<br>");
        }
        else
        {
            return true;
        }
    }

    // Reads the contents of a file. If it does not exist, an exception is thrown.
    public function read()
    {
        $this->contents = fopen($_GET['filename'], "r");
        while(!feof($this->contents))
        {
            echo fgets($this->contents) . "<br>";
        }
        fclose($this->contents);
    }

    // Writes to the end of a file. Creates a new file if it does not exist.
    public function append()
    {
        $this->contents = fopen($_GET['filename'], "a");
        fwrite($this->contents,  $_GET['text']);
        fclose($this->contents);
    }

    // Opens a file, clears it, then writes to it. Creates a new file if it does not exist.
    public function overwrite()
    {
        $this->contents = fopen($_GET['filename'], "w");
        fwrite($this->contents,  $_GET['text']);
        fclose($this->contents);
    }

    // Creates and writes to a new file. If the file already exists, throw an exception.
    public function write()
    {
        $this->contents = fopen($_GET['filename'], "x");
        fwrite($this->contents,  $_GET['text']);
        fclose($this->contents);
    }

    public function get_filename()
    {
        return $_GET['filename'];
    }

    public function get_usertext()
    {
        return  $_GET['text'];
    }

    public function get_action()
    {
        return $_GET['action'];
    }
}

$userfiles = new MyFiles();
switch ($userfiles->get_action())
{
    case 'Read':
        $userfiles->read();
        break;
    case 'Write':
        $userfiles->write();
        echo '<br>Your file was written to successfully.';
        break;
    case 'Append':
        $userfiles->append();
        echo '<br>Your file was appended to successfully.';
        break;
    case 'Overwrite':
        $userfiles->overwrite();
        echo '<br>Your file was overwritten successfully.';
        break;
    default:
        echo 'Select an option.';
}