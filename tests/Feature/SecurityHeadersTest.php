<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

test('security headers are present in web responses', function () {
    $response = $this->get('/');

    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), browsing-topics=()');
    $response->assertHeader('X-XSS-Protection', '1; mode=block');
    $response->assertHeader('Content-Security-Policy');
});

test('security headers are present in api responses', function () {
    $response = $this->getJson(route('api.utility.countries'));

    $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    $response->assertHeader('X-Content-Type-Options', 'nosniff');
    $response->assertHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
    $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), browsing-topics=()');
    $response->assertHeader('X-XSS-Protection', '1; mode=block');
    $response->assertHeader('Content-Security-Policy');
});
