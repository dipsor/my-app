<?php
Breadcrumbs::register('dashboard.index', function ($breadcrumbs) {
    $breadcrumbs->push('dashboard.index', route('dashboard.index'));
});

// Home > About
Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('admin.users.index', route('admin.users.index'));
});

Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->push('Users', route('users.index'));
});

Breadcrumbs::register('users.show', function ($breadcrumbs, $id) {
    $user = \App\Users\Models\User::findOrFail($id);
    $breadcrumbs->parent('users.index', route('users.index'));
    $breadcrumbs->push($user->name, route('users.show', $user->name));
});