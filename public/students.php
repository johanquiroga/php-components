<?php

require(__DIR__.'/../bootstrap/start.php');

if (!$access->check('student')) {
    abort404();
}

view('students', compact('access'));