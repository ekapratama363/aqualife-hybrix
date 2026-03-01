<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions
{
    public function __construct()
    {
        parent::__construct();
        set_error_handler([$this, 'custom_error_handler']);
        set_exception_handler([$this, 'custom_exception_handler']);
    }

    public function log_exception($severity, $message, $filepath, $line)
    {
        parent::log_exception($severity, $message, $filepath, $line);
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $this->save_to_db('Error', $message, $filepath, $line, $trace);
    }

    public function custom_error_handler($severity, $message, $filepath, $line)
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $this->save_to_db('PHP Error', $message, $filepath, $line, $trace);
        return false;
    }

    public function custom_exception_handler($exception)
    {
        $this->save_to_db('Exception', $exception->getMessage(), $exception->getFile(), $exception->getLine(), $exception->getTrace());
    }

    private function save_to_db($level, $message, $file, $line, $trace = [])
    {
        // 🔹 Pastikan fungsi get_instance() tersedia sebelum dipanggil
        if (!function_exists('get_instance')) {
            error_log("CI Not Ready: $level - $message in $file on line $line");
            return;
        }

        // 🔹 Pastikan CodeIgniter sudah siap sebelum logging
        $CI =& get_instance();
        if (!isset($CI->db) || !$CI->db) {
            error_log("DB Not Ready: $level - $message in $file on line $line");
            return; // Hindari error jika database belum tersedia
        }

        // Jika file atau line kosong, ambil dari backtrace
        if (empty($file) && !empty($trace[0]['file'])) {
            $file = $trace[0]['file'];
            $line = $trace[0]['line'];
        }

        // Format stack trace agar lebih jelas
        $formatted_trace = '';
        foreach ($trace as $t) {
            if (isset($t['file']) && isset($t['line'])) {
                $formatted_trace .= "File: " . $t['file'] . "\n";
                $formatted_trace .= "Line: " . $t['line'] . "\n";
                $formatted_trace .= "Function: " . ($t['function'] ?? 'N/A') . "\n\n";
            }
        }

        $request_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : 'CLI';

        $data = [
            'level'       => $level,
            'message'     => $message,
            'file'        => $file,
            'line'        => $line,
            'stack_trace' => $formatted_trace,
            'request_url' => $request_url
        ];

        // Simpan log ke database
        $CI->db->insert('ci_logs', $data);
    }
}
