<?php


class FileDBDriver
{
    public string $filename;
    public array $config;
    public array $values;

    public function __construct($config)
    {
        $this->config['extension'] = $config['extension'];
        $this->config['path'] = $config['path'];
    }

    public function file($filename)
    {
        $this->filename = $this->config['path'] . DIRECTORY_SEPARATOR . $filename . $this->config['extension'];
        return $this;
    }

    public function find($array)
    {
        $this->get($this->filename);
        var_dump($this->get($this->filename));
    }

    public function set(string $key, $value): void
    {
        file_put_contents($this->config['path'], json_encode($value));
    }

    public function recursiveSearch($findKey, $array, $result = [])
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->recursiveSearch($findKey, $value, $result = []));
            } else {
                if ($key === $findKey) {
                    array_push($result, $value);
                }
            }
        }

        return $result;
    }

    public function get($filename)
    {
        $this->filename = $this->config['path'] . DIRECTORY_SEPARATOR . $filename;

        $handle = fopen($this->filename, "r");
        $i = 0;
        $keyNumber = '';
        $result

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                if ($i === 0) {
                    $keys = json_decode($line, true);
                    $key = array_search('test', $keys);
                    $keyNumber = $key;
                } else {
                    $values = json_decode($line, true);
                    $j = 0;
                    foreach ($values as $key => $value) {
                        echo $key;
                        if ($j === $i) {

                        }
                        $j++;
                        //var_dump($value);
                    }
                }

                $i++;
            }

//            echo $keyNumber;
            fclose($handle);
        }

        //return json_decode(file_get_contents($key));
    }
}