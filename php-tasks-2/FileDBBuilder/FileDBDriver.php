<?php

namespace FileDB;


class FileDBDriver
{
    public array $config;
    public string $filename;

    private array $searchTerms;
    private array $searchResult;

    public function __construct($config)
    {
        $this->config['extension'] = $config['extension'];
        $this->config['path'] = $config['path'];
    }

    public function file($filename)
    {
        $this->filename = $this->config['path'] . DIRECTORY_SEPARATOR . $filename;

        return $this;
    }

    public function update($array)
    {
        $newName = 'new';
        $handle = fopen($this->filename, "a+");
        $writeHandle = fopen($newName, "w+");
        $tmpValues = [];

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                array_push($tmpValues, json_decode($line, true));


                $decodedArray = json_decode($line, true);
                if (in_array($decodedArray, $this->searchResult)) {

                    $decodedArray[key($array)] = $array[key($array)];

                    $tmp = json_encode($decodedArray) . PHP_EOL;
                } else {
                    $tmp = $line;
                }

                fwrite($writeHandle, $tmp);
            }

            fclose($handle);
            fclose($writeHandle);
        }

        unlink($this->filename);
        copy($newName, $this->filename);
        unlink($newName);

        return $this;
    }

    public function append($value): void
    {
        $fp = fopen($this->filename, "a+");

        fwrite($fp, json_encode($value) . PHP_EOL);

        fclose($fp);
    }

    public function read($keys = "*")
    {
        $resultValues = [];

        if ($keys === "*") {
            return $this->searchResult;
        } else if (is_array($keys)) {
            foreach ($this->searchResult as $key => $item) {
                $resultValues [$key] = [];

                foreach ($item as $ikey => $value) {
                    if (in_array($ikey, $keys)) {
                        $resultValues [$key][$ikey] = $value;
                    }
                }
            }
        }

        return $resultValues;
    }

    public function delete()
    {
        $newName = 'new';


        $handle = fopen($this->filename, "a+");
        $writeHandle = fopen($newName, "w+");
        $tmpValues = [];

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                array_push($tmpValues, json_decode($line, true));
                $decodedArray = json_decode($line, true);

                if (in_array($decodedArray, $this->searchResult)) {
                    continue;
                } else {
                    $tmp = $line;
                }
                fwrite($writeHandle, $tmp);
            }

            fclose($handle);
            fclose($writeHandle);
        }

        unlink($this->filename);
        copy($newName, $this->filename);
        unlink($newName);

        return $this;
    }

    public function find(array $and, array $or = [])
    {
        $handle = fopen($this->filename, "r");

        $result = [];
        $this->searchTerms['and'] = $and;
        $this->searchTerms['or'] = $or;


        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $tmp = json_decode($line, true);

                if ($this->check($tmp)) {
                    array_push($result, $tmp);
                }
            }

            fclose($handle);
        }

        $this->searchResult = $result;
        return $this;
    }

    public function check($array)
    {
        $str = 'return';
        $partOr = $this->getOrPart($array);
        $partAnd = $this->getAndPart($array);

        $str .= $partAnd . $partOr;

        return (eval($str . ';'));
    }

    public function getAndPart($array)
    {
        $part = "(";

        foreach ($this->searchTerms['and'] as $skey => $searchTerm) {
            foreach ($array as $key => $item) {
                if ($searchTerm[0] === $key) {
                    if ($skey === (count($this->searchTerms['and']) - 1)) {
                        $part .= ($this->checkSign($searchTerm[1], $item, $searchTerm[2])) ? 1 : 0;
                        $part .= ")";
                        break;
                    } else {
                        $part .= ($this->checkSign($searchTerm[1], $item, $searchTerm[2])) ? 1 : 0;
                        $part .= " && ";
                    }
                }

            }
        }

        return $part;
    }

    public function getOrPart($array)
    {
        $part = " || ";

        foreach ($this->searchTerms['or'] as $skey => $searchTerm) {
            foreach ($array as $key => $item) {
                if ($searchTerm[0] === $key) {
                    if ($skey === (count($this->searchTerms['or']) - 1)) {
                        $part .= ($this->checkSign($searchTerm[1], $item, $searchTerm[2])) ? 1 : 0;
                        $part .= "";
                        break;
                    } else {
                        $part .= ($this->checkSign($searchTerm[1], $item, $searchTerm[2])) ? 1 : 0;
                        $part .= " || ";
                    }
                }

            }
        }

        return $part;
    }

    public function checkSign($sign, $value1, $value2)
    {
        switch ($sign) {
            case "=":
                if ($value1 == $value2) {
                    return true;
                } else {
                    return false;
                }
            case ">":
                if ($value1 > $value2) {
                    return true;
                } else {
                    return false;
                }
            case "<":
                if ($value1 < $value2) {
                    return true;
                } else {
                    return false;
                }
            default:
                return false;
        }
    }
}