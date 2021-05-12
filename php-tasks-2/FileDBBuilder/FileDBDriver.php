<?php
namespace FileDB;


class FileDBDriver
{
    public array $config;
    public string $filename;

    public array $decodedArrays;

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

        $handle = fopen($this->filename, "r");
        $tmpValues = [];

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                array_push($tmpValues, json_decode($line, true));
            }

            fclose($handle);
        }

        $this->decodedArrays = $tmpValues;

        return $this;
    }

    public function update($array)
    {
        $i = 0;
        foreach ($this->decodedArrays as $key => &$decodedArray) {
            if(in_array($decodedArray, $this->searchResult)) {
                $decodedArray[key($array)] = $array[key($array)];
                $i++;
            }
        }

        $result = "";
        foreach ($this->decodedArrays as $element) {
            $result .= json_encode($element) . PHP_EOL;
        }

        file_put_contents($this->filename, $result);

        return $this;
    }

    public function append($value): void
    {
        $fp = fopen($this->filename, "a+");

        fwrite($fp, json_encode($value) . PHP_EOL);

        fclose($fp);
    }

    public function read($keys)
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
        $i = 0;

        foreach ($this->decodedArrays as $key => $decodedArray) {
            if(in_array($decodedArray, $this->searchResult)) {
                unset($this->decodedArrays[$key]);
                $i++;
            }
        }

        $result = "";
        foreach ($this->decodedArrays as $element) {
            $result .= json_encode($element) . PHP_EOL;
        }

        file_put_contents($this->filename, $result);

        return $this;
    }

    public function find(array $and, array $or = [])
    {
        $this->searchTerms['and'] = $and;
        $this->searchTerms['or'] = $or;

        $result = [];

        foreach ($this->decodedArrays as $decodedArray) {
            foreach ($decodedArray as $key => $item) {
                if ($and[0][0] === 1 && $and[0][2] === 1) {
                    array_push($result, $decodedArray);
                } else if ($this->check($this->searchTerms, $key, $item)) {
                    array_push($result, $decodedArray);
                    break;
                }
            }
        }

        $this->searchResult = $result;

        return $this;
    }

    public function checkSign($sign, $value1, $value2)
    {
        switch ($sign) {
            case "=":
                if ($value1 == $value2) {
                    return true;
                } else {
                    return false;
                };
                break;
            case ">":
                if ($value1 > $value2) {
                    return true;
                } else {
                    return false;
                };
                break;
            case "<":
                if ($value1 < $value2) {
                    return true;
                } else {
                    return false;
                };
                break;
            default:
                return false;
        }
    }

    private function check(array $conditions, string $key, string $value)
    {
        foreach ($conditions as $ckey => $condition) {
            if ($ckey === "and") {
                $str = 'return (';
                foreach ($condition as $ikey => $item) {
                    if ($ikey === (count($condition) - 1)) {
                        $str .= ($this->checkSign($item[1], $value, $item[2])) ? 1 : 0;
                        $str .= ")";
                    } else {
                        $str .= ($this->checkSign($item[1], $value, $item[2])) ? 1 : 0;
                        $str .= " && ";
                    }
                }
            } else if ($ckey === "or") {
                foreach ($condition as $item) {
                    $str .= " || ";
                    $str .= ($this->checkSign($item[1], $value, $item[2])) ? 1 : 0;
                }
            }
        }

        return eval($str . ';');
    }
}