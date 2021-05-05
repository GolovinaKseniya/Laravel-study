<?php


class FileDBDriver
{
    public array $config;
    public string $filename;

    public array $decodedArrays;

    public array $valuesToFind;
    public array $findedValues;

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
        var_dump($this->decodedArrays);

        foreach($this->decodedArrays as $decodedArray) {
            foreach ($decodedArray as $key => $item) {
               
                if(in_array($key, $this->valuesToFind['slug'])) {
                    if(in_array($item, $this->valuesToFind['value'])) {
                        $item = 111;
                        echo "<br>$item<br>";
                    }
                }
            }
        }

        echo "<br><br><br>";

        var_dump($this->decodedArrays);

        $handle = fopen($this->filename, "w");

//        foreach ($this->decodedArrays as $decodedArray) {
            fwrite($handle, json_encode('test') . PHP_EOL);
//        }
        fclose($handle);
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
            return $this->findedValues;
        } else if (is_array($keys)) {
            foreach ($this->findedValues as $findedValue) {
                foreach ($findedValue as $key => $value) {
                    if (in_array($key, $keys)) {
                        $resultValues [$key] = $value;
                    }
                }
            }
        }

        return $resultValues;
    }


    public function find(array $array)
    {
        $find = [
            'slug' => [],
            'symbol' => [],
            'value' => []
        ];

        $findedValues = [];

        foreach ($array as $value) {
            array_push($find['slug'], $value[0]);

            array_push($find['symbol'], $value[1]);

            array_push($find['value'], $value[2]);
        }

        $this->valuesToFind = $find;

        if (isset($this->decodedArrays)) {

            foreach ($this->decodedArrays as $decodedArray) {
                foreach ($decodedArray as $key => $value) {

                    if (in_array($key, $find['slug'])) {
                        if (in_array($value, $find['value'])) {
                            array_push($findedValues, $decodedArray);
                        }
                    }
                }
            }
            $this->findedValues = $findedValues;
        }

        return $this;
    }

//    public function get($filename)
//    {
//        $handle = fopen($this->filename, "r");
//        $tmpValues = [];
//
//        if ($handle) {
//            while (($line = fgets($handle)) !== false) {
//                array_push($tmpValues, json_decode($line, true));
//            }
//
//            fclose($handle);
//        }
//
//        $this->decodedArrays = $tmpValues;
//        return $this;
//    }
}