<?php

it('has  page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
