<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_tiny
 * @copyright 2012 Mary Evans
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if (!isloggedin() or isguestuser()) {
    echo '<a href="'.$CFG->wwwroot.'/login/index.php "><button type="submit" class="btn btn-small btn-primary pull-right"><i class="icon-hand-right icon-white"></i>&nbsp;&nbsp;'.get_string('login').'</button></a>';
} else {
    echo '<a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='. sesskey().'"><button type="submit" class="btn btn-small btn-primary pull-right">'.get_string('logout').'&nbsp;&nbsp;<i class="icon-hand-left icon-white"></i></button></a>';

} ?>
