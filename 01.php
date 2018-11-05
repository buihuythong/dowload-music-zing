<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    $url = 'https://mp3.zing.vn/xhr/media/get-source?type=audio&key=LHxmTkmscbFiFaztHtbGZHTLpzkSlRmHi';
    
    set_time_limit(0);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36');
    curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com');
    curl_setopt($ch, CURLOPT_ENCODING, "");
    $data = curl_exec($ch);
    curl_close($ch);
    $dataUrl = htmlspecialchars($data);
    
    echo $dataUrl;