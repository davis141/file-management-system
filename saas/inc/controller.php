<?php
include_once ('cores.php');
include_once ('db-config.php');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

class controller extends dbc
{
    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function checkLogin()
    {
        if (isset($_SESSION['login_user'])) {
            return 'logged';
        } else {
            return 'nau';
        }
    }

    public function stringFormat($string, $len)
    {
        if (strlen($string) > $len) {
            return substr($string, 0, $len) . '...';
        } else {
            return $string;
        }
    }

    public function fetch_query($query, $decodeEntities = true)
    {
        try {
            $result = $this->run_query($query);

            if ($result) {
                $data = [];

                while ($row = $result->fetch_assoc()) {
                    $decoded_row = [];
                    foreach ($row as $key => $value) {
                        if ($decodeEntities) {
                            $decoded_row[$key] = html_entity_decode($value, ENT_QUOTES | ENT_HTML5);
                        } else {
                            $decoded_row[$key] = $value;
                        }
                    }
                    $data[] = $decoded_row;
                }

                $result->free();
                return $data;
            } else {
                return [];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function direct_insert($query)
    {
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function time_ago($timestamp)
    {
        try {
            $current_time = new DateTime();
            $past_time = new DateTime($timestamp);
            $interval = $current_time->diff($past_time);

            if ($interval->y > 0) {
                return $interval->y . " year" . ($interval->y > 1 ? 's' : '') . " ago";
            } elseif ($interval->m > 0) {
                return $interval->m . " month" . ($interval->m > 1 ? 's' : '') . " ago";
            } elseif ($interval->d > 0) {
                return $interval->d . " day" . ($interval->d > 1 ? 's' : '') . " ago";
            } elseif ($interval->h > 0) {
                return $interval->h . " hour" . ($interval->h > 1 ? 's' : '') . " ago";
            } elseif ($interval->i > 0) {
                return $interval->i . " minute" . ($interval->i > 1 ? 's' : '') . " ago";
            } else {
                return "Just now";
            }
        } catch (Exception $e) {
            return "Invalid timestamp";
        }
    }
}


