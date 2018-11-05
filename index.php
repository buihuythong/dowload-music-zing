<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = $_POST['linknhac'];

function parseUrl($subject){
    $pattern = '#(?<=data-xml=").*(?=" data-id)#i';
    preg_match($pattern, $subject,$data);
    
    return $data;
}

function getLink($subject) {
    $pattern = '#(?<="source":{"128":").*(?=","320")#';
    preg_match($pattern, $subject,$data);
    return $data;
}

function getContentMp3($url) {
    set_time_limit(0);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    $dataUrl = htmlspecialchars($data);
    $urlBaiHat = parseUrl($data);
    $urlFull = 'https://mp3.zing.vn/xhr'. $urlBaiHat[0];
    return $urlFull;
}

$dataNhac = getContentMp3($url);

function getContentMp32($url) {
    set_time_limit(0);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36');
    curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com');
    curl_setopt($ch, CURLOPT_ENCODING, "");
    $data = curl_exec($ch);
    curl_close($ch);
    $dataUrl = getLink($data);
    return $dataUrl;
}

$data =  getContentMp32($dataNhac);

$linkdowload = 'https:'. $data[0];

header("location:$linkdowload");
