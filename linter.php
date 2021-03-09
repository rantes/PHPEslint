<?php
/**
 * Will perform linter on files
 */
Class Linter {
    /**
     * @todo Should set paths, configs and files to linter
     */
    public function __construct() {}
    /**
     * Will be executed after instantiation
     */
    public function Run() {
        $this->_logger('Will perfomr linter!!!');
    }
    /**
     * just perform a log system
     * @param string $source 
     */
    private function _logger(string $message) {
        $logdir = '/tmp/';
        $file = 'PHPEslinter.log';
        $stamp = date('d-m-Y i:s:H');

        file_exists("{$logdir}{$file}") and filesize("{$logdir}{$file}") >= 524288000 and rename("{$logdir}{$file}", "{$logdir}{$stamp}_{$file}");
        fwrite(STDOUT, "{$message}\n");
        file_put_contents("{$logdir}{$file}", "[{$stamp}] - {$message}\n", FILE_APPEND);
    }
}

$Linter = new Linter();
$Linter->Run();
?>
