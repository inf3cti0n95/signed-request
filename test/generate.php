#!/usr/bin/env php
<?php

function base64_url_encode($input) {
  $str = strtr(base64_encode($input), '+/=', '-_.');
  $str = str_replace('.', '', $str); // remove padding
  return $str;
}

function generate_signed_request($data, $secret) {
  // always present, and always at the top level
  $data['algorithm'] = 'HMAC-SHA256';
  $data['issued_at'] = time();

  if ($_SERVER['BAD_ALGO']) {
    $data['algorithm'] = 'junky_junk';
  }
  if ($_SERVER['BAD_TIME']) {
    $data['issued_at'] = -10000;
  }
  if ($_SERVER['OLD_TIME']) {
    $data['issued_at'] = time() - 3601;
  }

  // sign it
  $payload = base64_url_encode(json_encode($data));
  $sig = base64_url_encode(
    hash_hmac('sha256', $payload, $secret, $raw=true));

  if ($_SERVER['BAD_SIG']) {
    $sig = 'junky_junk';
  }
  return $sig.'.'.$payload;
}

$secret = '13750c9911fec5865d01f3bd00bdf4db';
echo generate_signed_request(
  array('the' => array('answer' => "the answer is forty two")),
  $secret);
