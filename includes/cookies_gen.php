<?php
// Copyright 2023 venom
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//     http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
#$old = ini_set('memory_limit', '1092M');
function create_onload_cookie() {
    if (!isset($_COOKIE['onload_'])) {
        $cookieName = 'onload_'; // Create a unique cookie name
        $cookieValue = md5(uniqid() . session_id()); // Set the value of the cookie

        // Set the unique cookie for the session if it's not already set
        if (!isset($_COOKIE['onload_'])) {
            setcookie($cookieName, $cookieValue, time() + 3600, '/');
        }
    }
}

function get_onload_cookie() {
    create_onload_cookie();
    if (isset($_COOKIE['onload_'])) {
        return $_COOKIE['onload_'];
    } else {
        return null;
    }
}