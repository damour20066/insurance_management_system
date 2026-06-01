<?php

use Livewire\Volt\Volt;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = Volt::test('auth.register')
        ->set('username', 'testuser')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();
});

test('register form fields are cleared after successful registration', function () {
    $component = Volt::test('auth.register')
        ->set('username', 'newuser')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register');

    $component
        ->assertHasNoErrors()
        ->assertRedirect(route('dashboard', absolute: false));

    expect($component->get('username'))->toBe('');
    expect($component->get('password'))->toBe('');
    expect($component->get('password_confirmation'))->toBe('');
});
