<?php

namespace FileDB;


class FileDBDriver
{
    public array $config;
    public string $filename;

    private array $searchTerms;
    private array $searchResult = [];

    /**
     * FileDBDriver constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config['extension'] = $config['extension'];
        $this->config['path'] = $config['path'];
    }

    /**
     * @param $filename
     * @return self
     */
    public function file($filename): self
    {
        $this->filename = $this->config['path'] . DIRECTORY_SEPARATOR . $filename;

        return $this;
    }

    /**
     * @param array $array
     * @return self
     */
    public function update(array $array): self
    {
        $this->search();

        $newName = $this->randomFilename(15);
        $handle = fopen($this->filename, "a+");
        $writeHandle = fopen($newName, "w+");
        $tmpValues = [];

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                array_push($tmpValues, json_decode($line, true));

                $decodedArray = json_decode($line, true);

                if ($this->check($decodedArray)) {
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

    /**
     * @param array $value
     */
    public function append(array $value): void
    {
        $fp = fopen($this->filename, "a+");

        fwrite($fp, json_encode($value) . PHP_EOL);

        fclose($fp);
    }

    /**
     * @param array|string $keys
     * @return array
     */
    public function read($keys = "*"): array
    {
        $this->search();

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

    /**
     * @return self
     */
    public function delete(): self
    {
        $this->search();

        $newName = $this->randomFilename(15);

        $handle = fopen($this->filename, "a+");
        $writeHandle = fopen($newName, "w+");

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $decodedArray = json_decode($line, true);

                if ($this->check($decodedArray)) {
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

    /**
     * @param array $and
     * @param array $or
     * @return self
     */
    public function find(array $and, array $or = []): self
    {
        $this->searchTerms['and'] = $and;
        $this->searchTerms['or'] = $or;

        return $this;
    }

    /**
     * @param array $array
     * @return bool
     */
    public function check(array $array): bool
    {
        return ($this->getAndPart($array) || $this->getOrPart($array));
    }

    /**
     * @param array $array
     * @return bool
     */
    public function getAndPart(array $array): bool
    {
        $result = [];
        foreach ($this->searchTerms['and'] as $searchTerm) {
            foreach ($array as $key => $item) {
                if ($searchTerm[0] == $key) {
                    if ($this->checkSign($searchTerm[1], $item, $searchTerm[2])) {
                        array_push($result, 1);
                        continue;
                    } else {
                        array_push($result, 0);
                    }
                }
            }
        }
        $str = 'return ';
        return eval($str . implode("&&", $result) . ';');
    }

    /**
     * @param array $array
     * @return bool
     */
    public function getOrPart(array $array): bool
    {
        $result = [];
        foreach ($this->searchTerms['or'] as $searchTerm) {
            foreach ($array as $key => $item) {
                if ($searchTerm[0] == $key) {
                    if ($this->checkSign($searchTerm[1], $item, $searchTerm[2])) {
                        array_push($result, 1);
                        array_push($this->searchResult, $array);
                    } else {
                        array_push($result, 0);
                        continue;
                    }
                }
            }
        }

        $str = 'return ';
        return eval($str . implode("&&", $result) . ';');
    }

    /**
     * @param string $sign
     * @param string|int|float $value1
     * @param string|int|float $value2
     * @return bool
     */
    public function checkSign(string $sign, $value1, $value2): bool
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

    /**
     * @param int $length
     * @return string
     */
    private function randomFilename(int $length): string
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

    /**
     * @return $this
     */
    private function search()
    {
        var_dump($this->searchResult);
        $handle = fopen($this->filename, "r");
        $result = [];

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $tmp = json_decode($line, true);

                $this->check($tmp);
            }

            fclose($handle);
        }

        return $this;
    }
}