<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LogWrite
{
	public $logfile = null;
	public $logdata = null;

	public function __construct($logfile, $logdata)
	{
		if ($logfile !== "") {
			$this->logfile = $logfile;
		}
		$this->logdata = $logdata;
	}

	public function __destruct()
	{
		$file = APPPATH . 'logs/' . 'log.txt';
		if ($this->logfile !== null && $this->logfile !== '') {
			// Strip any path separators and dot-dot sequences to prevent path traversal.
			$safeLogfile = str_replace(['/', '\\', '..'], '', $this->logfile);
			$safeLogfile = basename($safeLogfile);
			if ($safeLogfile !== '') {
				$file = APPPATH . 'logs/' . $safeLogfile;
			}
		}
		file_put_contents($file, $this->logdata, FILE_APPEND);
		chmod($file, 0640);
	}
}
