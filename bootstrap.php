<?php

if (!$sqlite_extension = extension_loaded('sqlite3')) {
    exit(' Extension sqlite3 not loaded');
}
